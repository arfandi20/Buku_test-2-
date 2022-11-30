@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-10 mx-auto">
        <h1> Tambah Data </h1>

        <form action = "{{ url ('buku/'.$data->id)}}" method = "POST" enctype="multipart/form-data">
            @csrf
            @method ('put')
            <div class="form-group">
                <label for="exampleInputPassword1">ISBN</label>
                <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" placeholder="Masukkan ISBN"  value="{{ $data->isbn}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Masukkan Judul Buku"  value="{{ $data->judul}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Kategori</label>
                <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                    <option value="{{ $data->kategori_id }}">{{ $data->kategori->nama }}</option>
                    @foreach( $kategori as $item)
                    <option value="{{$item->id}}" @selected($data->ketegori_id == $item->id)>{{$item ->nama}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Sinopsis</label>
                <input type="text" class="form-control @error('sinopsis') is-invalid @enderror" name="sinopsis" placeholder="Masukkan Sinopsis Buku" value="{{ $data->sinopsis}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Penerbit</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" placeholder="Masukkan Penerbit Buku" value="{{ $data->penerbit}}">
            </div>

            <img src="{{ asset('storage/'. $data->cover )}}" height="100" alt="" class="mt-2 mx-auto">
            <div class="form-group mt-2">
                <label for="exampleInputPassword1">Cover</label>
                <input type="file" class="form-control-file @error('cover') is-invalid @enderror" name="cover" placeholder="Masukkan File Cover">
            </div>

            @if (Auth::user()->role == 'admin')
            <div class="mb-3">
                <label class="form-label">status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option value="{{ $data->status}}">{{ $data->status }}</option>
                    <option value="aktif" @selected($data->status=='aktif')>aktif</option>
                    <option value="tdk" @selected($data->status=='non')>non-aktif</option>
                </select>
            </div>
            @endif

            <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
        </form>
    </div>
</div>
@endsection