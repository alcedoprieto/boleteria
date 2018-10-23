<table class="table table-responsive" id="eventos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Logo</th>
        <th>Lugar</th>
        <th>Descripcion</th>
        <th>Website</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Ciudad</th>
        <th>Poster</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventos as $evento)
        <tr>
            <td>{!! $evento->nombre !!}</td>
            <td><img src="{!! $evento->logo !!}" class="logoEvento"></td>
            <td>{!! $evento->lugar !!}</td>
            <td>{!! $evento->descripcion !!}</td>
            <td>{!! $evento->website !!}</td>
            <td>{!! $evento->fecha !!}</td>
            <td>{!! $evento->hora !!}</td>
            <td>{!! $evento->mobile !!}</td>
            <td>{!! $evento->email !!}</td>
            <td>{!! $evento->latitud !!}</td>
            <td>{!! $evento->longitud !!}</td>
            <td>{!! $evento->ciudad !!}</td>
            <td><img src="{!! $evento->poster !!}" class="posterEvento"></td>
            <td>
                {!! Form::open(['route' => ['eventos.destroy', $evento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventos.show', [$evento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventos.edit', [$evento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>