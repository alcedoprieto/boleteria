@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-center">Bienvenido</h1>

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <table class="table table-responsive" id="boletos-table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Valor</th>
                    <th>Fin</th>
                    <th>Evento</th>
                    <th>Cantidad</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($boletos as $boleto)
                <tr>
                    <td>{!! $boleto->codigo !!}</td>
                    <td>{!! $boleto->valor + $boleto->iva !!}</td>
                    <td>{!! $boleto->fin !!}</td>
                    <td>{!! $boleto->nombre !!}</td>
                    <td>{!! $boleto->cantidad !!}</td>
                    <td>
                        <a href="#" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i>Comprar</a>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body"></div>
        </div>
        <div class="text-center"></div>
    </div>
@endsection