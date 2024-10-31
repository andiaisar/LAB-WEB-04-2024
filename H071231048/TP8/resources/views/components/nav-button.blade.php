<a href="{{ route($route) }}" style="
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
    background-color: {{ Request::routeIs($route) ? '#34495e' : 'transparent' }};
    transition: background-color 0.3s;
">
    {{ $slot }}
</a>