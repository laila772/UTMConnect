@extends('layouts.app')

@section('content')

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<div class="navbar">
    <a href="#">PERSAKA CLUB</a>
    <div class="float-end">
        <a href="{{ route('admin') }}" class="me-3">Homepage</a>
        <a href="{{ route('program.create') }}" class="me-3">Add Program</a>
        <a href="{{ route('completedPrograms.index') }}" class="me-3">Latest Program</a>
        <a href="{{ route('participants.index') }}" class="me-3">Participant List</a>
        <a href="{{ route('logout') }}" class="btn">Logout</a>
    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4">Participant List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search by name or program title">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Matric Number</th>
                <th>Program</th>
                <th>Course & Year</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Status</th>
                <th>Rejection Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($participants as $participant)
                <tr>
                    <td>{{ $participant->user->name ?? 'N/A' }}</td>
                    <td>{{ $participant->user->password ?? 'N/A' }}</td>
                    <td>{{ $participant->program->title ?? 'N/A' }}</td>
                    <td>{{ $participant->course_year }}</td>
                    <td>{{ $participant->phone_number }}</td>
                    <td>{{ $participant->desired_position }}</td>
                    <td>
                        @if($participant->status == 'accepted')
                            <span class="badge bg-success">Accepted</span>
                        @elseif($participant->status == 'rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-secondary">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if($participant->status == 'rejected')
                            {{ $participant->rejection_reason }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('participants.updateStatus', $participant->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" class="btn btn-success btn-sm">Accept</button>
                        </form>

                        <!-- Reject button triggers modal -->
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $participant->id }}">
                            Reject
                        </button>

                        <!-- Rejection Modal -->
                        <div class="modal fade" id="rejectModal{{ $participant->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $participant->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('participants.updateStatus', $participant->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="rejected">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rejectModalLabel{{ $participant->id }}">Reject Reason</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="rejection_reason" class="form-label">Reason for rejection:</label>
                                                <textarea name="rejection_reason" class="form-control" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Submit Rejection</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center">No participants found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
