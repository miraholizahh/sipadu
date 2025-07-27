<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Model\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'rayhan',
            'email' => 'rayhan@gmail.com',
            'telepon' => '089516982907',
            'password' => Hash::make('09876543'),
            'alamat' => 'Jl. Surya Kencana, Sawah Gede, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43212',
            'jenis_kelamin' => 'Laki-laki',
            'remember_token' => Str::random(10),
            'idRole' => 1,
        ]);        
    }
}
