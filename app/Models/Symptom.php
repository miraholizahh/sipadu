<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roles;

class Symptom extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_gejala',
        'nama_gejala',
    ];

}
