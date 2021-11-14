<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Graboid;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = null;

        if (isset($_SESSION['user_id'])) {
            $user = User::find($_SESSION['user_id']);
        }

        $graboids = Graboid::all();

        return view('home.content', [
            'graboids' => $graboids,
            'user' => $user,
        ]);
    }
}
