<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('rSubCategory.rCategory')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_categories = SubCategory::with('rCategory')->get();

        return view('admin.posts.create', compact('sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      =>  ['required'],
            'photo'      =>  ['required', 'image', 'mimes:png,jpg,jpeg,gif'],
            'body'       =>  ['required'],
        ]);


        $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $ai_id = $q[0]->Auto_increment;

        $ext = $request->file('photo')->extension();
        $final_name = 'post_photo_' . time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $post = new Post();
        $post->title = $request->title;
        $post->photo = $final_name;
        $post->body = $request->body;
        $post->sub_category_id = $request->sub_category_id;
        $post->visitor = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;

        $post->save();

        // $tags_array = explode(',', $request->tag_name);
        // for ($i = 0; $i < count($tags_array); $i++) {
        //     $tag = new Tag();
        //     $tag->post_id = $ai_id;
        //     $tag->tag_name = trim($tags_array[$i]);
        //     $tag->save();
        // }

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


        return redirect()->route('posts.index')->with('success', 'Post is created successfully!!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::get();
        $sub_categories = SubCategory::with('rCategory')->get();
        $post = Post::where('id', $id)->first();

        return view('admin.posts.edit', compact('post', 'sub_categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post = Post::where('id', $id)->first();

        $request->validate([
            'title'      =>  ['required'],
            'body'       =>  ['required'],
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
        $post->visitor = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;

        $post->update();

        if ($request->tag_name != '') {

            $tags_array = explode(',', $request->tag_name);
            for ($i = 0; $i < count($tags_array); $i++) {
                $tag = new Tag();
                $tag->post_id = $id;
                $tag->tag_name = trim($tags_array[$i]);
                $tag->save();
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post is updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::where('id', $id)->first();

        unlink(public_path('uploads/' . $post->photo));

        $post->delete();

        Tag::where('post_id', $id)->delete();


        return redirect()->back()->with('success', 'Post is deleted successfully!!');
    }

    public function tag_delete($id, $id1)
    {
        $tag = Tag::where('post_id', $id)->delete();
        $tag->delete();

        return redirect()->route('posts.edit', $id1)->with('success', 'Tag is deleted Successfully!!');
    }
}
