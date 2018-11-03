<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

// Necesita los dos modelos Fabricante y Avion
use App\Models\Evento;
use App\Models\Boleto;

class EventoBoletoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idEvento)
    {
        // Devolvera todos los Boletos
        // return "Mostrando los boletos del evento con Id $idEvento";
                
        $evento=Evento::find($idEvento);

        if (!$evento)
        {
            // Flash::error('Evento not found');
            return redirect(route('eventos.index'));
        }

        // return view('eventos.ventas')->with('boletos', $evento->boletos()->get());
        
        $boletos = $evento->boletos()->get();


        $tickets = array();

        foreach ($boletos as $boleto) {
            $bol = Boleto::find($boleto->id);

            // array_push($tickets, array('id'=>$boleto->id, 'cantidad'=>$bol->tickets()->get()->count()));
            array_push($tickets, array('id'=>$boleto->id, 'cantidad'=>$bol->tickets()->whereNotNull('idusuario')->get()->count()));
        }

        // $boleto = Boleto::find(4);
        // $tickets = $boleto->tickets()->get()->count();

        // dd($tickets);
    
        return view('eventos.ventas', ['evento' => $evento, 'boletos' => $boletos, 'tickets' => $tickets]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // *
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
