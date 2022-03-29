<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Http\Requests\NoteRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function registerNote(NoteRegisterRequest $request)
    {


        try {

            DB::beginTransaction();

            $data = array_merge($request->all(), ['user_id' => Auth::user()->id ]);

            $note = Note::create($data);

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
