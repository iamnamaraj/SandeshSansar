<?php

namespace App\Http\Controllers\Author;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('rSubcategory.rCategory')->where('author_id', Auth::guard('author')->user()->id)->orderBy('id', 'desc')->get();
        return view('author.posts.index', compact('posts'));
    }

    public function create()
    {
        $sub_categories = SubCategory::with('rCategory')->get();
        return view('author.posts.create', compact('sub_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo'  => ['required', 'image', 'mimes:png,jpg,jpeg,gif'],
            'title' =>  ['required'],
            'body'  =>  ['required'],

        ]);

        $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $ai_id = $q[0]->Auto_increment;

        $ext = $request->file('photo')->extension();
        $final_name = 'post_photo_' . time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $post = new Post();

        $post->photo = $final_name;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->sub_category_id = $request->sub_category_id;
        $post->visitor = 1;
        $post->author_id = Auth::guard('author')->user()->id;
        $post->admin_id = 0;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;

        $post->save();


        if ($request->tag_name != '') {
            $tags_array_new = [];
            $tags_array = explode(',', $request->tag_name);
            for ($i = 0; $i < count($tags_array); $i++) {
                $tags_array_new[] = trim($tags_array[$i]);
            }

            $tags_array_new = array_values(array_unique($tags_array_new));
            for ($i = 0; $i < count($tags_array_new); $i++) {
                $tag = new Tag();
                $tag->post_id = $ai_id;
                $tag->tag_name = trim($tags_array_new[$i]);
                $tag->save();
            }
        }

        if ($request->subscriber_share == 1) {

            $subject = 'A new news is published';

            $body = 'Hi, a new news is published in the website. You might be interested to know, do not forget to visit the site.
                    You can direct goto the post by clicking headline of the post given down below <br>';
            $body .= '<a target="_blank" href="' . route('front.post.view', $ai_id) . '">';
            $body .= $request->title;
            $body .= '</a>';



            $subscribers = Subscriber::where('status', 'Active')->get();

            foreach ($subscribers as $subscriber) {
                Mail::to($subscriber->email)->send(new Websitemail($subject, $body));
            }
        }


        return redirect()->route('author.post')->with('success', 'Post is created successfully!!');
    }

    public function edit($id)
    {

        $test = Post::where('id', $id)->where('author_id', Auth::guard('author')->user()->id)->count();

        if (!$test) {
            return redirect()->route('author.post');
        }

        $tags = Tag::where('post_id', $id)->get();
        $sub_categories = SubCategory::with('rCategory')->get();
        $post = Post::where('id', $id)->first();

        return view('author.posts.edit', compact('post', 'sub_categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $ai_id = $q[0]->Auto_increment;

        $request->validate([
            'title' =>  ['required'],
            'body'  =>  ['required'],
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo'      =>  ['required', 'image', 'mimes:png,jpg,jpeg,gif'],
            ]);

            $ext = $request->file('photo')->extension();
            $final_name = 'post_photo_' . time() . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $post->photo = $final_name;
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->sub_category_id = $request->sub_category_id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;

        $post->update();

        if ($request->tag_name != '') {
            $tags_array_new = [];
            $tags_array = explode(',', $request->tag_name);
            for ($i = 0; $i < count($tags_array); $i++) {
                $tags_array_new[] = trim($tags_array[$i]);
            }

            $tags_array_new = array_values(array_unique($tags_array_new));
            for ($i = 0; $i < count($tags_array_new); $i++) {
                $tag = new Tag();
                $tag->post_id = $id;
                $tag->tag_name = trim($tags_array_new[$i]);
                $tag->save();
            }
        }

        if ($request->subscriber_share == 1) {

            $subject = 'News is updated';

            $body = 'Hi, a news is updated in the website. You might be interested to know, do not forget to visit the site.
                    You can direct goto the post by clicking headline of the post given down below <br>';
            $body .= '<a target="_blank" href="' . route('front.post.view', $ai_id) . '">';
            $body .= $request->title;
            $body .= '</a>';



            $subscribers = Subscriber::where('status', 'Active')->get();

            foreach ($subscribers as $subscriber) {
                Mail::to($subscriber->email)->send(new Websitemail($subject, $body));
            }
        }

        return redirect()->route('author.post')->with('success', 'News is updated successfully!!');
    }

    public function delete($id)
    {
        $test = Post::where('id', $id)->where('author_id', Auth::guard('author')->user()->id)->count();

        if (!$test) {
            return redirect()->route('author.post');
        }

        $post = Post::where('id', $id)->first();
        unlink(public_path('uploads/' . $post->photo));

        $post->delete();

        Tag::where('post_id', $id)->delete();


        return redirect()->back()->with('success', 'Post is deleted successfully!!');
    }

    public function tag_delete($id, $id1)
    {

        $tag = Tag::where('id', $id)->first();

        $tag->delete();

        return redirect()->route('posts.edit', $id1)->with('success', 'Tag is deleted Successfully!!');
    }
}
