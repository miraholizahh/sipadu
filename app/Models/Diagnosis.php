<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis';
    
    protected $fillable = [
        'tanggal_diagnosa',
        'hasil_diagnosa',
        'idUser',
        'idDisease',
        'idDempsterShafer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function symptom()
    {
        return $this->belongsToMany(Symptom::class, 'symptom_diagnosis', 'idDiagnosis', 'idSymptom');
    }
    
    public function disease()
    {
        return $this->belongsTo(Disease::class, 'idDisease');
    }

    public function dempsterShafer()
    {
        return $this->belongsTo(DempsterShafer::class, 'idDempsterShafer');
    }
}
