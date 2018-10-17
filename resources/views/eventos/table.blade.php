<table class="table table-responsive" id="eventos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
        <th>Email</th>
        <th>Logo</th>
        <th>Fecha</th>
        <th>Hora</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventos as $evento)
        <tr>
            <td>{!! $evento->nombre !!}</td>
            <td>{!! $evento->descripcion !!}</td>
            <td>{!! $evento->email !!}</td>
            <td>{!! $evento->logo !!}</td>
            <td>{!! $evento->fecha !!}</td>
            <td>{!! $evento->hora !!}</td>
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