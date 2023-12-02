<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'class', 'teacher_id'];

    // Student model
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
