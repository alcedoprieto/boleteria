@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evento
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('eventos.show_fields')
                    <a href="{!! route('eventos.index') !!}" class="btn btn-default">Back</a>
                    <a href="{{action('boletoController@create', $evento->id)}}" class="btn btn-default">Agregar Boletos</a>
                </div>
            </div>
        </div>
    </div>
@endsection
