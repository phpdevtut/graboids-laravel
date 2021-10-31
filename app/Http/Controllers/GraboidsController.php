<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Graboid;

class GraboidsController extends Controller
{
    public function show(int $graboidId)
    {
        $graboid = Graboid::with('comments')->find($graboidId);

        return view('home.show', [
            'graboid' => $graboid,
        ]);
    }
}
