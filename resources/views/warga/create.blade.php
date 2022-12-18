@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Warga') }}</div>

                <div class="card-body">
                    <form action="/warga/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input class="form-control" type="text" name="nama" placeholder="nama">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIK</label>
                            <input class="form-control" type="text" name="nik" placeholder="nik">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input  class="form-control" type="text" name="email" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="alamat" id="" rows="10"></textarea>
                        </div>
                    
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
    
    
@endsection
