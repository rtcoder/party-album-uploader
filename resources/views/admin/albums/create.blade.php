@extends('layouts.admin')

@section('content')
    <h1>Dodaj Album</h1>

    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nazwa albumu">
        <button type="submit">Zapisz</button>
    </form>
@endsection
