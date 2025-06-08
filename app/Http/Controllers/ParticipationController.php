<?php

namespace App\Http\Controllers;

use App\Models\Participation;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParticipationsExport;

class ParticipationController extends Controller
{

    public function create($program_id)
    {
        $program = Program::findOrFail($program_id);
        return view('participate.create', compact('program'));
    }

    // Store participation (for users)
    public function store(Request $request)
{
    $validated = $request->validate([
        'program_id' => 'required|exists:programs,id',
        'name' => 'required',
        'course_year' => 'required',
        'phone_number' => 'required',
        'desired_position' => 'required',
    ]);

    $validated['user_id'] = Auth::id(); // ✅ Correctly assigns the logged-in user

    Participation::create($validated);

    return redirect()->route('dashboard')->with('success', 'Successfully registered!');
}


    // Admin: View participant list with search filter
    public function index(Request $request)
    {
        $search = $request->input('search');

        $participants = Participation::with('program')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhereHas('program', function ($q) use ($search) {
                          $q->where('title', 'like', "%{$search}%");
                      });
            })
            ->get();

        return view('admin.participants', compact('participants', ['search' => '']));
    }

    // Admin: Update participation status
    public function updateStatus(Request $request, $id)
{
    $participant = Participation::findOrFail($id);
    $participant->status = $request->status;

    if ($request->status === 'rejected') {
        $participant->rejection_reason = $request->rejection_reason;
    } else {
        $participant->rejection_reason = null;
    }

    $participant->save();

    return redirect()->back()->with('success', 'Participant status updated successfully.');
}

    public function myStatus()
{
    $participations = Participation::with('program')
        ->where('user_id', auth()->id())
        ->get();

    return view('participation_status', compact('participations'));
}


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Optional: Export to Excel
    // public function export()
    // {
    //     return Excel::download(new ParticipationsExport, 'participants.xlsx');
    // }
}
