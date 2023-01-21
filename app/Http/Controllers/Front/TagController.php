<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tagname)
    {
        $tag_post = Tag::where('tag_name', $tagname)->get();

        $post_id = [];
        foreach ($tag_post as $post) {
            $post_id[] = $post->post_id;
        }
        $all_post = Post::orderBy('id', 'desc')->get();

        return view('front.tag_post', compact('all_post', 'post_id', 'tagname'));
    }
}
