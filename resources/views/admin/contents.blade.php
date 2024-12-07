@extends('layouts.admin_dashboard')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('dashboard_content.create') }}" class="btn btn-primary">Tambah</a>
        </div> <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 60%">Nama Konten</th>
                        <th>Main Scene</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contents as $c)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $c->name }}</td>
                            <td>
                                @if ($c->main_scene_id)
                                    <span class="badge text-bg-success">
                                        <a class="text-decoration-none link-light"
                                            href="{{ route('scene_hotspot.index', $c->main_scene->id) }}">{{ $c->main_scene->title }}</a>
                                    </span>
                                @else
                                    <span class="badge text-bg-danger">Main Scene Kosong</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('dashboard_content.edit', $c) }}" class="btn btn-warning">Edit
                                    Konten</a>
                                <a href="{{ route('content_scenes', $c->slug) }}" class="btn btn-warning">Edit Scene</a>
                                <form action="{{ route('dashboard_content.destroy', $c->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Hapus</button>
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
@endsection
