<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $table = 'presence';

    protected $fillable = ['id_etudiant', 'id_exam', 'present'];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'id_etudiant');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'id_exam');
    }
    public $timestamps = false;

}
