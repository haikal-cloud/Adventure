@extends('layouts.admin_dashboard')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('dashboard_scene.create') }}" class="btn btn-primary">Tambah</a>
        </div> <!-- /.card-header -->
        <div class="card-body overflow-auto">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 60%">Judul</th>
                        <th>HFov</th>
                        <th>Pitch</th>
                        <th>Yaw</th>
                        {{-- <th>Gambar</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scenes as $s)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->title }}</td>
                            <td>{{ $s->hfov }}</td>
                            <td>{{ $s->pitch }}</td>
                            <td>{{ $s->yaw }}</td>
                            {{-- <td>{{ $s->img }}</td> --}}
                            <td>
                                <a href="{{ route('dashboard_scene.edit', $s->id) }}" class="btn btn-warning">Edit Scene</a>
                                <a href="{{ route('scene_hotspot.index', $s->id) }}" class="btn btn-warning">Edit
                                    Hotspot</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
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
@endsection
