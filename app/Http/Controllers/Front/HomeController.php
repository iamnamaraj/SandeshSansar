<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use PhpOption\Option;

class HomeController extends Controller
{
    public function home()
    {
        $sub_categories = SubCategory::with('rPOst')->orderBy('order', 'asc')->where('show_on_home', 'SHow')->get();
        $posts = Post::with('rSubCategory')->orderBy('id', 'desc')->get();
        $settings = Setting::where('id', 1)->first();
        $home_ad = HomeAdvertisement::where('id', 1)->first();
        $category_data = Category::orderBy('order', 'asc')->get();

        return view('front.home', compact('home_ad', 'settings', 'posts', 'sub_categories', 'category_data'));
    }

    public function subcategory($id)
    {
        $sub_categories = SubCategory::where('category_id', $id)->get();

        $response = "<option value=''>Select Subcategory</option>";

        foreach ($sub_categories as $category) {
            $response .= '<option value="' . $category->id . '">' . $category->name . '</option>';
        }
        return response()->json(['sub_category_data' => $response]);
    }

    public function search(Request $request)
    {
        $search_data = Post::with('rSubCategory')->orderBy('id', 'desc');

        if ($request->search_item != '') {
            $search_data = $search_data->where('title', 'like', '%' . $request->search_item . '%');
        }

        if ($request->sub_category != '') {
            $search_data = $search_data->where('sub_category_id', $request->sub_category);
        }

        $search_data = $search_data->paginate(10);

        return view('front.search_data', compact('search_data'));
    }
}
