<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exam';

    protected $fillable = ['id_module', 'dateD', 'dateF'];

    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module', 'id_module');
    }

    public function presences()
    {
        return $this->hasMany(Presence::class, 'id_exam');
    }
}
