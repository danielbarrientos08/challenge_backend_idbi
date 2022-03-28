<?php

namespace App\Observers;

use App\Models\Note;
use App\Services\NoteService;

class NoteObserver
{

    public $afterCommit = false;

    public function __construct( NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function created(Note $note ): void
    {
        $this->noteService->CreateImages($note);
        $this->noteService->sendEmails($note);
    }

    /**
     * Handle the Note "updated" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function updated(Note $note)
    {
        //
    }

    /**
     * Handle the Note "deleted" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function deleted(Note $note)
    {
        //
    }

    /**
     * Handle the Note "restored" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function restored(Note $note)
    {
        //
    }

    /**
     * Handle the Note "force deleted" event.
     *
     * @param  \App\Models\Note  $note
     * @return void
     */
    public function forceDeleted(Note $note)
    {
        //
    }
}
