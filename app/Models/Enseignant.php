<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Enseignant extends Authenticatable
{
    use HasFactory;
    protected $guard = [];
    public function matieres()
    {
        return $this->belongsToMany(Matiere::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function ecole()
    {
        return $this->belongsTo(Ecole::class);
    }
    //protected $primaryKey = 'id';
  //  protected $foreignKey = '';
   // protected $fillable = ['nom','prenom','date_n','email','telephone','adresse','cv'];
}
