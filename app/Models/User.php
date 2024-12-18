<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        $return = self::select('users.*')->where('role', '!=', 0)->Where('role', '!=', 1)->orderBy('id', 'DESC');
        if (!empty($request->get('search'))) {
            $return = $return->where('users.name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('users.phone', 'like', '%' . $request->get('search') . '%')
                ->orWhere('users.email', 'like', '%' . $request->get('search') . '%');
                // ->orWhere('users.role', 'like', '%' . $roles[$request->get('search')] . '%');
        }
        return $return->where('role', '!=', 0)->Where('role', '!=', 1)->get();
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
}
