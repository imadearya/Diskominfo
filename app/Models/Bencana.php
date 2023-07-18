<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    use HasFactory;
    protected $keyType = 'string'; // Menandakan bahwa tipe data ID adalah string
    public $incrementing = false; // Menonaktifkan incrementing pada ID
    protected $primaryKey = 'bencana_id';
    protected $fillable = [
        'bencana_id',
        'kecamatan_id',
        'nama',
        'tanggal',
        'status',
        'deskripsi',
    ];

    public $timestamps = false;

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    public function kerusakan(){
        return $this->hasMany(Rusak::class);
    }
    public function korban(){
        return $this->hasMany(Rusak::class);
    }
}
