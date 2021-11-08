<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class About extends Model
{
    public static function getAbout()
    {
        static $about;
        $about = DB::table('about')
            ->select('title', 'content')
            ->get();
        return $about;
    }
}
