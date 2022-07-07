<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id','nama','email','alamat','no_hp','kurir',
        'pembayaran','pembayaran_url','total_harga','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function TransaksiItem()
    {
        return $this->hasMany(TransaksiItem::class, 'transaksi_id', 'id');
    }

    }
