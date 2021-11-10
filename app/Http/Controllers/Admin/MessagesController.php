<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Service\MessageService;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('admin.messages', [
            'messages' => $messages,
        ]);
    }

    public function open(MessageService $messageService, int $messageId)
    {
        $message = Message::find($messageId);

        if (!$message->viewed_at) {
            $messageService->readMessage($message);
        }

        return view('admin.messages.open', [
            'message' => $message,
        ]);
    }
}
