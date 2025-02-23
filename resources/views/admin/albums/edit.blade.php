@extends('layouts.admin')

@section('content')
    <h1>Edytuj Album</h1>

    <form action="{{ route('albums.update', $album) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $album->name }}">
        <button type="submit">Zapisz</button>
    </form>
@endsection
