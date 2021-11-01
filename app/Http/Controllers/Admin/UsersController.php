<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class UsersController extends Controller
{
/*    private $blade;

    public function __construct()
    {
        $this->blade = new Blade('views', 'cache');
    }*/

    public function index()
    {
        $users = User::all();

        return view('admin.users', [
            'users' => $users,
        ]);
    }
    public function edit(int $usersId)
    {
        $user = User::find($usersId);

        echo view('admin.users.edit', [
            'user' => $user,
        ]);

        echo $usersId;
    }
}
