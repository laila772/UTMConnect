@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
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
    <h2>Add New Program</h2>
    <form method="POST" action="{{ route('program.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Time:</label>
            <input type="time" name="time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Poster (Image):</label>
            <input type="file" name="poster" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Report (PDF or DOC):</label>
            <input type="file" name="report" class="form-control" accept=".pdf,.doc,.docx" required>
        </div>
        <button type="submit" class="btn btn-success">Add Program</button>
    </form>
    
</div>
@endsection
