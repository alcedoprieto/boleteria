<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boleto;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        $boletos = DB::table('boletos')->join('eventos', 'boletos.idevento', '=', 'eventos.id')->whereDate('inicio', '<=', now()->format('Y-m-d'))->whereDate('fin', '>=', now()->format('Y-m-d'))->where('activo','1')->get();


        return view('home', ['boletos' => $boletos]);

    }
}
