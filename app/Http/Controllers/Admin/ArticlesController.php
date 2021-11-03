<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;
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

        echo view('admin.news.edit', [
            'new' => $new,
        ]);

        echo $newsId;
    }

    /**
     * @param int $newsId
     */
    public function update(int $newsId)
    {
        $requestData = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        ];

        $new = News::find($newsId);
        $new->update($requestData);

        header('Location: /admin/news');
    }

    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function add()
    {
        // here we want to check a request:
        // - we want to check if request has a cookie for us
        // - if yes, we can check if there is a valid(existing) session id in the cookie
        // - if no, we will redirect the user to login page
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $user = auth()->user();

        if (!$user->admin) {
            return redirect(route('home'));
        }

        return view('news.addArticle');
    }
}
