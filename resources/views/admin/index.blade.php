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
    <h2 class="section-title">Upcoming Events</h2>

    @foreach($programs as $program)
    <div class="event-container">
        <div class="event-date">
            <div>{{ date('d', strtotime($program->date)) }}</div>
            <small>{{ date('M Y', strtotime($program->date)) }}</small>
        </div>

        <img src="{{ asset($program->poster) }}" alt="Program Poster" class="event-image">

        <div class="event-details">
            <div class="event-title"> {{ $program->title }} </div>
            <p> {{ $program->description }} </p>
            <hr>
            <div class="event-meta">
                <p><strong>Location:</strong> {{ $program->location }}</p>
                <p><strong>Time:</strong> {{ $program->time }}</p>
            </div>

            <div class="action-buttons">
            <a href="{{ route('programs.edit', $program->id) }}" class="btn-edit">Edit</a>

            <a href="{{ route('admin.complete', $program->id) }}" 
            class="btn-completed"
            onclick="return confirm('Mark this program as completed?')">
            Completed
            </a>

            @if($program->report)
                <a href="{{ asset($program->report) }}" target="_blank" class="btn-view">View Report</a>
            @endif

            @if($program->poster)
                <a href="{{ asset($program->poster) }}" target="_blank" class="btn-view">View Poster</a>
            @endif

            <form action="{{ route('programs.toggleRegistration', $program->id) }}" method="POST" style="display:inline-block">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn {{ $program->registration_open ? 'btn-danger' : 'btn-success' }}">
                    {{ $program->registration_open ? 'Close Registration' : 'Open Registration' }}
                </button>
            </form>
        </div>

        </div>
    </div>
    @endforeach
</div>
@endsection
