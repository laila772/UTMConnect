<?php

namespace App\Http\Controllers;

use App\Models\CompletedProgram;
use Illuminate\Http\Request;

class CompletedProgramController extends Controller
{
    public function index()
    {
        $completedPrograms = CompletedProgram::orderBy('date', 'desc')->get();
        return view('completedPrograms.index', compact('completedPrograms'));
    }

    public function destroy($id)
    {
        $program = CompletedProgram::findOrFail($id);
        $program->delete();

        return redirect()->route('completedPrograms.index')->with('success', 'Program deleted successfully.');
    }
}
