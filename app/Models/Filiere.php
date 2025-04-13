<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $table = 'filiere';

    protected $fillable = ['id_filiere','nomF'];

    public function semestres()
    {
        return $this->hasMany(Semestre::class, 'id_filiere');
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class, 'id_filiere');
    }
}
