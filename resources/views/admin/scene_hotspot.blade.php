@extends('layouts.admin_dashboard')

@section('content')
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
        <link rel="stylesheet" href="{{ asset('/') }}vendor/select2/select2.min.css">
    @endpush
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-end">
        </div> <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div id="panorama"></div>
                </div>
                <div class="col-6">
                    @if (session()->has('errors'))
                        <p>{{ session('errors') }}</p>
                    @endif
                    <form action="{{ route('scene_hotspot.store', $scene->id) }}" method="POST">
                        @csrf
                        @method('post')

                        <input type="hidden" name="scene_id" value="{{ $scene->id }}">
                        <div class="my-3">
                            <label for="" class="form-label">Pitch</label>
                            <input type="number" class="form-control" id="pitch" name="pitch" value="0"
                                required>
                        </div>
                        <div class="my-3">
                            <label for="" class="form-label">Yaw</label>
                            <input type="number" class="form-control" id="yaw" name="yaw" value="0"
                                required>
                        </div>
                        <div class="my-3">
                            <label for="" class="form-label">Type</label>
                            <select class="form-select" aria-label="Pilih tipe hotspot" name="type" id="type"
                                data-placeholder="Pilih tipe hotspot" onchange="changeType()" required>
                                <option value="" selected>Pilih Tipe</option>
                                <option value="scene"id="scene">Scene</option>
                                <option value="text" id="text">Text</option>
                            </select>
                        </div>
                        <div class="my-3">
                            <label for="" class="form-label">Scene</label>
                            <select class="form-select" aria-label="Pilih scene" name="change_scene_id" id="change_scene_id"
                                data-placeholder="Pilih scene" required disabled>
                                <option value="" selected id="select_scene">Pilih Scene</option>
                                @foreach ($scene_same_content as $sc)
                                    <option value="{{ $sc->id }}">{{ $sc->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-3">
                            <label for="" class="form-label">Text</label>
                            <input type="text" class="form-control" id="textInput" name="text" required disabled>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Pitch</th>
                        <th>Yaw</th>
                        <th>Type</th>
                        <th>Scene Id</th>
                        <th>Text</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scene_hotspot as $sh)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sh->pitch }}</td>
                            <td>{{ $sh->yaw }}</td>
                            <td>{{ $sh->type }}</td>
                            <td>{{ $sh->change_scene_id }}</td>
                            <td>{{ $sh->text }}</td>
                            <td>
                                <form action="{{ route('scene_hotspot.destroy', $scene->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="hotspot_id" value="{{ $sh->id }}">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
            </ul>
        </div>
    </div> <!-- /.card -->

    @push('scripts')
        <script>
            var viewer = pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": `{{ asset('/storage') . '/' . $scene->img }}`,
            });

            viewer.on('mousedown', function(event) {
                // coords[0] is pitch, coords[1] is yaw
                var coords = viewer.mouseEventToCoords(event);
                document.getElementById('pitch').value = Math.round(coords[0]);
                document.getElementById('yaw').value = Math.round(coords[1]);
            });

            function changeType() {
                var sceneOption = document.getElementById('scene').selected;
                var textOption = document.getElementById('text').selected;
                var sceneDiv = document.getElementById('sceneDiv');
                var textDiv = document.getElementById('textDiv');

                if (sceneOption) {
                    document.getElementById('change_scene_id').disabled = false;
                    document.getElementById('textInput').disabled = false;
                }
                if (textOption) {
                    document.getElementById('textInput').disabled = false;
                    document.getElementById('change_scene_id').disabled = true;
                }
            }
        </script>
    @endpush
@endsection
