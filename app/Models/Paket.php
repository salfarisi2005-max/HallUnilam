<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'nama_paket',
        'jenis',
        'amount',
        'waktu',
        'catatan',
        'urutan',
        'aktif',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'aktif' => 'boolean',
    ];

    public function items()
    {
        return $this->hasMany(PaketItem::class)->orderBy('urutan')->orderBy('id');
    }
}
