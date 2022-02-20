<?php

namespace App\Traits;

/**
 * Fill the model with the array received
 *
 * @param  Array  $arrayRequest
 * @param  Model  $model
 * @return \Illuminate\Database\Eloquent\Model
 */
trait FillModelWithRequest
{
    public function fillModel($arrayRequest)
    {
        $labels = $this->updatable;
        foreach ($labels as $label) {
            $this->setAttribute($label, $arrayRequest[$label]);
        }
    }
}
