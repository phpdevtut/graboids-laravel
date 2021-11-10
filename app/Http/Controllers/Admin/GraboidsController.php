<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateGraboidRequest;
use App\Models\Graboid;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class GraboidsController extends Controller
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

    public function delete(int $graboidId)
    {
        $graboid = Graboid::find($graboidId);
        $graboid->delete();

        return redirect(route('home'));
    }

    public function update(CreateOrUpdateGraboidRequest $request, int $graboidId)
    {
        $validated = $request->validated();

        $graboid = Graboid::find($graboidId);
        $graboid->update($validated);

        return redirect(route('admin.graboids.index'))
            ->with('status', 'Graboid updated!');
    }
}
