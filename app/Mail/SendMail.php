<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $content)
    {
        $this->user = $user;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->form('admin@gmail.com') //メールの送信元
            ->subject('完了通知')  //メールのタイトル
            ->markdown('email.complete')
            // ->view('emails.complete')
            ->with(['user' => $this->user, 'content' => $this->content]);
    }
}
