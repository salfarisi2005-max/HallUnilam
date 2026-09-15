<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketItem extends Model
{
    use HasFactory;

    protected $table = 'paket_items';

    protected $fillable = [
        'paket_id',
        'nama_item',
        'tipe',
        'nilai',
        'urutan',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
