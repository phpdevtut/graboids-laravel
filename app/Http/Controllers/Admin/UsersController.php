<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class UsersController extends Controller
{
/*    private $blade;

    public function __construct()
    {
        $this->blade = new Blade('views', 'cache');
    }*/

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users', [
            'users' => $users,
        ]);
    }

    /**
     * @param int $usersId
     */
    public function edit(int $usersId)
    {
        $user = User::find($usersId);

        echo view('admin.users.edit', [
            'user' => $user,
        ]);

        echo $usersId;
    }
}
