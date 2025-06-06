<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedProgram extends Model
{
    use HasFactory;

    public $timestamps = false; // Disable timestamps

    protected $table = 'completed_programs'; // Table name
    protected $fillable = ['title', 'description', 'date', 'location', 'time', 'poster', 'report'];
}
