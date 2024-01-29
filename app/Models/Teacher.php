<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'gender', 'age', 'certifications', 'classrooms', 'designation','specialist'];
    protected $casts = [
        'certifications' => 'array',
    ];
    public function certifications()
    {
        return $this->belongsToMany(Certification::class)->withTimestamps();
    }

     public function classrooms()
    {
        return $this->belongsToMany(Classroom::class)->withTimestamps();
    }
}
