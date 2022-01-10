<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $table = 'tb_master';
    protected $primaryKey = 'nosp';
    protected $guarded = [];

     public function jenis()
    {
        return $this->hasOne(Jenis::class, 'jns', 'jns');
    }

     public function kodekota()
    {
        return $this->hasOne(Kota::class, 'kode_kota', 'kota');
    }

     public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'no_kwitansi', 'kwitansi');
    }
}