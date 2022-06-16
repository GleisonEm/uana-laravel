<?php

use App\Models\Access;
use App\Models\Message;
use App\Models\Log;
use App\Mail\SendMail;
use Carbon\Carbon;

function sendLog($table, $action, $message) {
    $now = new Carbon();
    $dataForm = [
        'datetime' => $now, 
        'table' => $table,
        'action' => $action, 
        'message' => $message, 
        'user_id' => Auth::user()->id, 
        'ip' => Request::ip(), 
    ];
    Log::create($dataForm);  
} 

function sendMessage($message, $user_receiver) {
        $now = new Carbon();
        $dataForm = [
            'user_sender' => Auth::user()->id, 
            'user_receiver' => $user_receiver, 
            'message' => $message, 
            'datetime' => $now, 
            'status' => 'A'
        ];
        $store = Message::create($dataForm);
        if ($store) 
            Alert::success('Mensagem Enviada');
        else 
            Alert::error('Erro ao cadastrar mensagem');
}

function sendMail($action, $table, $name, $created_at, $created_by) {
        $now = new Carbon();
        $store['action'] = $action;
        $store['data_hora'] = $now;
        $store['user'] = Auth::user()->name;
        $store['table'] = $table;
        $store['name'] = $name;
        $store['created_at'] = $created_at;
        $store['created_by'] = $created_by;
        Mail::to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->send(new SendMail($store));
}

function count_new_messages($status, $user_receiver) {
    $messages = Message::orderBy('id', 'asc')
                ->Where('status', $status)
                ->Where('user_receiver', Auth::user()->id)
                ->where('user_sender','<>', Auth::user()->id)
                ->count();
    return $messages;
}

function count_access_total() {
    $accesses = Access::orderBy('id', 'asc')->Where('action', 'E')->count();
    return $accesses;
}

function count_access_dia() {
    $accesses = Access::orderBy('id', 'asc')->Where('action', 'S')->count();
    return $accesses;
}
