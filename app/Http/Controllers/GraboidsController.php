<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Graboid;
use App\Models\User;

class GraboidsController extends Controller
{
    public function show(int $graboidId)
    {
        $graboid = Graboid::with('comments')->find($graboidId);

        return view('home.show', [
            'graboid' => $graboid,
        ]);
    }
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

