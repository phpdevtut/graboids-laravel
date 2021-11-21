<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::where('recipient_id', '=', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('messages.index', [
            'messages' => $messages,
        ]);
    }

    public function chat(int $authorId)
    {
        $messages = Message::where(function ($query) use ($authorId) {
            $query->where('recipient_id', '=', auth()->id())
                ->where('author_id', '=', $authorId);
        })
            ->orWhere(function ($query) use ($authorId)  {
                $query->where('recipient_id', '=', $authorId)
                    ->where('author_id', '=', auth()->id());
            })
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('messages.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * @param StoreMessageRequest $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(StoreMessageRequest $request): RedirectResponse
    {
        $message = new Message();

        $message->recipient_id = $request->get('recipient_id');
        $message->content = $request->get('content');
        $message->author_id = auth()->id();

        $message->saveOrFail();

        return redirect()->to(route('users.show', [
            'userId' => $request->get('recipient_id'),
        ]))->with('status', 'Message sent');
    }
}
