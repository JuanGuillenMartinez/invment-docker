<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

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

    public function saveRecord(Array $requestProperties) : JsonResponse {
        $record = new $this->model();
        $record->fillModel($requestProperties);
        $recordResource = new $this->modelResource($record);
        return ($record->save()) ? $this->sendResponse($recordResource) : $this->sendError('Ha ocurrido un error al agregar el registro');
    }
}
