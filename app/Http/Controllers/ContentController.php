<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Hotspot;
use App\Models\Scene;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Konten 360";
        $contents = Content::with('main_scene')->get();

        return view('admin.contents', [
            'title' => $title,
            'contents' => $contents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Konten";
        $scenes = Scene::all();

        return view('admin.create_content', [
            'title' => $title,
            'scenes' => $scenes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|max:255',
            'thumbnail' => 'required|image|file',
            'address' => 'required',
            'main_scene' => 'required'
        ]);

        $validated_data['slug'] = Str::slug($validated_data['name']);
        $validated_data['thumbnail'] = $request->file('thumbnail')->store('content-thumbnail');

        if ($validated_data['main_scene'] > 0) {
            $validated_data['main_scene_id'] = $validated_data['main_scene'];
        }

        Content::create($validated_data);

        return redirect()->route('dashboard_content.index')->with('success', 'Berhasil menambah Content baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        $scenes = Scene::where('content_id', $content->id)->get();
        $title = "Edit Konten " . $content->title;

        return view('admin.edit_content', [
            'title' => $title,
            'content' => $content,
            'scenes' => $scenes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);
        $validated_data = $request->validate([
            'name' => 'required|max:255',
            'main_scene' => 'required'
        ]);

        $validated_data['main_scene_id'] = $validated_data['main_scene'];

        if ($request->thumbnail != null) {
            if ($content->thumbnail) {
                Storage::delete($content->thumbnail);
            }
            $validated_data['thumbnail'] = $request->file('thumbnail')->store('content-thumbnail');
        }

        $content->update($validated_data);

        return redirect()->route('dashboard_content.index')->with('success', "Berhasil mengubah content");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $content = Content::findOrFail($id);

        $content->delete();

        return redirect()->route('dashboard_content.index')->with('success', 'Berhasil menghapus content');
    }

    public function content_scenes($slug)
    {
        $content = Content::firstWhere('slug', $slug);
        $scenes = Scene::where('content_id', $content->id)->get();
        $main_scene_id = $content->main_scene_id;
        $title = "Scene " . $content->name;

        return view('admin.content_scene', [
            'title' => $title,
            'content' => $content,
            'scenes' => $scenes,
            'main_scene_id' => $main_scene_id
        ]);
    }

    public function get_content_data($slug)
    {
        $content = Content::firstWhere('slug', $slug);
        $data_scenes = Scene::where('content_id', $content->id)->get();
        $scene_id = $data_scenes->pluck('id');
        $hotspot = Hotspot::with('scene')->whereIn('scene_id', $scene_id)->get();

        $default_content = [
            'firstScene' => $content->main_scene_id,
            'author' => "Adventure",
            'sceneFadeDuration' => 1000
        ];

        $scenes = [];

        foreach ($data_scenes as $ds) {
            $scene_hotspot = [];
            foreach ($hotspot as $h) {
                if ($h->scene_id == $ds->id) {
                    if ($h->type == 'text') {
                        array_push($scene_hotspot, [
                            "pitch" => $h->pitch,
                            "yaw" => $h->yaw,
                            "type" => "info",
                            "text" => $h->text
                        ]);
                    } else {
                        array_push($scene_hotspot, [
                            "pitch" => $h->pitch,
                            "yaw" => $h->yaw,
                            "type" => "scene",
                            "text" => $h->text,
                            "sceneId" => $h->change_scene_id
                        ]);
                    }
                }
            }

            $scenes[$ds->id] = [
                'title' => $ds->title,
                'hfov' => $ds->hfov,
                'pitch' => $ds->pitch,
                'yaw' => $ds->yaw,
                'panorama' => 'storage/' . $ds->img,
                'type' => 'equirectangular',
                'hotSpots' => $scene_hotspot
            ];
        }

        $data_content = [
            'default' =>  $default_content,
            'scenes' => $scenes,
        ];

        return response()->json($data_content);
    }
}
