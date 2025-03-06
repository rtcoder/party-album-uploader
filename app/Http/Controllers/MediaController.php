<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Media;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function upload_form(string $hash): Factory|Application|View
    {
        $album = Album::query()->where('hash', $hash)->first();
        return view('media.upload', [
            'name' => $album->name,
        ]);
    }

    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('media', 'public'); // przechowywanie w publicznym dysku
dd($request);
        $album = Album::query()->where('hash', $request->get('hash'))->first();

        Media::query()->create([
            'album_id' => $album->id,
            'file_path' => $path,
            'mime_type' => $file->getClientMimeType(),
        ]);

        return response()->json(['message' => 'Media uploaded successfully!'], 201);
    }

}
