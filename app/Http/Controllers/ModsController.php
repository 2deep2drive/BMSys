<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ModsController extends Controller
{

    // String of all alphanumeric character

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("moderator.index");
    }

    public function getData()
    {
      
        $user = User::whereHas('roles', function ($query) {
            $query->where('name', 'mod');
        })->select('id', 'uname', 'email', "created_at", "updated_at")->get();


        return DataTables::of($user)
            ->addColumn('Actions', function ($row) {
                return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-theme-danger"data-toggle="modal" data-target="#modal-delete-mod" id="modal-btn-delete-mod" data-id="' . $row['id'] . '">Delete</button>
                  </div>';
            })

            ->addColumn('Created_at', function ($row) {
                return $row->created_at->format('d/m/Y');
            })
            ->rawColumns(['Actions', 'Created_at'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uname' => ['required', 'string', 'min:8', 'max:13', 'unique:users,uname'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],

        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $password = substr(md5(time()), 0, 12);
            $user = User::whereHas('roles', function ($query) {
                $query->where('name', 'mod');
            });
           if(($user->count())<3){
            $user = new User;
            $user->email = $request->email;
            $user->uname = $request->uname;
            $user->isVerified = 1;
            $user->password = Hash::make($password);
            $query = $user->save();
            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);

            } else {
                $user->markEmailAsVerified();

                $user->attachRole('mod');
                // Mail::to($request->email)->send(new SendPassword($password));
                return response()->json(['code' => 1, 'msg' => 'Successfully Created']);
            }
        }else{
            return response()->json(['code' => 0, 'msg' => 'Limit has exceed']);
        }
        }
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {

        $user = User::find($request->mod);

        $query = $user->delete();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            $user->detachRole('mod');
            return response()->json(['code' => 1, 'msg' => 'Tags Deleted Successfully']);
        }
    }

}
