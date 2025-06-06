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
    <a href="#" class="me-3">Latest Program</a>
        <a href="{{ route('logout') }}" class="btn">Logout</a>
    </div>
</div>

<div class="container mt-5">
    <h2>Edit Program</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('programs.update', $program->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        @method('PUT')

        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" value="{{ $program->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" required>{{ $program->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Date:</label>
            <input type="date" name="date" value="{{ $program->date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Location:</label>
            <input type="text" name="location" value="{{ $program->location }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Time:</label>
            <input type="text" name="time" value="{{ $program->time }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Poster (Image):</label>
            <input type="file" name="poster" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Report (PDF or DOC):</label>
            <input type="file" name="report" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        <input type="submit" value="Update" class="btn btn-primary">
    </form>
</div>
@endsection
