<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateeventoRequest;
use App\Http\Requests\UpdateeventoRequest;
use App\Repositories\eventoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class eventoController extends AppBaseController
{
    /** @var  eventoRepository */
    private $eventoRepository;

    public function __construct(eventoRepository $eventoRepo)
    {
        $this->eventoRepository = $eventoRepo;
    }

    /**
     * Display a listing of the evento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoRepository->pushCriteria(new RequestCriteria($request));
        $eventos = $this->eventoRepository->all();

        return view('eventos.index')
            ->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new evento.
     *
     * @return Response
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created evento in storage.
     *
     * @param CreateeventoRequest $request
     *
     * @return Response
     */
    public function store(CreateeventoRequest $request)
    {
        $input = $request->all();

        $evento = $this->eventoRepository->create($input);

        Flash::success('Evento saved successfully.');

        return redirect(route('eventos.index'));
    }

    /**
     * Display the specified evento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        return view('eventos.show')->with('evento', $evento);
    }

    /**
     * Show the form for editing the specified evento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        return view('eventos.edit')->with('evento', $evento);
    }

    /**
     * Update the specified evento in storage.
     *
     * @param  int              $id
     * @param UpdateeventoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateeventoRequest $request)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        $evento = $this->eventoRepository->update($request->all(), $id);

        Flash::success('Evento updated successfully.');

        return redirect(route('eventos.index'));
    }

    /**
     * Remove the specified evento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        $this->eventoRepository->delete($id);

        Flash::success('Evento deleted successfully.');

        return redirect(route('eventos.index'));
    }
}
