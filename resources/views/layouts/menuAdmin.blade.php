@if(Auth::user()->hasRole('admin'))
<li class="{{ Request::is('valorboletos*') ? 'active' : '' }}">
    <a href="{!! route('valorboletos.index') !!}"><i class="fa fa-edit"></i><span>Valorboletos</span></a>
</li>
<li class="{{ Request::is('eventos*') ? 'active' : '' }}">
    <a href="{!! route('eventos.index') !!}"><i class="fa fa-edit"></i><span>Eventos</span></a>
</li>
<li class="{{ Request::is('boletos*') ? 'active' : '' }}">
    <a href="{!! route('boletos.index') !!}"><i class="fa fa-edit"></i><span>Boletos</span></a>
</li>
@else
<li>
    <a href="#"><i class="fa fa-edit"></i><span>Comprar Entrada</span></a>
</li>
@endif