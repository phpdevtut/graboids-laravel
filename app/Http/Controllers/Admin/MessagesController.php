<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('admin.messages', [
            'messages' => $messages,
        ]);
    }

    public function open(int $messageId)
    {
        $message = Message::find($messageId);

        $message->viewed_at = now();
        $message->save();

        return view('admin.messages.open', [
            'message' => $message,
        ]);
    }
}
