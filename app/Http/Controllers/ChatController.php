<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function converses()
    {
        $title = 'Conversas';

        return view('chat.converses', compact('title'));
    }

    public function contacts()
    {
        return view('chat.contacts');
    }

    public function converseDetails(string $conversationId)
    {
        return view('chat.chat', compact('conversationId'));
    }
}