@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Warga') }}</div>
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                         <a href="/warga/create" class="btn btn-info mb-2 ">Add Warga</a>
                    </div>
               
                    <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($warga as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <div class="btn-group">
                                <a href="/warga/edit/{{ $data->id }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/warga/delete/{{ $data->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach  
                    </table> 
                    <div class="d-flex">
                        {!! $warga->links() !!}
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
