@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($data as $item)
        <div class="col-3 mt-2 ms-3">
            <div class="card " style="width: 18rem;">
                <img src="{{ asset('storage/'. $item->cover) }}" class="card-img-top" alt="..." height="150px">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text">{{ $item->sinopsis }}</p>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
