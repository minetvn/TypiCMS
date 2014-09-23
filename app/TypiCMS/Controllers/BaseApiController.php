<?php
namespace TypiCMS\Controllers;

use App;
use Input;
use Config;
use Response;
use Controller;

abstract class BaseApiController extends Controller
{

    protected $repository;
    protected $form;

    public function __construct($repository = null)
    {
        $this->repository = $repository;
    }

    /**
     * Get models
     * @return Response
     */
    public function index()
    {
        $models = $this->repository->getAll();
        return Response::json($models, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  int      $id
     * @return Response
     */
    public function show($model)
    {
        return Response::json($model, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  int      $id
     * @return Response
     */
    public function edit($model)
    {
        return Response::json($model, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  int      $id
     * @return Response
     */
    public function update($model)
    {
        $this->repository->update(Input::all());
        return Response::json([
            'error'   => false,
            'message' => 'Item updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int      $id
     * @return Response
     */
    public function destroy($model)
    {
        $this->repository->delete($model);
        return Response::json([
            'error'   => false,
            'message' => 'Item deleted'
        ], 200);
    }
}
