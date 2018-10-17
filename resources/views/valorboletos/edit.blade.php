@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Valorboleto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($valorboleto, ['route' => ['valorboletos.update', $valorboleto->id], 'method' => 'patch']) !!}

                        @include('valorboletos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection