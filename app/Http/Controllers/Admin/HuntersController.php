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
//wtf is user()? It's a method of auth, how is it receiving
//username from the database? And where the fuck do I find
//all these goddamn methods? Also why are we not using $user =
// Auth::user(); as in the documentation? What's the difference?
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
    //I get that it's calling CreateOrUpdateHunterRequest, but
    // what is $request? Is $request an object filled with the
    // returned array? So calling CreateOrUpdate checks
    // authorization with "authorize" then jumps down to
    // "rules" and validates all this information then returns,
    // for example, an array of key pairs name => Burt Gummer,
    // src => what/ever/burtgummer.jpg etc and stuffs it into
    // $request? Why do you need to use validated if it's
    // already passed the request rules and been put into
    // $request. Couldn't you just Hunter::create($request)?
    public function store(CreateOrUpdateHunterRequest $request)
    {
        $validated = $request->validated();
        Hunter::create($validated);

        return redirect(route('admin.hunters.index'))
            ->with('status', 'Hunter added!');
    }
}
