<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    use HasFactory;
    protected $table = 'ues';

    public function emplois()
    {
        return $this->hasMany(Emplois::class, 'ue');
    }
}
