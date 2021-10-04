<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function ViewUser () {
        $users = User::all();
        return view('backend.user.view', compact('users'));
    }

    public function AddUser () {
        return view('backend.user.add');
    }

    public function UserStore(Request $request) {
        $validateData = $request->validate([
            'name' => 'required', 
            'email' => 'required|email|unique:users',
        ]);
        $data = new User();
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->role);
        $data->save();

        $notification = array(
            'message' => 'User Successfully Added',
            'alert-type' => 'success'
        );

        return Redirect()->route('user.view')->with($notification);
    }

    public function UserEdit($id) {
        $editData = User::find($id);
        return view('backend.user.edit', compact('editData'));
    }

    public function UserUpdate(Request $request, $id) {
        $data = User::find($id);
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User Successfully Updated',
            'alert-type' => 'success'
        );

        return Redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id) {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Successfully Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->route('user.view')->with($notification);
    }
}
