<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    protected $fillable = [
        'solusi',
        'idDisease'
    ];

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'idDisease');
    }
}
