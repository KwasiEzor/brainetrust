<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'likeable_type',
        'likeable_id'
    ];

    /**
     * @return MorphTo
     */
    public function likeable():MorphTo
    {
        return $this->morphTo();
    }
}
