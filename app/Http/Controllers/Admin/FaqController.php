<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function faq()
    {
        $faqs = Faq::get();
        return view('admin.faqs.view', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $faq = new Faq();

        $faq->title = $request->title;
        $faq->detail = $request->detail;

        $faq->save();

        return redirect()->back()->with('success', 'Faq is created successfully!!');
    }



    public function edit($id)
    {
        $faq = Faq::where('id', $id)->first();
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::where('id', $id)->first();
        $faq->title = $request->title;
        $faq->detail = $request->detail;

        $faq->update();

        return redirect()->route('admin.faq')->with('success', 'Faq is updated successfully!!');
    }

    public function delete($id)

    {
        $faq = Faq::where('id', $id)->first();

        $faq->delete();

        return redirect()->back()->with('success', 'Faq is deleted successfully!!');
    }
}
