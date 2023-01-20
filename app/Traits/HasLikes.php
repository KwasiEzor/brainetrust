<?php

namespace App\Traits;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait HasLikes
{
    /**
     * @return MorphMany
     */
    public function likes():MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * @return MorphTo
     */
    public function likeable():MorphTo
    {
        return $this->morphTo();
    }
}
