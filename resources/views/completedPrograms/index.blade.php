@extends('layouts.app')

@section('content')

<head>
    <title>Completed Programs</title>
    <link rel="stylesheet" href="{{ asset('css/completedPrograms.css') }}">
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
    <h2 class="section-title">Completed Programs</h2>
    <div class="event-container">
        @foreach ($completedPrograms as $program)
        <div class="event-card">
            <img src="{{ asset($program->poster) }}" alt="Program Poster" class="event-image">

            <div class="event-date-status">
                <div class="event-date">{{ \Carbon\Carbon::parse($program->date)->format('d M Y') }}</div>
                <div class="event-status">Completed</div>
            </div>

            <div class="event-details">
                <div class="event-title">{{ $program->title }}</div>
                <p>{{ $program->description }}</p>
                <hr>
                <div class="event-meta">
                    <p><strong>Location:</strong> {{ $program->location }}</p>
                    <p><strong>Time:</strong> {{ $program->time }}</p>
                </div>

                <div class="mt-4">
                    <form method="POST" action="{{ route('completedPrograms.destroy', $program->id) }}" onsubmit="return confirm('Are you sure you want to delete this program?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
