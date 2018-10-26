<div>
    @if (Auth::guest())
    <p>Frequenza</p>
    @else
    <p>{{ Auth::user()->name}}</p>
    @endif
    <!-- Status -->
    <a href="#"><i></i> Online</a>
</div>

