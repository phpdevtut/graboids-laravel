<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;
use App\Models\News;


class ArticlesController
{
    public function index()
    {
        $news = News::all();

        return view('admin.news', [
            'news' => $news,
        ]);
    }

    public function edit(int $newsId)
    {
        $new = News::find($newsId);

        echo view('admin.news.edit', [
            'new' => $new,
        ]);

        echo $newsId;
    }

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

    public function add()
    {
        $blade = new Blade('views', 'cache');

        // here we want to check a request:
        // - we want to check if request has a cookie for us
        // - if yes, we can check if there is a valid(existing) session id in the cookie
        // - if no, we will redirect the user to login page
        if (empty($_COOKIE)) {
            header('Location: /admin/login.php');
        }

        if (!$_SESSION['is_admin']) {
            header('Location: /');
        }

        $html = $blade->render('news.addArticle');

        echo $html;
    }
}
