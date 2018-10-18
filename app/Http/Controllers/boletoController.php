<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateboletoRequest;
use App\Http\Requests\UpdateboletoRequest;
use App\Repositories\boletoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class boletoController extends AppBaseController
{
    /** @var  boletoRepository */
    private $boletoRepository;

    public function __construct(boletoRepository $boletoRepo)
    {
        $this->boletoRepository = $boletoRepo;
    }

    /**
     * Display a listing of the boleto.
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
     * Show the form for creating a new boleto.
     *
     * @return Response
     */
    public function create()
    {
        return view('boletos.create');
    }

    /**
     * Store a newly created boleto in storage.
     *
     * @param CreateboletoRequest $request
     *
     * @return Response
     */
    public function store(CreateboletoRequest $request)
    {
        $input = $request->all();

        $boleto = $this->boletoRepository->create($input);

        Flash::success('Boleto saved successfully.');

        return redirect(route('boletos.index'));
    }

    /**
     * Display the specified boleto.
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
     * Show the form for editing the specified boleto.
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
     * Update the specified boleto in storage.
     *
     * @param  int              $id
     * @param UpdateboletoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateboletoRequest $request)
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
     * Remove the specified boleto from storage.
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
