@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')
    @component('components.message-card')
        @slot('title')
            Get in Touch
        @endslot
        @slot('message')
            We'd love to hear from you! Feel free to reach out with any questions, feedback, or reservation requests.
        @endslot
        <div style="margin-top: 2rem;">
            <h3 style="color: #2c3e50;">Contact Information</h3>
            <p><strong>Phone:</strong> +62 852-5603-6050</p>
            <p><strong>Email:</strong> cafeyaa@gmai.com</p>
            <p><strong>Hours:</strong> Monday, Thursday, and Saturday: 10:00 AM</p>
        </div>
    @endcomponent
@endsection