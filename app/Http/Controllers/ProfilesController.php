<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = User::find(Auth::user()->id);
        return view('profile.index')->with('profile', $profile);
    }

    /**
     * Uploading user profie
     */
    public function profieImageUpload(Request $request, $id)
    {
        /**
         *  get the request from the user and validate it
         */
        $validator = Validator::make($request->all(), [
            'profile_image' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);
        /**
         *  if validate fails, we'll send error response
         */
        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        }
        /**
         *  if everything goes right execute the below code
         */
        else {
            /**
             *  find and get the extention of the image
             */
            $extention = $request->file('profile_image')->getClientOriginalExtension();
            /**
             *  create a new extention with the current timestamp
             */
            $newName = time() . '.' . $extention;
            /**
             *  move image to the pubic directory
             */
            $request->profile_image->move(public_path('img'), $newName);
            $path = 'img/' . $newName;
            /**
             *  find the user_id from the route
             */
            $user = User::find($id);
            $user->img_name = $newName;
            $user->img_path = $path;
            $query = $user->save();
            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'something went wrong']);
            } else {
                $img_path = $user->img_path;
                return response()->json(['code' => 1, 'msg' => 'succesfully uploaded', 'path' => $img_path]);
            }

        }
    }

    /**
     *  Removing user profie
     */
    public function profieImageRemove($id)
    {
        $user = User::find($id);
        if (!empty($user->img_name) && !empty($user->img_path)) {
            unlink("img/" . $user->img_name);
            $query = $user->img_name = "";
            $query = $user->img_path = "";
            $query = $user->save();
            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'something went wrong']);
            } else {

                return response()->json(['code' => 1, 'msg' => 'Succesfully removed', 'path' => $user->img_path]);
            }
        } else {
            return response()->json(['code' => 0, 'msg' => ' no img Exist']);
        }
    }

    /**
     * Update/ Change Password Only for logeged in User
     */

}
