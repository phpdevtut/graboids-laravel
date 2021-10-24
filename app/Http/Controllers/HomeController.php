<?php

namespace App\Http\Controllers;

use App\Models\Graboid;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = null;

        if (isset($_SESSION['user_id'])) {
            $user = User::find($_SESSION['user_id']);
        }

        $graboids = Graboid::all();

        echo view('home.content', [
            'graboids' => $graboids,
            'user' => $user,
        ]);
    }
}
