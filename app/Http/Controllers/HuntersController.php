<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Hunter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class HuntersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() {
        $hunters = Hunter::all();

        return view('hunters.content', [
            'hunters' => $hunters,
        ]);
    }

    /**
     * @param int $hunterId
     * @return Application|Factory|View
     */
    public function show(int $hunterId) {
        // gives back single hunter database object?
        $hunter = Hunter::find($hunterId);

        //sends database object to "show"?
        return view('hunters.show', [
            'hunter' => $hunter,
        ]);
    }

    /**
     * @param int $hunterId
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(int $hunterId)
    {
        Hunter::deleteById($hunterId);

        return redirect(route('hunters.index'));
    }
}
