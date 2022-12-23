<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        "tanggal",
        "user_id",
        "nopol",
        "jenis_kendaraan_id",
        "jenis_transmisi_id",
        "tahun",
        "bahan_bakar",
        "keluhan",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenis_transmisi()
    {
        return $this->belongsTo(JenisTransmisi::class);
    }

    public function jenis_kendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class);
    }
}
