<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactsController extends Controller
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

        return view('admin.messages.open', [
            'message' => $message,
        ]);
    }
}
