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
    ];

    public function knowledge_bases()
    {
        return $this->belongsToMany(KnowledgeBase::class, 'dempster_shafer_knowledge_base', 'dempster_shafer_id', 'knowledge_base_id')->withTimestamps();
    }

    public function diagnosis()
    {
        return $this->hasMany(Diagnosis::class, 'idDempsterShafer');
    }

}
