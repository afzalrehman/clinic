<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Mail\VarifyUser;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Str;

class SuperAdminController extends Controller
{
    public function superadmin_index()
    {
        return view('super_admin.dashboard');
    }
    public function superadmin_user()
    {
        $data['user'] = User::UserRecord();
        return view('super_admin.user.list', $data);

    }
    public function superadmin_user_create()
    {
        $data['roles'] = DB::table('role')->where('id', '!=', 0)->get();
        return view('super_admin.user.add', $data);
    }
    public function superadmin_user_store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|unique:users,name',
            'username' => 'required|unique:users,username',
            'mobile' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
            'postion' => 'required',
            'gender' => 'required',
            'date' => 'required',
            'education' => 'required',
            'designation' => 'required',
            'department' => 'required',
            'address' => 'required',
            'password' => 'required|min:8',
        ]);
        $user = new User();
        $user->name = trim($request->name);
        $user->username = trim($request->username);
        $user->phone = trim($request->mobile);
        $user->email = trim($request->email);
        $user->role = trim($request->postion);
        $user->date_of_birth = trim($request->date);
        $user->gender = trim($request->gender);
        $user->education = trim($request->education);
        $user->designation = trim($request->designation);
        $user->department = trim($request->department);
        $user->address = trim($request->address);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();
        Mail::to($user->email)->send(new VarifyUser($user));
        return redirect('super-admin/user')->with('success', 'User add Successfuly Please Chack User Email and Verify');

    }


    public function superadmin_user_edit($id)
    {
        $data['roles'] = DB::table('role')->where('id', '!=', 0)->get();
        $data['user'] = User::find($id);
        return view('super_admin.user.edit' ,  $data);
    }

}
