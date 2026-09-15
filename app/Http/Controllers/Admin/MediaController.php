<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::orderBy('jenis')->orderBy('urutan')->orderBy('id')->get();

        return view('Admin.media.index', compact('media'));
    }

    public function create()
    {
        return view('Admin.media.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);
        $data['path'] = $request->file('file')->store('media', 'public');
        unset($data['file']);

        Media::create($data);

        return redirect()->route('admin.media.index')->with('success', 'Media berhasil ditambahkan.');
    }

    public function edit(Media $media)
    {
        return view('Admin.media.edit', compact('media'));
    }

    public function update(Request $request, Media $media)
    {
        $data = $this->validated($request);

        if ($request->hasFile('file')) {
            $this->deleteUploadedFile($media->path);
            $data['path'] = $request->file('file')->store('media', 'public');
        }

        unset($data['file']);
        $media->update($data);

        return redirect()->route('admin.media.index')->with('success', 'Media berhasil diperbarui.');
    }

    public function destroy(Media $media)
    {
        $this->deleteUploadedFile($media->path);
        $media->delete();

        return redirect()->route('admin.media.index')->with('success', 'Media berhasil dihapus.');
    }

    private function validated(Request $request, bool $fileRequired = false): array
    {
        return $request->validate([
            'jenis' => 'required|in:hero,galeri',
            'judul' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:255',
            'alt' => 'required|string|max:255',
            'urutan' => 'required|integer|min:0',
            'aktif' => 'nullable|boolean',
            'file' => [$fileRequired ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]) + ['aktif' => $request->boolean('aktif')];
    }

    private function deleteUploadedFile(string $path): void
    {
        if (! str_starts_with($path, 'images/')) {
            Storage::disk('public')->delete($path);
        }
    }
}
