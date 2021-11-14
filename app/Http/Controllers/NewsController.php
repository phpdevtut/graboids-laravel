<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $news = News::all();

        return view('news.content', [
            'news' => $news,
        ]);
    }
}
