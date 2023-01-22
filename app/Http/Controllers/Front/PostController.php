<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class PostController extends Controller
{
    public function view($id)
    {
        $tags = Tag::where('post_id', $id)->get();
        $post = Post::with('rSubCategory.rCategory')->where('id', $id)->first();

        if ($post->author_id == 0) {
            $user_data = Admin::where('id', $post->admin_id)->first();
        } else {
        }


        //update view count
        $new_visitor = $post->visitor + 1;

        $post->visitor = $new_visitor;
        $post->update();


        //related post section
        $related_post = Post::orderBy('id', 'desc')->where('sub_category_id', $post->sub_category_id)->get();

        return view('front.posts.view', compact('post', 'user_data', 'tags', 'related_post'));
    }
}
