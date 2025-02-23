@extends('layouts.admin')

@section('content')
    <h1>Albumy</h1>
    <a href="{{ route('albums.create') }}">Dodaj album</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($albums as $album)
            <li>
                {{ $album->name }}
                <a href="{{ route('albums.edit', $album) }}">Edytuj</a>
                <form action="{{ route('albums.destroy', $album) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Usuń</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
