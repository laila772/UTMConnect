<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.add_program');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'time' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif',
            'report' => 'required|mimes:pdf,doc,docx',
        ]);

        // Ensure the upload directories exist
        if (!file_exists(public_path('uploads/poster'))) {
            mkdir(public_path('uploads/poster'), 0755, true);
        }

        if (!file_exists(public_path('uploads/report'))) {
            mkdir(public_path('uploads/report'), 0755, true);
        }

        // Poster upload
        if ($request->hasFile('poster')) {
            $posterName = time() . '_' . $request->file('poster')->getClientOriginalName();
            $request->file('poster')->move(public_path('uploads/poster'), $posterName);
            $posterPath = 'uploads/poster/' . $posterName;
        }

        // Report upload
        if ($request->hasFile('report')) {
            $reportName = time() . '_' . $request->file('report')->getClientOriginalName();
            $request->file('report')->move(public_path('uploads/report'), $reportName);
            $reportPath = 'uploads/report/' . $reportName;
        }

        // Insert data
        Program::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'time' => $request->time,
            'poster' => $posterPath,
            'report' => $reportPath
        ]);

        return redirect()->route('admin')->with('success', 'Program added successfully!');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    // Handle update logic
    public function update(Request $request, $id)
{
    $program = Program::findOrFail($id);

    // Ensure the upload directories exist
    if (!file_exists(public_path('uploads/poster'))) {
        mkdir(public_path('uploads/poster'), 0755, true);
    }

    if (!file_exists(public_path('uploads/report'))) {
        mkdir(public_path('uploads/report'), 0755, true);
    }

    // Handle Poster Upload
    if ($request->hasFile('poster')) {
        $posterName = time() . '_' . $request->file('poster')->getClientOriginalName();
        $request->file('poster')->move(public_path('uploads/poster'), $posterName);
        $program->poster = 'uploads/poster/' . $posterName;
    }

    // Handle Report Upload
    if ($request->hasFile('report')) {
        $reportName = time() . '_' . $request->file('report')->getClientOriginalName();
        $request->file('report')->move(public_path('uploads/report'), $reportName);
        $program->report = 'uploads/report/' . $reportName;
    }

    // Update other fields
    $program->title = $request->title;
    $program->description = $request->description;
    $program->date = $request->date;
    $program->location = $request->location;
    $program->time = $request->time;

    $program->save();

    return redirect()->route('admin')->with('success', 'Program updated successfully!');
}

public function toggleRegistration($id)
{
    $program = Program::findOrFail($id);
    $program->registration_open = !$program->registration_open;
    $program->save();

    return back()->with('success', 'Registration status updated.');
}


}