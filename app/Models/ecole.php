<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    
    public function typeecole()
    {
        return $this->belongsTo(typeEcole::class);
    }
}
