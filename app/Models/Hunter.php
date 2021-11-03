<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Hunter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'src',
        'description',
    ];

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
