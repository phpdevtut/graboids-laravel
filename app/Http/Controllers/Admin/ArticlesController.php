<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateOrUpdateNewsRequest;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $news = News::all();

        return view('admin.news', [
            'news' => $news,
        ]);
    }

    /**
     * @param int $newsId
     */
    public function edit(int $newsId)
    {
        $new = News::find($newsId);

        return view('admin.news.edit', [
            'new' => $new,
        ]);
    }

    /**
     * @param int $newsId
     */
    public function update(CreateOrUpdateNewsRequest $request, int $newsId)
    {
        $validated = $request->validated();
        $new = News::find($newsId);
        $new->update($validated);

        return redirect(route('admin.news.index'))
            ->with('status', 'Article updated!');
    }

    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function new()
    {
        // here we want to check a request:
        // - we want to check if request has a cookie for us
        // - if yes, we can check if there is a valid(existing) session id in the cookie
        // - if no, we will redirect the user to login page

        return view('news.addArticle');
    }

    public function store(CreateOrUpdateNewsRequest $request)
    {
        $validated = $request->validated();
        News::create($validated);

        return redirect(route('admin.news.index'))
            ->with('status', 'Article added!');

    }
}
