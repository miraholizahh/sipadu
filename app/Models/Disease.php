<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
        'keterangan',
    ];

    public function solutions()
    {
        return $this->hasMany(Solution::class, 'idDisease');
    }
}
