@extends('layouts.admin_dashboard')

@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/') }}vendor/select2/select2.min.css">
    @endpush

    <div class="card">
        @if (session()->has('errors'))
            <p>{{ session('errors') }}</p>
        @endif

        <div class="card-body">
            <form method="POST" action="{{ route('dashboard_content.store') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Konten</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat Lokasi Konten</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="thumbnail_img" class="form-label">Gambar Thumbnail</label>
                    <img class="thumbnail-preview mb-3 img-fluid" />
                    <input class="form-control" name="thumbnail" type="file" onchange="previewImg('thumbnail')"
                        id="thumbnail_img" required />
                </div>
                <div class="mb-3">
                    <label for="scene">Scene Utama</label>
                    <select class="form-select" aria-label="Pilih Scene Utama" name="main_scene" id="main_scene"
                        data-placeholder="Pilih scene utama">
                        <option value="0" selected>No scene</option>
                        @foreach ($scenes as $s)
                            <option value="{{ $s->id }}">{{ $s->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('/') }}vendor/select2/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#main_scene').select2({
                    placeholder: 'Pilih scene utama',
                    allowClear: true
                });
            });
        </script>
        <script>
            function previewImg(img) {
                const image = document.querySelector('#' + img + '_img');
                const imgPreview = document.querySelector('.' + img + '-preview')

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
    @endpush
@endsection
