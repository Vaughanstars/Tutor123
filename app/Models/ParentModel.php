<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;
    protected $table = 'parents';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'student_id',
        'relation',
        'note',
        'password',
        'photo',
    ];

    protected $hidden = [
        'password',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
