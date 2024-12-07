<?php

namespace App\Http\Controllers;

use App\Models\Content;

class PageController extends Controller
{
    public function home()
    {
        $contents = Content::where('main_scene_id', '!=', null)->get();
        return view('home', [
            'contents' => $contents
        ]);
    }

    public function konten(String $slug)
    {
        if ($slug == 'kampus-b-uisi') {
            return view('kampus-b-uisi');
        } else if ($slug == 'kammari') {
            return view('kammari');
        }

        $content = Content::firstWhere('slug', $slug);

        if ($content) {
            return view('content', [
                'content' => $content
            ]);
        }

        return abort(404);
    }

    public function kontenPage()
    {
        $contents = Content::all();
        return view(view: 'konten', data: compact(var_name: 'contents'));
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
