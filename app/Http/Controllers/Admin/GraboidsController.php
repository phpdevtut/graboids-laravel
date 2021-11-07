<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Graboid;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class GraboidsController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $graboids = Graboid::all();

        return view('admin.graboids', [
            'graboids' => $graboids,
        ]);
    }

    /**
     * @param int $graboidId
     * @return Application|Factory|View
     */
    public function edit(int $graboidId)
    {
        $graboid = Graboid::find($graboidId);

        return view('admin.graboids.edit', [
            'graboid' => $graboid,
        ]);
    }

    /**
     * @param int $graboidId
     * @return Application|RedirectResponse|Redirector
     */
    public function update(int $graboidId)
    {
        $requestData = [
            'src' => $_POST['src'],
        ];

        $graboid = Graboid::find($graboidId);
        $graboid->update($requestData);

        return redirect(
            route('admin.graboids.index')
        );
    }
}
