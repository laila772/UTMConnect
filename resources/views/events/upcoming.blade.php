@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<section class="events-section section-bg section-padding" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h2 class="mb-lg-3">Upcoming Events</h2>
            </div>

            @foreach ($events as $event)
            <div class="event-container">
                <div class="event-date">
                    <div>{{ \Carbon\Carbon::parse($event->date)->format('d') }}</div>
                    <small>{{ \Carbon\Carbon::parse($event->date)->format('M Y') }}</small>
                </div>

                <img src="{{ asset($event->poster) }}" alt="Program Poster" class="event-image">

                <div class="event-details">
                    <div class="event-title">{{ $event->title }}</div>
                    <p>{{ $event->description }}</p>
                    <hr>
                    <div class="event-meta">
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Time:</strong> {{ $event->time }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
