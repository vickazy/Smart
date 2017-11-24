<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSending extends Mailable
{
    use Queueable, SerializesModels;
    protected $penerima;
    protected $name;
    protected $email;
    public $subject;
    protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        // $this->pe = 'bangadam.dev@gmail.com';
        $this->name = $request['name'];
        $this->email = $request['email'];
        $this->subject = $request['subject'];
        $this->message = $request['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->message);
        $this->view('smart.kontak.email')
                    ->from($this->email, $this->name)
                    ->subject($this->subject)
                    ->replyTo($this->email)
                    ->with([
                        'pesan' => $this->message,
                        'name' => $this->name,
                        'email' => $this->email,
                    ]);
    }
}
