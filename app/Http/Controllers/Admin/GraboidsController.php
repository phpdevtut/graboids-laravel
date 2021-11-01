<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Graboid;

class GraboidsController
{
    public function index()
    {
        $graboids = Graboid::all();

        return view('admin.graboids', [
            'graboids' => $graboids,
        ]);
    }

    public function edit(int $graboidId)
    {
        $graboid = Graboid::find($graboidId);

        return view('admin.graboids.edit', [
            'graboid' => $graboid,
        ]);

        echo $graboidId;
    }

    public function update(int $graboidId)
    {
        $requestData = [
            'src' => $_POST['src'],
        ];

        $graboid = Graboid::find($graboidId);
        $graboid->update($requestData);

        header('Location: /admin/graboids');
    }

/*    public function add()
    {
        $blade = new Blade('views', 'cache');

        // here we want to check a request:
        // - we want to check if request has a cookie for us
        // - if yes, we can check if there is a valid(existing) session id in the cookie
        // - if no, we will redirect the user to login page
        if (empty($_COOKIE)) {
            header('Location: /admin/login.php');
        }

        if (empty($_SESSION['is_admin'])) {
            header('Location: /');
        }

        $html = $blade->render('hunters.addHunter');

        echo $html;
    }*/

    public function create()
    {

    }
}
