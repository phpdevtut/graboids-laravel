<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactFormMessage extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];
}
