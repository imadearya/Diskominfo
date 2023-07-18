<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alat;
use App\Models\User;
use App\Models\Rusak;
use App\Models\Korban;
use App\Models\Pemkot;
use App\Models\Bencana;
use App\Models\Sembako;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Penampungan;
use App\Models\Pengungsi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('admin123'),
            'nama'=> 'Admin',
            'role'=> '1',
            'status'=> '1',
            'kecamatan_id'=> '1',
        ]);

        User::create([
            'email'=> 'pemkot@gmail.com',
            'password'=> bcrypt('pemkot123'),
            'nama'=> 'Pemerintah Kota Semarang',
            'role'=> '3',
            'foto'=> 'semarang.png',
            'status'=> '1',
            'kecamatan_id'=> '1',
        ]);
        Kecamatan::create([
            'nama'=>'Banyumanik'
        ]);
        Kecamatan::create([
            'nama'=>'Gunungpati'
        ]);
        Kecamatan::create([
            'nama'=>'Tembalang'
        ]);
        Kecamatan::create([
            'nama'=>'Mijen'
        ]);
        Kecamatan::create([
            'nama'=>'Pedurungan'
        ]);

        Bencana::factory(21)->create();
        Penampungan::factory(5)->create();
        Korban::factory(20)->create();
        Pengungsi::factory(20)->create();
        Rusak::factory(10)->create();
        Alat::factory(10)->create();
    }
}
