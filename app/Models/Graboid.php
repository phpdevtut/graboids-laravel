<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Graboid extends Model
{
    protected $fillable = [
        'src',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($graboid) {
            // send an email
            $graboid->comments()->delete();
        });
    }

    /**
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(
            Comment::class,
            'commentable'
        );
    }
}
