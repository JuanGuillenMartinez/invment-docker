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
    public function fetchAllRecords() : JsonResponse
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

    public function fetchRecordById(Int $id) : JsonResponse {
        $record = $this->model::find($id);
        if ($record) {
            $recordResource = new $this->modelResource($record);
            return $this->sendResponse($recordResource);
        }
        return $this->sendError('El registro no existe');
    }

    public function updateRecord(Int $id, Array $properties) : JsonResponse {
        $record = $this->model::find($id);
        if ($record) {
            $record->fillModel($properties);
            $recordResource = new $this->modelResource($record);
            return ($record->save()) ? $this->sendResponse($recordResource) : $this->sendError('Un error ocurrió mientras se guardaba');
        }
        return $this->sendError("El registro no existe");
    }
}
