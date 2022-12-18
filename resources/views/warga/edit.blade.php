@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  <form action="/warga/update/{{ $warga->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input class="form-control" type="text" name="nama" value="{{ $warga->nama }}"><br>
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">NIK</label>
                        <input class="form-control" type="text" name="nik" value="{{ $warga->nik }}"><br>
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input class="form-control"type="text" name="email" value="{{ $warga->email }}"><br>
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin"><br>
                            <option value="">Pilih Jenis Kelamin</option>
                            {{-- <option value="L" {{ $warga->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $warga->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option> --}}
                            <option value="L" @if ($warga->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                            <option value="P" @if ($warga->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="" rows="10" >{{ $warga->alamat }}</textarea><br>
                    </div>
                    <input class="btn btn-primary" type="submit" name="submit" value="save">
                </form> 
                </div>
            </div>
        </div>
    </div>
</div>



@endsection