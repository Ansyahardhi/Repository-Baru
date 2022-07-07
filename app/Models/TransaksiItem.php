<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','produk_id','transaksi_id'
    ];

    public function product()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }

}
