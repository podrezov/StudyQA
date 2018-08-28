@extends('layouts.app')
<link href="{{ asset('lightbox/css/lightbox.css') }}" rel="stylesheet">

@section('content')
    <div class="col-md-12">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form enctype="multipart/form-data" action="{{ route('gallery.upload') }}" method="post">
            {{ csrf_field() }}
            <input type="file" name="img" class="btn btn-outline-secondary btn-sm">
            <input type="submit" class="btn btn-outline-info">
            @if($errors->isNotEmpty('bags'))
                <strong>{{ $errors->first() }}</strong>
            @endif
        </form>
        <div class="row">
            @forelse($images as $image)
                <div class="col-md-3">
                    <a href="{{ $image->path }}" data-lightbox="roadtrip"><img
                                style="width: 240px; height: 160px; border: 2px solid black; margin-bottom: 10px"
                                src="{{ $image->path }}"></a>
                    <br>
                </div>
            @empty
                <h1 class="m-auto">Нет изображений!</h1>
            @endforelse
        </div>
    </div>
    <script src="{{ asset('lightbox/js/lightbox-plus-jquery.js') }}"></script>
@endsection