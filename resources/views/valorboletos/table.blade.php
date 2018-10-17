<table class="table table-responsive" id="valorboletos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
        <th>Valor</th>
        <th>Iva</th>
        <th>Activo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($valorboletos as $valorboleto)
        <tr>
            <td>{!! $valorboleto->nombre !!}</td>
            <td>{!! $valorboleto->descripcion !!}</td>
            <td>{!! $valorboleto->valor !!}</td>
            <td>{!! $valorboleto->iva !!}</td>
            <td>{!! $valorboleto->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['valorboletos.destroy', $valorboleto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('valorboletos.show', [$valorboleto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('valorboletos.edit', [$valorboleto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>