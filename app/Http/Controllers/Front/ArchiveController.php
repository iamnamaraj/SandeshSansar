<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function show(Request $request)
    {

        $temp = explode('-', $request->archive_date);
        $month = $temp[0];
        $year = $temp[1];

        return redirect()->route('archive.detail', [$month, $year]);
    }

    public function detail($month, $year)
    {
        $archive_data = Post::with('rSubCategory')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->orderBy('id', 'desc')->paginate(10);


        foreach ($archive_data as $archive) {
            $ts = strtotime($archive->created_at);
            $archive_date = date('F Y', $ts);
            break;
        }

        return view('front.archive', compact('archive_data', 'archive_date'));
    }
}
