<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function penampungan(){
        return $this->belongsTo(Penampungan::class);
    }
}
