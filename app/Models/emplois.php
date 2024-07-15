<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplois extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'emplois';

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function matiere()
    {
        return $this->BelongsToMany(Matiere::class);
    }
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }
    public function emploisMatieres()
    {
        return $this->hasMany(EmploisMatiere::class);
    }
}
