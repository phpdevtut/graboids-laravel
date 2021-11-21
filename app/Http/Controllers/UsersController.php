<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UsersController extends Controller
{
    /**
     * @param int $userId
     * @return Application|Factory|View
     */
    public function show(int $userId)
    {
        $user = User::find($userId);

        return view('users.show', [
            'user' => $user,
        ]);
    }
}
