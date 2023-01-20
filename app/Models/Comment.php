<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'post_id',
        'user_id',
        'parent_id',
        'body'
    ];
    public function parent():BelongsTo
    {
        return $this->belongsTo(Comment::class,'parent_id');
    }

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function replies():HasMany
    {
        return $this->hasMany(Comment::class,'parent_id')->whereNotNull('parent_id');
    }
}
