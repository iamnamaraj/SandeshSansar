<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  ['required'],
            'status'    =>  ['required'],
            'order'     =>  ['required'],
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->status = $request->status;
        $category->order = $request->order;

        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category is created successfully!!');
    }
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      =>  ['required'],
            'status'    =>  ['required'],
            'order'     =>  ['required'],
        ]);

        $category = Category::where('id', $id)->first();

        $category->name = $request->name;
        $category->status = $request->status;
        $category->order = $request->order;

        $category->update();

        return redirect()->route('admin.categories')->with('success', 'Category is updated successfully!!');
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();

        return redirect()->back()->with('success', 'Category is deleted successfully!!');
    }
}
