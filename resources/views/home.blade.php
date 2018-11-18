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
                   <td>Cantidad: <input id="{!! $boleto->codigo !!}" type="number" name="cantidad" min="0" onclick="modalBoletos()"></td>
                    <td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
Costo: <input id="idcosto" type="text" name="costo"><br>
                  <input type="submit" value="Comprar" onclick="realizarPago()"> <div id="resultado"> </div>
        <div class="cajita" id="cajita">
            <div class="pull-right align-top">
                <a class="linkCerrar" id="linkCerrar" href="#" onclick="cerrarCajita()">Cerrar</a>
               <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="elemento panel panel-default credit-card-box" >
            
                <div class="panel-body" style="padding-left: 5%;padding-right: 5%">
                    <form role="form" id="payment-form" method="POST" action="">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">Nombre y Apellido</label>
                                    <div class="input-group">

                                        <input type="text"  name="cardName" id="cardName" placeholder="Nombre y Apellido" autocomplete="off" required autofocus/>
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                 

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">Número de Tarjeta</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" name="cardNumber" id="cardNumber" placeholder="Número de Tarjeta Válido" autocomplete="off" required />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="cardExpiry">Fecha de Expiración</label>
                                    <input type="number"  name="cardExpiryMM" id="cardExpiryMM" placeholder="MM" autocomplete="off" maxlength="2" required/>
                                     <input type="number"  name="cardExpiryYY" id="cardExpiryYY" placeholder="YY" autocomplete="off" maxlength="2" required/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">Código CVC</label>
                                    <input type="password" class="form-control" name="cardCVC" id="cardCVC" placeholder="Código Seguridad" autocomplete="off" maxlength="4" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="subscribe btn btn-info btn-lg btn-block" type="button" onclick="solicitarToken();">Pagar</button>
                            </div>
                        </div>
                  
                            <div class="row" style="display:none;">
                                <div class="col-xs-12">
                                    <p class="payment-errors"></p>
                                </div>
                            </div>
                        <?php flash('example_message'); ?>
                    </form>
                </div>
            </div>
            <!-- CREDIT CARD FORM ENDS HERE -->

            </div>
        </div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body"></div>
        </div>
        <div class="text-center"></div>
    </div>

    <script>
        function modalBoletos() {
            tmp = 0;
            for (i = 0; i < $("[name='cantidad']").length; i++) {
                tmp = tmp + $("[name='cantidad']")[i].value * $("[name='valor']")[i].innerHTML;
                }
            $("#idcosto").val(tmp.toFixed(2)); 
            }

        function realizarPago(){
            $("[name='cantidad']").prop('disabled', true);
            $( "#linkCerrar" ).css("display","block");
            $( "#cajita" ).css("display","block");
        }

        function cerrarCajita() {
            $( "#kushki-pay-form" ).empty();
            $( "#linkCerrar" ).css("display","none");
            $("input").prop('disabled', false);
        }

        function solicitarToken(){
            $( "#cajita" ).css("display","none");
            $("#resultado").html("Procesando, espere por favor...");
            kushki.requestToken({
              amount: '100',
              isDeferred: false,
              currency: "USD",
              card: {
                    name: $("#cardName").val(),
                    number: $("#cardNumber").val(),
                    cvc: $("#cardCVC").val(),
                    expiryMonth: $("#cardExpiryMM").val(),
                    expiryYear: $("#cardExpiryYY").val()
                }
            }, callback);
        }
    var callback = function(response) {
        tok = response.token;
          if(!response.code){
                var parametros = {
                    "kushkiToken" : tok,
                    "monto" : tmp.toFixed(2),
                    "boletos":[],
                    "articulos":[]
                };
                for (i = 0; i < $("[name='cantidad']").length; i++) {
                        parametros.boletos.push({ codigo: $("[name='cantidad']")[i].id, cantidad: $("[name='cantidad']")[i].value });
                }
                $.ajax({
                        data:  parametros, //datos que se envian a traves de ajax
                        url:   '{{route('api.kushki')}}', //archivo que recibe la peticion
                        type:  'post', //método de envio
                        beforeSend: function () {
                                $("#resultado").html("Procesando, espere por favor...");
                        },
                        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                console.log(response);

                        }
                });
          } else {
            console.error('Error: ',response.error, 'Code: ', response.code, 'Message: ',response.message);
          }
        }

    var kushki = new Kushki({
        merchantId: "10000002310042414718149002935532", 
        inTestEnvironment: true
    });

    </script>
@endsection