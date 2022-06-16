<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $inputs;

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function build()
    {
        return $this->view('mail.sendmail')->with([
            'action' => $this->inputs['action'],
            'data_hora' => $this->inputs['data_hora'],
            'user' => $this->inputs['user'],
            'table' => $this->inputs['table'],
            'name' => $this->inputs['name'],
            'created_at' => $this->inputs['created_at'],
            'created_by' => $this->inputs['created_by'],
        ]);
    }

}
