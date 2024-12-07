@extends('layouts.admin_dashboard')

@section('content')
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
        <link rel="stylesheet" href="{{ asset('/') }}vendor/select2/select2.min.css">
    @endpush

    <div class="card">
        <div class="card-body">
            @if (session()->has('errors'))
                <p>{{ session('errors') }}</p>
            @endif
            <form action="{{ route('dashboard_scene.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Scene</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="hfov" class="form-label">HFov</label>
                    <input type="number" class="form-control" id="hfov" name="hfov" value="360" required>
                </div>
                <div class="mb-3">
                    <label for="pitch" class="form-label">Pitch</label>
                    <input type="number" class="form-control" id="pitch" name="pitch" value="0" required>
                </div>
                <div class="mb-3">
                    <label for="yaw" class="form-label">Yaw</label>
                    <input type="number" class="form-control" id="yaw" name="yaw" value="0" required>
                </div>
                <div class="mb-3" id="preview" style="display:none;">
                    <label for="">Preview</label>
                    <div id="panorama" style="height: 40vh;"></div>
                </div>
                <div class="mb-3">
                    <label for="">Images</label>
                    <input class="form-control" id="panorama_img" name="img" type="file" required
                        onchange="previewImg()" />
                </div>
                <div class="mb-3">
                    <label for="scene">Pilih Content Yang Menggunakan Scene Ini</label>
                    <select class="form-select" aria-label="Pilih Scene Utama" name="content_id" id="content_id"
                        data-placeholder="Pilih content utama" required>
                        @foreach ($contents as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('/') }}vendor/select2/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#content_id').select2({
                    placeholder: 'Pilih scene utama',
                    allowClear: true
                });
            });
        </script>
        <script>
            function previewImg() {
                const image = document.querySelector('#panorama_img');
                const preview = document.querySelector('#preview');

                preview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    pannellum.viewer('panorama', {
                        "type": "equirectangular",
                        "panorama": oFREvent.target.result,
                    });
                }
            }
        </script>
    @endpush
@endsection
