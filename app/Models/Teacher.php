<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $hidden = [
        'password',
    ];

    //  Add all columns that you want to allow mass assignment
    protected $fillable = [
        'teacher_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'phone',
        'dob',
        'gender',
        'image',
        'teacher_id_document',
        'status',
        'qualification',
        'years_of_experience',
    ];

    protected static function booted()
    {
        static::creating(function ($teacher) {
            $lastTeacher = self::orderBy('id', 'desc')->first();
            $nextNumber = 1;
            if ($lastTeacher && $lastTeacher->teacher_id) {
                $lastNumber = (int) str_replace('T', '', $lastTeacher->teacher_id);
                $nextNumber = $lastNumber + 1;
            }
            $teacher->teacher_id = 'T' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        });
    }


    public function classes()
    {
        return $this->hasMany(ClassSession::class);
    }
    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }


}
