<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedProgram;

class LatestController extends Controller
{
    public function index()
    {
        $completedPrograms = CompletedProgram::orderBy('date', 'desc')->get();
        return view('latest.index', compact('completedPrograms'));
    }
}
