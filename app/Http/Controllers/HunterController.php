<?php

namespace App\Http\Controllers;

use App\Models\Hunter;
use Illuminate\Http\Request;

class HunterController extends Controller
{
    public function index() {
        $hunters = Hunter::all();

        return view('hunters.content', [
            'hunters' => $hunters,
        ]);
    }

    public function show(int $hunterId) {
        // gives back single hunter database object?
        $hunter = Hunter::find($hunterId);

        //sends database object to "show"?
        return view('hunters.show', [
            'hunter' => $hunter,
        ]);
    }

    public function delete(int $hunterId)
    {
        Hunter::deleteById($hunterId);

        return redirect(route('hunters.index'));
    }
}
