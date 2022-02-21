<?php

namespace App\Traits;

/**
 * Fill the model with the array received
 *
 * @param  Array  $arrayRequest
 * @param  Model  $model
 * @return \Illuminate\Database\Eloquent\Model
 */
trait CRUDJsonMethods
{
    public function fetchAll()
    {
        $collection = $this->modelResource::collection($this->model::all());
        return ($collection) ? $this->sendResponse($collection) : $this->sendError('No hay registros');
    }
}
