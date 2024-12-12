<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Mail\VarifyUser;
use App\Models\User;
use Auth;
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

    // user start
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
            'name' => 'required',
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
        $user->created_at = date('Y-m-d H:i:s');

        $user->save();
        Mail::to($user->email)->send(new VarifyUser($user));
        return redirect('super-admin/user')->with('success', 'User add Successfuly Please Chack User Email and Verify');
    }


    public function superadmin_user_edit($id)
    {
        $data['roles'] = DB::table('role')->where('id', '!=', 0)->get();
        $data['user'] = User::find($id);
        return view('super_admin.user.edit', $data);
    }

    public function superadmin_user_update($id, Request $request)
    {
        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User Not Found');
        }

        // Validate the request data
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'mobile' => 'required|unique:users,phone,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'postion' => 'required',
            'gender' => 'required',
            'date' => 'required',
            'education' => 'required',
            'designation' => 'required',
            'department' => 'required',
            'address' => 'required',
        ]);

        // Update user attributes
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
        $user->updated_at = date('Y-m-d H:i:s');

        // Save the updated user data
        $user->save();

        return redirect('super-admin/user')->with('success', 'User updated successfully');
    }


    public function superadmin_user_delete($id)
    {
        // Find the user by ID
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User Not Found');
        }
        if (!empty($user->profile) && file_exists(public_path('upload/img/users/' . $user->profile))) {
            unlink(public_path('upload/img/users/' . $user->profile));
        }
        $user->delete();

        return redirect()->back()->with('error', 'User Successfully Deleted');
    }





    //profile start
    public function superadmin_profile()
    {
        $data['profile'] = User::find(Auth::user()->id);
        return view('super_admin.profile.view' , $data);
    }

    public function superadmin_profile_edit()
    {
        $data['corrent_user'] = User::find(Auth::user()->id);
        return view('super_admin.profile.edit', $data);
    }
    public function superadmin_profile_update(Request $request)
    {
        $profile = User::where('id', '=', Auth::user()->id)->first();
        if (!empty($profile)) {
            $request->validate([
                'name' => 'required|unique:users,name,' . $profile->id,
                'username' => 'required|unique:users,username,' . $profile->id,
                'phone' => 'required|unique:users,phone,' . $profile->id,
                'email' => 'required|email|unique:users,email,' . $profile->id,
                'gender' => 'required',
                'date_of_birth' => 'required',
                'education' => 'required',
                'designation' => 'required',
                'department' => 'required',
                'address' => 'required',
            ]);

            if ($request->hasFile('profile')) {
                if (!empty($profile->profile) && file_exists(public_path('upload/img/users/' . $profile->profile))) {
                    unlink(public_path('upload/img/users/' . $profile->profile));
                }
                $image = $request->file('profile');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/img/users/'), $imagename);
                $profile->profile = $imagename;
            }
            $profile->name = $request->name;
            $profile->username = $request->username;
            $profile->date_of_birth = $request->date_of_birth;
            $profile->gender = $request->gender;
            $profile->address = $request->address;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            $profile->education = $request->education;
            $profile->designation = $request->designation;
            $profile->department = $request->department;
            $profile->updated_at = date('Y-m-d H:i:s');

            $profile->save();

            return redirect()->back()->with('success', 'Profile Update Successfully');
        } else {
            abort(404);
        }
    }
}
