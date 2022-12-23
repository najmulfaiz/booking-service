<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartCategory extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'nama'
    ];

    public function part()
    {
        return $this->hasMany(Part::class);
    }
}
