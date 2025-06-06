<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program; // Assuming you have a 'Program' model

class DashboardController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('date', 'desc')->get();
        return view('dashboard', compact('programs'));
    }
}
