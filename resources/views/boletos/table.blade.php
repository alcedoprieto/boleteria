<table class="table table-responsive" id="boletos-table">
    <thead>
        <tr>
            <th>Codigo</th>
        <th>Idvalor</th>
        <th>Activo</th>
        <th>Idevento</th>
        <th>Iduser</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($boletos as $boleto)
        <tr>
            <td>{!! $boleto->codigo !!}</td>
            <td>{!! $boleto->idvalor !!}</td>
            <td>{!! $boleto->activo !!}</td>
            <td>{!! $boleto->idevento !!}</td>
            <td>{!! $boleto->iduser !!}</td>
            <td>
                {!! Form::open(['route' => ['boletos.destroy', $boleto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('boletos.show', [$boleto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('boletos.edit', [$boleto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>