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
        return $this->hasOne(Tagihan::class, 'no_kwitansi', 'kwitansi')->orderBy('cicilan_ke','desc');
    }

    //  public function tagih1()
    // {
    //     return $this->hasMany(Tagihan::class, 'no_kwitansi', 'kwitansi',);
    // }
    //  public function tagih2()
    // {
    //     return $this->hasMany(Tagihan::class, 'cicilan_ke', 'cicilan_ke',);
    // }
    //  public function tagihan()
    // {
    //     $data= collect([$this->tagih1, $this->tagih2,]);
    //     return $data->unique();
    // }
}