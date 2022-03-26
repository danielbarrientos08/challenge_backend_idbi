<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Note;
use App\Models\GroupUser;
use App\Http\Requests\JoinGroupRequest;

class GroupController extends Controller
{
    public function listGroups(Request $request)
    {
        $groups = Group::paginate(10);

        return response()->json([
            'status'=> 'success',
            'groups'=> $groups
        ]);
    }

    public function joinGroup(JoinGroupRequest $request,  $id)
    {
        $group = Group::findOrfail($id);

        $groupUser = new GroupUser();
        $groupUser->group_id = $group->id;
        $groupUser->user_id  =  Auth::user()->id;
        $groupUser->save();

        return response()->json([
            'status'=>'success',
            'message'=>'Se unió al grupo correctamente',
            'groupUser'=> $groupUser
        ]);
    }


    public function listNotes(Request $request,$id)
    {
        $group = Group::findOrfail($id);

        $notes = Note::with('images')->where('group_id',$group->id)->paginate(10);

        return response()->json([
            'status'=>'success',
            'notes' => $notes
        ]);
    }
}
