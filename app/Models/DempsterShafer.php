<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DempsterShafer extends Model
{
    use HasFactory;
    protected $fillable = [
        'belief',
        'plausibility',
        'idBasisPengetahuan',
    ];

    public function knowledge_bases()
    {
        return $this->belongsTo(KnowledgeBase::class, 'idBasisPengetahuan');
    }
}
