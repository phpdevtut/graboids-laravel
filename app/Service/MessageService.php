<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Message;

class MessageService
{
    public function getUnreadMessagesCount()
    {
        return Message::whereNull('viewed_at')->count();
    }

    /**
     * @param Message $message
     */
    public function readMessage(Message $message)
    {
        $message->viewed_at = now();
        $message->save();
    }
}
