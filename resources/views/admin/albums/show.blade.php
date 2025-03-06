@php use App\Models\Album; @endphp
@extends('layouts.admin')
<?php
/* @var Album $album */
?>
@section('content')
    <h1>Album {{ $album->name }}</h1>
    @dump($album)

    <div class="container">
        @foreach($album->media as $media)
            {{ $media->file_path }}
        @endforeach
    </div>
@endsection
