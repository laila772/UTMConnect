<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'program_id', 'name', 'course_year', 'phone_number', 'desired_position'
    ];

    public function program()
{
    return $this->belongsTo(Program::class);
}

// App\Models\Participant.php
public function user()
{
    return $this->belongsTo(User::class);
}


}
