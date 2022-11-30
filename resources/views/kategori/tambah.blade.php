@extends('layouts.app')

@section('content')

<div class="row m-3">
    <div class="col-10 mx-auto">
        <h1 class="mt-3 mb-3"> Tambah Data </h1>

        <form action = "{{ route ('kategori.store')}}" method = "POST" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" placeholder="masukkan kategori buku" value="{{ old('kategori')}}">
            </div>
                <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
        </form>
    </div>
</div>
@endsection