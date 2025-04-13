<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = 'module';
    protected $fillable = ['nom', 'id_semestre', 'id_filiere'];

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'id_semestre');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere', 'id_filiere');
    }


    public function exams()
    {
        return $this->hasMany(Exam::class, 'id_module', 'id_module');
    }
}
