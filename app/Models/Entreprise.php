<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    public function message()
    {
        return $this->hasMany(Message::class,'entreprise_id');
    }
    public function tache()
    {
        return $this->hasMany(Tache::class,'entreprise_id');
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}
