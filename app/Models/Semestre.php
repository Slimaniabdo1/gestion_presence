<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;

    protected $table = 'semestre';
    protected $fillable = ['nom', 'id_filiere'];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere', 'id_filiere');
    }


    public function modules()
    {
        return $this->hasMany(Module::class, 'id_semestre');
    }
}
