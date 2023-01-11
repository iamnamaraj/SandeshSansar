<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function view($id)
    {
        $posts = Post::where('sub_category_id', $id)->orderBy('id', 'desc')->paginate(10);
        $subcat = SubCategory::where('id', $id)->first();

        return view('front.subcats.view', compact('subcat', 'posts'));
    }
}
