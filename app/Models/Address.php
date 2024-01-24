<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'line_1',
        'line_2',
        'city',
        'state',
        'country',
        'pincode',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
