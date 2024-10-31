@extends('layouts.master')

@section('title', 'About Us')

@section('content')
    @component('components.message-card')
        @slot('title')
            Our Story
        @endslot
        @slot('message')
        CAFEYA was founded in 2024, precisely in October, with a vision to provide experience for starting an extraordinary business. A team of seven passionate and friendly people work together to create unforgettable moments.
        @endslot
    @endcomponent
    
    @component('components.message-card')
        @slot('title')
            Our Values
        @endslot
        @slot('message')
        We present quality pastels from selected materials, support local products, and always prioritize sustainability
        @endslot
    @endcomponent
@endsection