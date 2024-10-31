@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="hero-section">
        <div class="hero-overlay">
            <h1>Welcome to CAFEYA</h1>
            <p>Discover our delicious menu featuring fresh, locally-sourced ingredients</p>
        </div>
    </div>
    <div class="featured-items">
        <h2 class="section-title">Our Featured Menu</h2>
        <div class="menu-grid">
            <div class="menu-item">
                <img src="{{ asset('img/jalkot.jpg') }}" alt="Menu Item 1" style="width: 200px; height: auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 10px;">
                <h3>Special Menu</h3>
                <p>Enjoy Our Premium Jalkot Specials</p>
            </div>
        </div>
    </div>
@endsection