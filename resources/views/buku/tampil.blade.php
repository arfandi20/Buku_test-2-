@extends('layouts.app')

@section('content')
<div class="row m-3">
    <div class="col-10 mx-auto">
        <h1 class="mt-3 mb-3"> Data Kategori </h1>

        <a href="{{ url ('buku/create')}}" class="btn btn-primary btn-sm mb-3">Tambah Data </a>

        <table class="table text-center">
            <thead>
                <tr>
                    {{-- <th scope="col">No.</th> --}}
                    <th scope="col">ID</th>
                    <th scope="col">No ISBN</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Sinopsis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Status</th>
                    <th scope="col">Waktu Update</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        {{-- <th scope="row">{{$loop->iteration}}</th> --}}
                        <td>{{$item->id}}</td>
                        <td>{{$item->isbn}}</td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->kategori->nama}}</td>
                        <td>{{$item->sinopsis}}</td>
                        <td>{{$item->penerbit}}</td>
                        <td><img src="{{ asset('storage/'. $item->cover) }}" height="100px" alt=""></td>
                        <td>{{ $item->status }}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                        <a href="{{ url ('buku/'.$item->id. '/edit')}}" class="btn btn-success btn-sm mb-3">
                            Edit
                        </a>

                        <a href="{{ url ('deletbuku/'.$item->id)}}" class="btn btn-danger btn-sm mb-3">
                            Hapus
                          </a>
                        </td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</div>

@endsection