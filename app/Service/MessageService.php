<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\ContactFormMessage;

class MessageService
{
    public function getUnreadMessagesCount()
    {
        return ContactFormMessage::whereNull('viewed_at')->count();
    }

    /**
     * @param ContactFormMessage $message
     */
    public function readMessage(ContactFormMessage $message)
    {
        $message->viewed_at = now();
        $message->save();
    }
}
