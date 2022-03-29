<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Note;
use App\Models\GroupUser;
use App\Http\Requests\JoinGroupRequest;
use Illuminate\Database\Eloquent\Builder;

class GroupController extends Controller
{
    public function listGroups(Request $request)
    {
        $user_id = Auth::user()->id;

        $groups = Group::withCount(['notes','groupUsers'])
                        ->with(['groupUsers' => function ($query) use ($user_id) {
                            $query->select('user_id','id','group_id')->where('user_id', $user_id);
                        }])->paginate(10);

        return response()->json([
            'status'=> 'success',
            'groups'=> $groups
        ],200);
    }

    public function joinGroup(JoinGroupRequest $request,  $id )
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
        ],200);
    }


    public function listNotes(Request $request,$id)
    {
        $group = Group::findOrfail($id);

        $notes = Note::with('images')->where('group_id',$group->id)->orderBy('id','DESC')->paginate(50);

        return response()->json([
            'status'=>'success',
            'group'=> $group,
            'notes' => $notes
        ],200);
    }
}
