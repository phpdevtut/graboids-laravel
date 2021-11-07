<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateHunterRequest;
use App\Models\Hunter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class HuntersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $hunters = Hunter::all();

        return view('admin.hunters', [
            'hunters' => $hunters,
        ]);
    }

    /**
     * @param int $hunterId
     */
    public function show(int $hunterId)
    {

    }

    /**
     * @param int $hunterId
     * @return Application|Factory|View
     */
    public function edit(int $hunterId)
    {
        $hunter = Hunter::find($hunterId);

        return view('admin.hunters.edit', [
            'hunter' => $hunter,
        ]);
    }

    /**
     * @param CreateOrUpdateHunterRequest $request
     * @param int $hunterId
     * @return Application|RedirectResponse|Redirector
     */
    public function update(CreateOrUpdateHunterRequest $request, int $hunterId)
    {
        $validated = $request->validated();

        $hunter = Hunter::find($hunterId);
        $hunter->update($validated);

        return redirect(route('admin.hunters.index'))
            ->with('status', 'Hunter updated!');
    }

    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function new()
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

    /**
     * @param CreateOrUpdateHunterRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateOrUpdateHunterRequest $request)
    {
        $validated = $request->validated();
        Hunter::create($validated);

        return redirect(route('admin.hunters.index'))
            ->with('status', 'Hunter added!');
    }
}
