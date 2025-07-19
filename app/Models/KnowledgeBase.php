<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
    use HasFactory;
    
    protected $table = 'knowledge_base';

    protected $fillable = [
        'bobot',
        'idSymptom',
        'idDisease',
        'idDempsterShafer',
    ];

    public function symptom()
    {
        return $this->belongsTo(Symptom::class, 'idSymptom');
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
