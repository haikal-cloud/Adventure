<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Scene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Scene";
        $scenes = Scene::all();

        return view('admin.scenes', [
            "title" => $title,
            "scenes" => $scenes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Scene";
        $contents = Content::all();

        return view('admin.create_scene', [
            "title" => $title,
            'contents' => $contents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ini_set('upload_max_filesize','20M');
        // ini_set('post_max_size', '20M');

        $validated_data = $request->validate([
            'title' => 'required',
            'hfov' => 'required|integer',
            'pitch' => 'required|integer',
            'yaw' => 'required|integer',
            'img' => 'required|image|file|max:15000',
            'content_id' => 'required'
        ]);

        $validated_data['img'] = $request->file('img')->store('360-scene');

        Scene::create($validated_data);

        return redirect()->route('dashboard_scene.index')->with('success', 'Berhasil menambah Scene baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scene $scene)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $scene = Scene::findOrFail($id);
        $title = "Edit " . $scene->title;
        $contents = Content::all();

        return view('admin.edit_scene', [
            'title' => $title,
            'scene' => $scene,
            'contents' => $contents
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $scene = Scene::findOrFail($id);
        $validated_data = $request->validate([
            'title' => 'required',
            'hfov' => 'required|integer',
            'pitch' => 'required|integer',
            'yaw' => 'required|integer',
            'img' => 'sometimes|image|file|max:15000',
            'content_id' => 'required'
        ]);

        if ($request->img != null) {
            if ($scene->img) {
                Storage::delete($scene->img);
            }
            $validated_data['img'] = $request->file('img')->store('360-scene');
        }

        $scene->update($validated_data);

        return redirect()->route('dashboard_scene.index')->with('success', 'berhasil update content');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $scene = Scene::findOrFail($id);
        $content = Content::where('main_scene_id', $id)->first();

        $content->update([
            'main_scene_id' => null
        ]);

        $scene->delete();

        return redirect()->route('dashboard_scene.index')->with('success', 'konten berhasil dihapus');
    }
}
