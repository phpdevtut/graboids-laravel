<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'commentable_id',
        'commentable_type',
    ];

    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(
            Comment::class,
            'parent_id',
            'id'
        );
    }

    /**
     * @return mixed
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
