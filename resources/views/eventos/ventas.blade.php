@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ventas del Evento {!! $evento->nombre !!}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <table class="table table-responsive" id="boletos-table">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Valor</th>
                                <th>Cantidad</th>
                                <th>Vendidos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($boletos as $boleto)
                            <tr>
                                <td>{!! $boleto->codigo !!}</td>
                                <td>{!! $boleto->valor + $boleto->iva !!}</td>
                                <td>{!! $boleto->cantidad !!}</td>
                                <td>
                                    @foreach ($tickets as $ticket)
                                        @if ( $boleto->id == $ticket['id'] )
                                            {{ $ticket['cantidad'] }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
