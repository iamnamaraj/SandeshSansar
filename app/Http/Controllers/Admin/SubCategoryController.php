<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories = SubCategory::with('rCategory')->orderBy('order', 'asc')->get();
        return view('admin.sub_categories.index', compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        return view('admin.sub_categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  ['required'],
            'order'         =>  ['required'],

        ]);

        $category = new SubCategory();

        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->status = $request->status;
        $category->order = $request->order;

        $category->save();

        return redirect()->route('admin.sub-categories')->with('success', 'Sub category is created successfully!!');
    }

    public function edit($id)
    {
        $categories = Category::orderBy('order', 'asc')->get();
        $sub_category = SubCategory::where('id', $id)->first();

        return view('admin.sub_categories.edit', compact('sub_category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      =>  ['required'],
            'order'     =>  ['required'],
        ]);

        $sub_category = SubCategory::where('id', $id)->first();

        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->status = $request->status;
        $sub_category->order = $request->order;

        $sub_category->update();

        return redirect()->route('admin.sub-categories')->with('success', 'Sub category is updated successfully!!');
    }

    public function delete($id)
    {
        $sub_category = SubCategory::where('id', $id)->first();
        $sub_category->delete();

        return redirect()->back()->with('success', 'Sub category is deleted successfully!!');
    }
}
