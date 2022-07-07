<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'slug',
    ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'produk_id', 'id');
    }
}
