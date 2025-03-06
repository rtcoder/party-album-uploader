<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Album;
use Random\RandomException;

class AlbumController extends Controller
{
    public function index(): Factory|Application|View
    {
        $albums = Album::query()->latest()->get();
        return view('admin.albums.index', compact('albums'));
    }

    public function create(): Factory|Application|View
    {
        return view('admin.albums.create');
    }

    /**
     * @throws RandomException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $hash = bin2hex(random_bytes(16)); // 16 bajtów, co daje 32-znakowy hash

        Album::query()->create([
            'name' => $request->name,
            'hash' => $hash,
        ]);

        return redirect()->route('albums.index')->with('success', 'Album utworzony!');
    }

    public function show(Album $album): Factory|Application|View
    {
        return view('admin.albums.show', compact('album'));
    }

    public function edit(Album $album): Factory|Application|View
    {
        return view('admin.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album):RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $album->update([
            'name' => $request->name,
        ]);

        return redirect()->route('albums.index')->with('success', 'Album zaktualizowany!');
    }

    public function destroy(Album $album): RedirectResponse
    {
        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Album usunięty!');
    }
}
