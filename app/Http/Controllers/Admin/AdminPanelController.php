<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function index()
    {
        // here we want to check a request:
        // - we want to check if request has a cookie for us
        // - if yes, we can check if there is a valid(existing) session id in the cookie
        // - if no, we will redirect the user to login page

        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $user = auth()->user();

        if (!$user->admin) {
            return redirect(route('home'))->with('message', 'Not an admin!');
        }

        return view('admin.adminPanel');
    }
}
