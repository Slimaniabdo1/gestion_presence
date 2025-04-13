<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $table = 'etudiant';

    protected $fillable = ['nom', 'prenom', 'apogee', 'id_filiere', 'id_semestre'];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere', 'id_filiere');
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'id_semestre', 'id_semestre');
    }


    public function presences()
    {
        return $this->hasMany(Presence::class, 'id_etudiant');
    }
}
