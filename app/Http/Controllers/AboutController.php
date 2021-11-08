<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
    //    $about = DB::select('select * from about where id = 1');

        $about = DB::table('about')
            ->select('title', 'content')
            ->get();

        return view('about.content', [
            'about' => $about,
        ]);
    }
}
