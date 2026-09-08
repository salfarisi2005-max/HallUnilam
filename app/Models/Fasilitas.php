<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaketDetail;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';

    protected $fillable = [
        'nama_fasilitas',
        'harga',
        'stok',
    ];

    public function paketDetail()
    {
        return $this->hasMany(PaketDetail::class, 'fasilitas_id');
    }
}