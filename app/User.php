<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function hasAnyRole($roles)
    {
        if($this->roles()->whereIn('name',$roles)->first()){
            return true;
        }
            return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name',$role)->first()){
            return true;
        }
            return false;
    }

    public function add($input)
    {
        $data = new User;

        if(!empty($input['name']))
        $data->name = $input['name'];
        if(!empty($input['email']))
            $data->email = $input['email'];
        if(!empty($input['phone']))
            $data->phone = $input['phone'];
        if(!empty($input['password']))
            $data->password = Hash::make($input['password']);
        if(!empty($input['role']))
            $data->role = $input['role'];
        if(!empty($input['status']))
            $data->status = $input['status'];

        $data->save();

        return $data;
    }

    public function edit($input,$id)
    {
        $data = User::find($id);

        if(!empty($input['name']))
        $data->name = $input['name'];
        if(!empty($input['email']))
            $data->email = $input['email'];
        if(!empty($input['phone']))
            $data->phone = $input['phone'];
        if(!empty($input['password']))
            $data->password = Hash::make($input['password']);
        if(!empty($input['role']))
            $data->role = $input['role'];
        if(!empty($input['status']))
            $data->status = $input['status'];

        $data->save();

        return $data;
    }

    public function del($id)
    {
        $data = User::find($id);

        $data->status = 0;

        $data->save();

        return $data;
    }
}
