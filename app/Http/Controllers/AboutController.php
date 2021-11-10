<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $about = About::first();

        return view('about.content', [
            'about' => $about,
        ]);
    }
}
