<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';  // Database table name
    protected $fillable = [
        'title', 'description', 'date', 'location', 'time', 'poster', 'report'
    ];

    public $timestamps = true; // Ensure timestamps are enabled

    public function participations()
{
    return $this->hasMany(Participation::class);
}

}


