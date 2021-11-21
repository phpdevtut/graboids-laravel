<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateHuntersCommentRequest;
use App\Models\Hunter;
use Illuminate\Http\RedirectResponse;

class HuntersCommentsController extends Controller
{
    /**
     * @param CreateHuntersCommentRequest $request
     * @param int $hunterId
     * @return RedirectResponse
     */
    public function store(
        CreateHuntersCommentRequest $request,
        int $hunterId
    ): RedirectResponse {
        if (!auth()->check()) {
            return redirect()->to('login');
        }

        $hunter = Hunter::find($hunterId);

        $hunter->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->get('comment'),
        ]);

        return redirect()->to(route('hunters.show', [
            'hunterId' => $hunter->id,
        ]))->with('status', 'Comment created');
    }
}
