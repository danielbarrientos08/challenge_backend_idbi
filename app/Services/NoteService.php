<?php

namespace App\Services;
use App\Models\Note;
use App\Models\GroupUser;
use App\Models\User;
use App\Mail\MailNoteCreated;
use App\Models\Group;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NoteService
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function sendEmails(Note $note)
    {
        $groupUsers = GroupUser::select('user_id')
                                ->where('group_id',$note->group_id)
                                ->get()->toArray();

        $users = User::whereIn('id',$groupUsers)->get();

        $group = Group::find($note->group_id,['name']);

        foreach ($users as $key => $user)
        {
            Mail::to($user->email)
                ->queue(new MailNoteCreated($user,$group->name, $note->title));
        }
    }

    public function createImages(Note $note )
    {
        foreach ($this->request->file('images') as $key => $item)
        {

            $imgName =  Str::slug(($note->title)).'_'.Str::random(6).'.'.$item->getClientOriginalExtension();

            $img = new Image();
            $img->name = $imgName;
            $img->note_id = $note->id;
            $img->save();

            Storage::disk('public')->putFileAs('/', $item , $imgName);
        }
    }
}
