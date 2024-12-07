<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\VarifyUser;
use App\Models\DoctorModel;
use App\Models\PatientModel;
use App\Models\User;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Str;

class AdminController extends Controller
{
    public function admin_index()
    {
        return view('admin.dashboard');
    }



    // user start
    public function admin_user(Request $request)
    {
        $data['user'] = User::AdminUserRecord($request);
        return view('admin.user.list', $data);

    }
    public function admin_user_create()
    {
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();

        $data['roles'] = DB::table('role')->where('id', '!=', 0)->Where('id', '!=', 1)->get();
        return view('admin.user.add', $data);
    }
    public function admin_user_store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'user_id' => 'required|unique:users,user_id',
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'mobile' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
            'postion' => 'required',
            'password' => 'required|min:8',
        ]);
        $user = new User();
        $user->user_id = trim($request->user_id);
        $user->name = trim($request->name);
        $user->username = trim($request->username);
        $user->phone = trim($request->mobile);
        $user->address = trim($request->address);
        $user->email = trim($request->email);
        $user->role = trim($request->postion);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();
        Mail::to($user->email)->send(new VarifyUser($user));
        return redirect('admin/user')->with('success', 'User add Successfuly Please Chack User Email and Verify');

    }


    public function admin_user_edit($id)
    {
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();

        $data['roles'] = DB::table('role')->where('id', '!=', 0)->Where('id', '!=', 1)->get();
        $data['user'] = User::find($id);
        return view('admin.user.edit', $data);
    }

    public function admin_user_update($id, Request $request)
    {
        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User Not Found');
        }

        // Validate the request data
        $request->validate([
            'user_id' => 'required|unique:users,user_id',
            'name' => 'required|unique:users,name,' . $user->id,
            'username' => 'required|unique:users,username,' . $user->id,
            'mobile' => 'required|unique:users,phone,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'postion' => 'required',
        ]);

        // Update user attributes
        $user->user_id = trim($request->user_id);
        $user->name = trim($request->name);
        $user->username = trim($request->username);
        $user->address = trim($request->address);
        $user->phone = trim($request->mobile);
        $user->email = trim($request->email);
        $user->role = trim($request->postion);

        // Save the updated user data
        $user->save();

        return redirect('admin/user')->with('success', 'User updated successfully');
    }


    public function admin_user_delete($id)
    {
        // Find the user by ID
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User Not Found');
        }
        $user->delete();

        return redirect()->back()->with('error', 'User Successfully Deleted');
    }




    //profile start
    public function admin_profile()
    {
        $data['profile'] = User::find(Auth::user()->id);
        return view('admin.profile.view', $data);
    }

    public function admin_profile_edit()
    {
        $data['corrent_user'] = User::find(Auth::user()->id);
        return view('admin.profile.edit', $data);
    }
    public function admin_profile_update(Request $request)
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
                if (!empty($profile->profile) && file_exists(public_path('upload/img/admin/' . $profile->profile))) {
                    unlink(public_path('upload/img/admin/' . $profile->profile));
                }
                $image = $request->file('profile');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/img/admin/'), $imagename);
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
            $profile->save();

            return redirect()->back()->with('success', 'Profile Update Successfully');
        } else {
            abort(404);
        }
    }

    public function getUserDetails($id)
    {
        $data['patient'] = PatientModel::where('cnic', $id)->first(); // Assuming you have a `Patient` model
        $data['doctor'] = DoctorModel::where('cnic', $id)->first(); // Assuming you have a `Patient` model
        if (!empty($data['patient'])) {
            return response()->json([
                'name' => $data['patient']->name,
                'lastname' => $data['patient']->lastname,
                'mobile' => $data['patient']->mobile,
                'email' => $data['patient']->email,
                'address' => $data['patient']->address,
            ]);
        } elseif (!empty($data['doctor'])) {
            return response()->json([
                'name' => $data['doctor']->name,
                'lastname' => $data['doctor']->lastname,
                'mobile' => $data['doctor']->mobile,
                'email' => $data['doctor']->email,
                'address' => $data['doctor']->address,
            ]);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

}
