<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeEcole extends Model
{
    use HasFactory;
    public function ecoles()
{
    return $this->hasMany(Ecole::class, 'typeecole_id');
}
}
