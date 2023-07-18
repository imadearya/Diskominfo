<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korban extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function bencana(){
        return $this->belongsTo(Bencana::class, 'bencana_id');
    }
}

