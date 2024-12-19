<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Request;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    static public function UserRecord()
    {
        $return = self::select('users.*')->where('role', '=', 1)->orderBy('id', 'DESC');
        return $return->get();
    }


    static public function AdminUserRecord($request)
    {

        // $roles = [
        //     'patient' => 3,
        //     'doctor' => 2,
        // ];
        $return = self::select('users.*')->where('users.clinic_id', Auth::user()->clinic_id);
        if (!empty($request->get('search'))) {
            $return = $return->where('users.name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('users.phone', 'like', '%' . $request->get('search') . '%')
                ->orWhere('users.email', 'like', '%' . $request->get('search') . '%');
                // ->orWhere('users.role', 'like', '%' . $roles[$request->get('search')] . '%');
        }
        return $return->orderBy('id', 'DESC')->get();
    }


    public function getImage()
    {
        if ($this->profile) {
            return asset('upload/img/users/' . $this->profile);
        }
        return asset('asset/img/user.jpg');
    }
    public function AdminGetImage()
    {
        if ($this->profile) {
            return asset('upload/img/users/' . $this->profile);
        }
        return asset('assets/img/user.jpg');
    }


    public function application_name()
    {
        $logo = ClinicModel::where('clinic_code' , Auth::user()->clinic_id)->first(); 
            return  $logo->application_name;     
    }
    public function Getlogo()
    {
        $logo = ClinicModel::where('clinic_code' , Auth::user()->clinic_id)->first();
        if ($logo->logo_path) {
            return asset('upload/clinic-logo/' . $logo->logo_path);
        }
        
    }
    public function Getfavicon()
    {
        $logo = ClinicModel::where('clinic_code' , Auth::user()->clinic_id)->first();

        if ($logo->favicon_path) {
            return asset('upload/clinic-logo/fav-icon/' . $logo->favicon_path);
        }
       
    }


    // super admin
   
    public function superadminlogo()
    {
        if ($this->logo_path) {
            return asset('upload/clinic-logo/' . $this->logo_path);
        }
        
    }
    public function superadmin_favicon()
    {

        if ($this->favicon_path) {
            return asset('upload/clinic-logo/fav-icon/' . $this->favicon_path);
        }
       
    }
}
