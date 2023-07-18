<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penampungan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function alat(){
        return $this->hasMany(Alat::class);
    }
    public function sembako(){
        return $this->hasMany(Sembako::class);
    }

    public function pengungsi(){
        return $this->hasMany(Pengungsi::class);
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
}
