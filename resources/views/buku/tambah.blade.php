@extends('layouts.app')

@section('content')

<div class="row m-3">
    <div class="col-10 mx-auto">
        <h1 class="mt-3 mb-3"> Tambah Data </h1>

        <form action = "{{ route ('buku.store')}}" method = "POST" enctype="multipart/form-data" class="mt-3">
            @csrf

            <div class="form-group">
                <label for="exampleInputPassword1">ISBN</label>
                <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" placeholder="Masukkan ISBN" value="{{ old('isbn')}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Masukkan Judul Buku" value="{{ old('judul')}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Kategori</label>
                <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                    <option value="">Pilih Ketgori Buku</option>
                    @foreach( $kategori as $item)
                    <option value="{{$item->id}}" @selected(old ('kategori') == $item->id)>{{$item ->nama}}</option>
                    @endforeach
                    </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Sinopsis</label>
                <input type="text" class="form-control @error('sinopsis') is-invalid @enderror" name="sinopsis" placeholder="Masukkan Sinopsis Buku" value="{{ old('sinopsis')}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Penerbit</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" placeholder="Masukkan Penerbit Buku" value="{{ old('penerbit')}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Cover</label>
                <input type="file" class="form-control-file @error('cover') is-invalid @enderror" name="cover" placeholder="Masukkan File Cover">
            </div>

            {{-- @if (Auth::user()->role == 'admin')
            <div class="mb-3">
                <label class="form-label">status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected>Open this select menu</option>
                    <option value="aktif">aktif</option>
                    <option value="non">non-aktif</option>
                </select>
                </div>
            @endif --}}

                <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
        </form>
    </div>
</div>
@endsection