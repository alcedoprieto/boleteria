<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevalorboletoRequest;
use App\Http\Requests\UpdatevalorboletoRequest;
use App\Repositories\valorboletoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class valorboletoController extends AppBaseController
{
    /** @var  valorboletoRepository */
    private $valorboletoRepository;

    public function __construct(valorboletoRepository $valorboletoRepo)
    {
        $this->valorboletoRepository = $valorboletoRepo;
    }

    /**
     * Display a listing of the valorboleto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->valorboletoRepository->pushCriteria(new RequestCriteria($request));
        $valorboletos = $this->valorboletoRepository->all();

        return view('valorboletos.index')
            ->with('valorboletos', $valorboletos);
    }

    /**
     * Show the form for creating a new valorboleto.
     *
     * @return Response
     */
    public function create()
    {
        return view('valorboletos.create');
    }

    /**
     * Store a newly created valorboleto in storage.
     *
     * @param CreatevalorboletoRequest $request
     *
     * @return Response
     */
    public function store(CreatevalorboletoRequest $request)
    {
        $input = $request->all();

        $valorboleto = $this->valorboletoRepository->create($input);

        Flash::success('Valorboleto saved successfully.');

        return redirect(route('valorboletos.index'));
    }

    /**
     * Display the specified valorboleto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $valorboleto = $this->valorboletoRepository->findWithoutFail($id);

        if (empty($valorboleto)) {
            Flash::error('Valorboleto not found');

            return redirect(route('valorboletos.index'));
        }

        return view('valorboletos.show')->with('valorboleto', $valorboleto);
    }

    /**
     * Show the form for editing the specified valorboleto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $valorboleto = $this->valorboletoRepository->findWithoutFail($id);

        if (empty($valorboleto)) {
            Flash::error('Valorboleto not found');

            return redirect(route('valorboletos.index'));
        }

        return view('valorboletos.edit')->with('valorboleto', $valorboleto);
    }

    /**
     * Update the specified valorboleto in storage.
     *
     * @param  int              $id
     * @param UpdatevalorboletoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevalorboletoRequest $request)
    {
        $valorboleto = $this->valorboletoRepository->findWithoutFail($id);

        if (empty($valorboleto)) {
            Flash::error('Valorboleto not found');

            return redirect(route('valorboletos.index'));
        }

        $valorboleto = $this->valorboletoRepository->update($request->all(), $id);

        Flash::success('Valorboleto updated successfully.');

        return redirect(route('valorboletos.index'));
    }

    /**
     * Remove the specified valorboleto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $valorboleto = $this->valorboletoRepository->findWithoutFail($id);

        if (empty($valorboleto)) {
            Flash::error('Valorboleto not found');

            return redirect(route('valorboletos.index'));
        }

        $this->valorboletoRepository->delete($id);

        Flash::success('Valorboleto deleted successfully.');

        return redirect(route('valorboletos.index'));
    }
}
