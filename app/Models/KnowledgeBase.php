<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
    use HasFactory;
    
    protected $table = 'knowledge_bases';

    protected $fillable = [
        'bobot',
        'idSymptom',
        'idDisease',
    ];

    public function symptom()
    {
        return $this->belongsTo(Symptom::class, 'idSymptom');
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'idDisease');
    }

}
