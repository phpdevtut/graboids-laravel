<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Models\ContactFormMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('contact.content');
    }

    public function store(CreateMessageRequest $request){
        $validated = $request->validated();
        ContactFormMessage::create($validated);

        return redirect(route('home'))
            ->with('status', 'Message Sent!');
    }
}
