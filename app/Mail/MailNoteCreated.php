<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Carbon\Carbon;

class MailNoteCreated extends Mailable
{
    use Queueable, SerializesModels;


    public $user;
    public $groupName;
    public $noteTitle;

    public function __construct(User $user, $groupName, $noteTitle)
    {
        $this->user = $user;
        $this->groupName = $groupName;
        $this->noteTitle = $noteTitle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_note_created')
                    ->subject('Nueva nota en el grupo'.$this->groupName .' '.Carbon::now()->format('d-m-Y H:i:s'));;
    }
}
