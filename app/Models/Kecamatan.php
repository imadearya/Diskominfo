<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function bencana(){
        return $this->hasMany(Bencana::class);
    }
    public function penampungan(){
        return $this->hasMany(Penampungan::class);
    }
    public function kecamatan(){
        return $this->hasMany(User::class);
    }

}
