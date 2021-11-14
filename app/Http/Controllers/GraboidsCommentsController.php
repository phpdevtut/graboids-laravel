<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateGraboidsCommentRequest;
use App\Models\Graboid;
use Illuminate\Http\RedirectResponse;

class GraboidsCommentsController extends Controller
{
    /**
     * @param CreateGraboidsCommentRequest $request
     * @param int $graboidId
     * @return RedirectResponse
     */
    public function store(
        CreateGraboidsCommentRequest $request,
        int $graboidId
    ): RedirectResponse {
        if (!auth()->check()) {
            return redirect()->to('login');
        }

        // https://laravel.com/docs/8.x/eloquent#mass-assignment
        $graboid = Graboid::find($graboidId);

        $graboid->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->get('comment'),
        ]);

        return redirect()->to(route('home.show', [
            'graboidId' => $graboid->id,
        ]))->with('status', 'Comment created');
    }
}
