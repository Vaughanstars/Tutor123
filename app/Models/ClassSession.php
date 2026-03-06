<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSession extends Model
{

    protected $casts = [
        'start_time' => 'datetime',
    ];
    
    protected $fillable = [
        'title',
        'description',
        'class_date',
        'start_time',
        'end_time',
        'teacher_id',
        'status',
        'class_link',
    ];

    // Single teacher
    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

// Many students
//     public function students() {
//     return $this->belongsToMany(Student::class, 'class_session_student'); // pivot table
// }

  public function students()
    {
        return $this->belongsToMany(Student::class, 'class_session_student', 'class_session_id', 'student_id');
    }



}
