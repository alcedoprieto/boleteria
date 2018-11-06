<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBoletoRequest;
use App\Http\Requests\UpdateBoletoRequest;
use App\Repositories\boletoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

use Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use App\BoletoUser;

class BoletoController extends AppBaseController
{
    /** @var  BoletoRepository */
    private $boletoRepository;

    public function __construct(BoletoRepository $boletoRepo)
    {
        $this->boletoRepository = $boletoRepo;
    }

    /**
     * Display a listing of the Boleto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->boletoRepository->pushCriteria(new RequestCriteria($request));
        $boletos = $this->boletoRepository->all();

        return view('boletos.index')
            ->with('boletos', $boletos);
    }

    /**
     * Show the form for creating a new Boleto.
     *
     * @return Response
     */
    public function create()
    {
        $eventos = DB::table('eventos')->pluck('nombre','id');
        return view('boletos.create',['eventos' => $eventos]);
    }

    /**
     * Store a newly created Boleto in storage.
     *
     * @param CreateBoletoRequest $request
     *
     * @return Response
     */
    public function store(CreateBoletoRequest $request)
    {
        $input = $request->all();
        if ($input["activo"] != 1) $input["activo"] = 0;

        if ($input["iva"] == 1) { $input["iva"] = $input["valor"] * 0.12; } else { $input["iva"] = 0; }
  
        $boleto = $this->boletoRepository->create($input);

        $cant = $boleto->cantidad;
 
        for ($i = 1; $i <= $cant; $i++){
            BoletoUser::create([
                'codigo' => $boleto->codigo.$i,
                'idboleto' => $boleto->id
            ]);
            
        }


        Flash::success('Boleto saved successfully.');

        return redirect(route('boletos.index'));
    }

    /**
     * Display the specified Boleto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $boleto = $this->boletoRepository->findWithoutFail($id);

        if (empty($boleto)) {
            Flash::error('Boleto not found');

            return redirect(route('boletos.index'));
        }

        return view('boletos.show')->with('boleto', $boleto);
    }

    /**
     * Show the form for editing the specified Boleto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $boleto = $this->boletoRepository->findWithoutFail($id);

        if (empty($boleto)) {
            Flash::error('Boleto not found');

            return redirect(route('boletos.index'));
        }

        return view('boletos.edit')->with('boleto', $boleto);
    }

    /**
     * Update the specified Boleto in storage.
     *
     * @param  int              $id
     * @param UpdateBoletoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBoletoRequest $request)
    {
        $boleto = $this->boletoRepository->findWithoutFail($id);

        if (empty($boleto)) {
            Flash::error('Boleto not found');

            return redirect(route('boletos.index'));
        }

        $boleto = $this->boletoRepository->update($request->all(), $id);

        Flash::success('Boleto updated successfully.');

        return redirect(route('boletos.index'));
    }

    /**
     * Remove the specified Boleto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $boleto = $this->boletoRepository->findWithoutFail($id);

        if (empty($boleto)) {
            Flash::error('Boleto not found');

            return redirect(route('boletos.index'));
        }

        $this->boletoRepository->delete($id);

        Flash::success('Boleto deleted successfully.');

        return redirect(route('boletos.index'));
    }
}
