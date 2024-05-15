<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trimestre extends Model
{
    use HasFactory;
    protected $table = 'trimestres';

    public function emplois()
    {
        return $this->hasMany(Emplois::class, 'trimestre');
    }
}
