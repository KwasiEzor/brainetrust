<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Traits\HasLikes;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use HasLikes;
    use Searchable;

    protected $fillable =[
        'title',
        'subtitle',
        'slug',
        'excerpt',
        'content',
        'cover_img',
        'category_id',
        'user_id',
        'is_published',
        'is_highlighted',
        'views',
        'source'
    ];
    protected $casts=[
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsToMany
     */
    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return HasMany
     */
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeTitle($query, $value): mixed
    {
        return $query->where('title','like',"%$value%");
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeSlug($query, $value): mixed
    {
        return $query->where('slug','like',"%$value%");
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeSubtitle($query, $value): mixed
    {
        return $query->where('subtitle','like',"%$value%");
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeExcerpt($query, $value): mixed
    {
        return $query->where('excerpt','like',"%$value%");
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeContent($query, $value): mixed
    {
        return $query->where('content','like',"%$value%");
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeSource($query, $value): mixed
    {
        return $query->where('source','like',"%$value%");
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeWithUser($query, $value): mixed
    {
        return $query->whereHas('user',function($query) use($value){
            $query->where('name','like',"%$value%")
                    ->orWhere('email','like',"%$value%");
        });
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeWithCategory($query, $value): mixed
    {
        return $query->whereHas('category',function($query) use($value){
            $query->where('title','like',"%$value%");
        });
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeIsPublished($query, $value): mixed
    {
        return $query->where('is_published','=',1);
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeIsHighlighted($query, $value): mixed
    {
        return $query->where('is_highlighted','=',1);
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeViews($query, $value): mixed
    {
        return $query->where('views','>',0);
    }

    public function getFormatedCreatedAt()
    {
        return  $this->created_at->tz('Europe/Brussels')->locale('fr_FR')->isoFormat('LL à HH:mm:ss');
    }
    public function getFormatedUpdatedAt()
    {
        return  $this->created_at->tz('Europe/Brussels')->locale('fr_FR')->isoFormat('LL à HH:mm:ss');
    }
}
