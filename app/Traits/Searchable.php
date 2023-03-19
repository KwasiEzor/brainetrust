<?php

namespace App\Traits;


trait Searchable
{
    /**
     * @param $query
     * @param array $filters
     * @param array $relationships
     * @param $search
     * @return mixed
     * @example http://your-app.test/users?search=john&relationships[]=posts&relationships[]=comments

     */
    public function scopeApply($query, array $filters, array $relationships = [], $search = null): mixed
    {
        foreach ($relationships as $relationship) {
            $query->with($relationship);
        }

        if (!empty($search)) {
            $fillable = $this->getFillable();
            $query->where(function ($query) use ($search, $fillable) {
                foreach ($fillable as $column) {
                    $query->orWhere($column, 'like', "%{$search}%");
                }
            });
        }

        foreach ($filters as $field => $value) {
            if(method_exists($this,'scope'.ucfirst($field))){
                $query->{$field}($value);
            }
        }
        return $query;
    }
}
