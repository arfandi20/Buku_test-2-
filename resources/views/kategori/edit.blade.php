@extends('layouts.app')

@section('content')

<div class="row m-3">
    <div class="col-10 mx-auto">
        <h1 class="mt-3 mb-3"> Edit Data </h1>
        <form action = "{{ url ('kategori/'.$data->id)}}" method = "POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ $data->nama}}">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
        </form>
    </div>
</div>
@endsection