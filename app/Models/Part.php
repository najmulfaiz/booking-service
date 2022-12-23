<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'nama',
        'harga',
        'image',
        'part_category_id',
    ];

    public function part_category()
    {
        return $this->belongsTo(PartCategory::class);
    }
}
