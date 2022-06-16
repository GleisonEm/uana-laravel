<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\MessageFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Dompdf\Dompdf;
use Alert;
use Carbon\Carbon;
use Auth;

class MessageController extends Controller
{
    private $totalPage = 10;

    public function index()
    {
        $title = 'Notificações';
        $messagesSender = Message::orderBy('datetime', 'desc')
            ->where('user_sender', Auth::user()->id)
            ->paginate($this->totalPage);

        $messagesReceiver = Message::orderBy('datetime', 'desc')
            ->where('user_receiver', Auth::user()->id)
            ->where('user_sender', '<>', Auth::user()->id)
            ->paginate($this->totalPage);

        $usersForSelect = Message::usersForSelect();

        return view('painel.cadastros.messages.index', compact('title', 'messagesSender', 'messagesReceiver', 'usersForSelect'));
    }

    public function store(MessageFormRequest $request)
    {
        $now = new Carbon();
        $message = new Message;
        $message->user_sender = Auth::user()->id;
        $message->user_receiver = $request->user_receiver;
        $message->message = $request->message;
        $message->datetime = $now;
        $message->status = 'A';
        $message->save();

        if ($message)
            Alert::success('Mensagem enviada');
        else
            Alert::error('Erro ao enviar mensagem');

        return redirect()->route('messages.index');
    }

    public function messages_lerMensagem($id)
    {
        $message = Message::findOrFail($id);
        $message->status = 'L';
        $message->save();

        if ($message)
            Alert::success('Mensagem marcada como lida');
        else
            Alert::error('Erro ao marcar mensagem com lida');

        return back();
    }

    public function messages_responderMensagem(MessageFormRequest $request)
    {
        $now = new Carbon();
        $message = new Message;
        $message->user_sender = Auth::user()->id;
        $message->user_receiver = $request->user_sender;
        $message->message = $request->message;
        $message->datetime = $now;
        $message->status = 'A';
        $message->save();

        if ($message) {
            $this->lerMensagem($request->id);
            Alert::success('Mensagem enviada');
        } else {
            Alert::error('Erro ao enviar mensagem');
        }

        return redirect()->route('messages.index');
    }

    public function messages_search(Request $request)
    {
        $title = 'Notificações';

        $messagesSender = Message::orderBy('datetime', 'desc')
            ->where('user_sender', Auth::user()->id)
            ->Where('message', 'like', '%' . $request->texto . '%')
            ->paginate($this->totalPage);

        $messagesReceiver = Message::orderBy('datetime', 'desc')
            ->where('user_receiver', Auth::user()->id)
            ->where('user_sender', '<>', Auth::user()->id)
            ->Where('message', 'like', '%' . $request->texto . '%')
            ->paginate($this->totalPage);

        $usersForSelect = Message::usersForSelect();

        if ($request->pesquisa == 'Sim') {
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&page=1');
        } else {
            return view('painel.cadastros.messages.index', compact('title', 'messagesSender', 'messagesReceiver', 'usersForSelect'));
        }
    }
}
