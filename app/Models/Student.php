<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'gender',
        'image',
        'document',
        'status',
        'note',
    ];

    protected $casts = [
        'status' => 'boolean',
        'dob' => 'date',
    ];

    //  full name accessor
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }

    

    // Auto-generate student_id on create
    protected static function booted()
    {
        static::creating(function ($student) {
            if (!$student->student_id) {
                $lastStudent = self::latest('id')->first();
                $number = $lastStudent ? ((int) substr($lastStudent->student_id, 1)) + 1 : 1;
                $student->student_id = 'S' . str_pad($number, 4, '0', STR_PAD_LEFT);
            }
        });
    }
    public function classSessions()
    {
        return $this->belongsToMany(ClassSession::class, 'class_session_student', 'student_id', 'class_session_id');
    }



}
