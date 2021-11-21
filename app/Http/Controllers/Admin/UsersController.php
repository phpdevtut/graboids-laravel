<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UsersController extends Controller
{
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

        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(CreateOrUpdateUserRequest $request, int $userId)
    {
        $validated = $request->validated();

        $user = User::find($userId);
        $user->update($validated);

        return redirect(route('admin.users.index'))
            ->with('status', 'User updated!');
    }
}
