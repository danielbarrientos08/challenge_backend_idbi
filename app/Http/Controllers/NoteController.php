<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Image;
use App\Http\Requests\NoteRegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function registerNote(NoteRegisterRequest $request)
    {

        try {

            DB::beginTransaction();

            $note = new Note();
            $note->title       = $request->title;
            $note->description = $request->description;
            $note->group_id    = $request->group_id;
            $note->user_id     = Auth::user()->id;
            $note->save();


            foreach ($request->file('images') as $key => $item)
            {

                $img_name =  Str::slug(($note->title)).'_'.Str::random(6).'.'.$item->getClientOriginalExtension();

                $img = new Image();
                $img->name = $img_name;
                $img->note_id = $note->id;
                $img->save();

                Storage::disk('public')->putFileAs('/', $item,$img_name);
            }

            DB::commit();

            $note = Note::find($note->id);

            return response()->json([
                'status'=>'success',
                'message' => 'Nota creada correctamente',
                'note' => $note
            ],201);

        } catch (\Exception $e) {
            DB::rollback();

            abort(500,$e->getMessage());
        }
    }
}
