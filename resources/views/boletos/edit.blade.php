@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Boleto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($boleto, ['route' => ['boletos.update', $boleto->id], 'method' => 'patch']) !!}

                        @include('boletos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection