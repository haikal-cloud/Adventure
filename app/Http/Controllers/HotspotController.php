<?php

namespace App\Http\Controllers;

use App\Models\Hotspot;
use App\Models\Scene;
use Illuminate\Http\Request;

class HotspotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $title = "Scene Hotspot";
        $scene_hotspot = Hotspot::with('scene')->where('scene_id', $id)->get();
        $scene = Scene::findOrFail($id);
        $scene_same_content = Scene::where('content_id', $scene->content_id)->get();

        // dd($scene_hotspot->first()->scene->first());

        return view('admin.scene_hotspot', [
            'title' => $title,
            'scene_hotspot' => $scene_hotspot,
            'scene' => $scene,
            'scene_same_content' => $scene_same_content
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'scene_id' => 'required',
            'pitch' => 'required',
            'yaw' => 'required',
            'type' => 'required',
            'change_scene_id' => 'sometimes',
            'text' => 'sometimes'
        ]);

        Hotspot::create($validated_data);

        return back()->with('success', 'Sukses menambah hotspot');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotspot $hotspot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotspot $hotspot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotspot $hotspot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $hotspot = Hotspot::findOrFail($request->hotspot_id);
        $hotspot->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus hotspot');
    }
}
