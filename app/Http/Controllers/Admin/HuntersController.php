<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateHunterRequest;
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

    public function show(int $hunterId)
    {

    }

    public function edit(int $hunterId)
    {
        $hunter = Hunter::find($hunterId);

        return view('admin.hunters.edit', [
            'hunter' => $hunter,
        ]);
    }

    public function update(CreateOrUpdateHunterRequest $request, int $hunterId)
    {
        $validated = $request->validated();

        $hunter = Hunter::find($hunterId);
        $hunter->update($validated);

        return redirect(route('admin.hunters.index'))
            ->with('status', 'Hunter updated!');
    }

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

    public function store(CreateOrUpdateHunterRequest $request)
    {
        $validated = $request->validated();
        Hunter::create($validated);

        return redirect(route('admin.hunters.index'));
    }
}
