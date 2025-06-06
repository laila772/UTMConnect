<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\CompletedProgram;

class AdminController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('date', 'desc')->get();
        return view('admin.index', compact('programs'));
    }

    public function markCompleted($id)
    {
        $program = Program::findOrFail($id);

        // Move the program to the completed_programs table
        CompletedProgram::create($program->toArray());

        // Delete the program from the original table
        $program->delete();

        return redirect()->route('admin')->with('success', 'Program marked as completed.');
    }

    public function showParticipations($id)
{
    $program = Program::with('participations')->findOrFail($id);
    return view('admin.participations', compact('program'));
}
}
