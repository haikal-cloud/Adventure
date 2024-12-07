@extends('layouts.admin_dashboard')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            @if (session()->has('errors'))
                @foreach (session('errors')->all() as $e)
                    <div class="alert alert-danger" role="alert">
                        {{ $e }}
                    </div>
                @endforeach
            @elseif(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h5>Tambah Admin</h5>
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-11">
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com" name="email" required>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div> <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $a)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->email }}</td>
                            <td>
                                <form action="{{ route('admin.destroy', $a->id) }}" method="post">
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
        {{-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
            </ul>
        </div> --}}
    </div> <!-- /.card -->
@endsection
