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
        <th>Disponibilidad</th>
        <th></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($boletos as $boleto)
        <tr>
            <td>{!! $boleto->codigo !!}</td>
            <td name="valor">{!! $boleto->valor + $boleto->iva !!}</td>
            
          
            <td>{!! $boleto->fin !!}</td>
            <td>{!! $boleto->nombre !!}</td>
            <td>{!! $boleto->cantidad !!}</td>
           <td>Cantidad: <input id="cant{!! $boleto->codigo !!}" type="number" name="cantidad" min="1" onclick="modalBoletos('{!! $boleto->codigo !!}',{!! $boleto->valor + $boleto->iva !!})"></td>
            <td>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Costo: <input id="idcosto" type="text" name="costo"><br>
                  <input type="submit" value="Comprar" onclick="realizarPago()">
        <div class="cajita" id="cajita">
            <div class="pull-right align-top">
                <a class="linkCerrar" id="linkCerrar" href="#" onclick="cerrarCajita()">Cerrar</a>
                <form id="kushki-pay-form" action="{{route('kushki.store')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

    <script>
        function modalBoletos(Codigo,Valor) {
            console.log(Codigo +" - "+Valor);
            console.log(document.getElementById("cant"+Codigo).value);
            tmp = 0;
            for (i = 0; i < $("[name='cantidad']").length; i++) {
                tmp = tmp + $("[name='cantidad']")[i].value * $("[name='valor']")[i].innerHTML;
                }
            $("#idcosto").val(tmp.toFixed(2)); 
            }

        function realizarPago(){
            $("input").prop('disabled', true);
            var kushki = new KushkiCheckout({
                form: "kushki-pay-form",
                merchant_id: "10000002310042414718149002935532",
                amount: $("#idcosto").val(),
                currency: "USD", 
                payment_methods:["credit-card"] ,
                is_subscription: false,
                inTestEnvironment: true
            });
            $( "#linkCerrar" ).css("display","block");
        }

        function cerrarCajita() {
            $( "#kushki-pay-form" ).empty();
            $( "#linkCerrar" ).css("display","none");
            $("input").prop('disabled', false);
        }
    </script>
@endsection