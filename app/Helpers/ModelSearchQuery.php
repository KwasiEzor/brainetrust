<?php

namespace App\Helpers;

class ModelSearchQuery
{
    public function apply($model, array $filters, array $relationships = [])
    {
        $query = $model->newQuery();

        foreach ($relationships as $relationship) {
            $query->with($relationship);
        }

        foreach ($filters as $field => $value) {
            if(method_exists($model,'scope'.ucfirst($field))){
                $query->{$field}($value);
            }
        }
        return $query->get();
    }
}
