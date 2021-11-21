<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactFormMessage;
use App\Service\MessageService;

class ContactFormMessagesController extends Controller
{
    public function index()
    {
        $messages = ContactFormMessage::all();

        return view('admin.messages', [
            'messages' => $messages,
        ]);
    }

    public function open(MessageService $messageService, int $messageId)
    {
        $message = ContactFormMessage::find($messageId);

        if (!$message->viewed_at) {
            $messageService->readMessage($message);
        }

        return view('admin.messages.open', [
            'message' => $message,
        ]);
    }

    public function delete(int $messageId)
    {
        $message = ContactFormMessage::find($messageId);
        $message->delete();

        return redirect(route('admin.messages.index'));
    }
}
