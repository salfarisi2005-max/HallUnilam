<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'jenis',
        'judul',
        'caption',
        'alt',
        'path',
        'urutan',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function publicUrl(): string
    {
        return str_starts_with($this->path, 'images/')
            ? asset($this->path)
            : asset('storage/'.ltrim($this->path, '/'));
    }
}
