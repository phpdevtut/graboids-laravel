<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hunter;
use Illuminate\Support\Facades\Auth;

class HuntersController extends Controller
{
    public function index()
    {
        $hunters = Hunter::all();

        return view('admin.hunters', [
            'hunters' => $hunters,
        ]);
    }

    public function edit(int $hunterId)
    {
        $hunter = Hunter::find($hunterId);

        echo view('admin.hunters.edit', [
            'hunter' => $hunter,
        ]);

        echo $hunterId;
    }

    public function update(int $hunterId)
    {
        $requestData = [
            'src' => $_POST['src'],
            'name' => $_POST['name'],
            'description' => $_POST['description'],
        ];

        $hunter = Hunter::find($hunterId);
        $hunter->update($requestData);

        header('Location: /admin/hunters');
    }

    public function add()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $user = auth()->user();

        if (!$user->admin) {
            return redirect(route('home'));
        }

        return view('hunters.addHunter');
    }
}
