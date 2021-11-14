<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Graboid;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GraboidsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $graboids = Graboid::all();

        return view('home.content', [
            'graboids' => $graboids,
        ]);
    }

    /**
     * @param int $graboidId
     * @return Application|Factory|View
     */
    public function show(int $graboidId)
    {
        $graboid = Graboid::with('comments')->find($graboidId);

        return view('home.show', [
            'graboid' => $graboid,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function upload(Request $request): RedirectResponse
    {
        $path = Storage::putFile('graboids', $request->file('file'));

        $graboid = new Graboid();
        $graboid->src = $path;

        if (auth()->check()) {
            $graboid->user_id = auth()->id();
        }

        $graboid->save();

        return redirect()
            ->to(route('graboid.upload'))
            ->with('status', 'Graboid image uploaded!');
    }
}

