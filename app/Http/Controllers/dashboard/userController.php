<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\dashboardController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class userController extends dashboardController
{
    public function index()
    {
        $data = User::all();

        return view('dashboard.user.list',['data' => $data ]);
    }

    public function insert()
    {
        $route = "dashboard.user.add.send";
        $action = "adicionar";
        $icon = "fas fa-plus-circle";

        return view('dashboard.user.form',['route' => $route,'action' => $action, 'icon' => $icon ]);
    }

    public function edit($id)
    {
        $route = "dashboard.user.edit.send";
        $action = "editar";
        $icon = "far fa-edit";
        $data = User::find($id);

        return view('dashboard.user.form',['route' => $route,'action' => $action, 'icon' => $icon, 'data' => $data ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('dashboard.user.add'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User;
        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        $input = [
            'name' => $request->name,
            'status' => $status,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'birthday' => $request->birthday,
            'role' => $request->role
        ];

        $data = $user->add($input);
        $data->roles()->sync($request->role);

        if(!empty($data->id))
        {
            return \Redirect::route('dashboard.user.add')->with(['icon' => 'success','message' => 'Dados Salvo']);
        }else{
            return \Redirect::route('dashboard.user.add')->with(['icon' => 'error','message' => 'Erro ao salvar']);
        }

    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('dashboard.user.edit',['id'=> $request->id]))
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        $input = [
            'name' => $request->name,
            'status' => $status,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'birthday' => $request->birthday,
            'role' => $request->role
        ];

        $user = new User;
        $data = $user->edit($input,$request->id);

        $data->roles()->sync($request->role);

        if(!empty($data->id))
        {
            return \Redirect::route('dashboard.user.edit',['id' => $request->id ])->with(['icon' => 'success','message' => 'Dados Salvo']);
        }else{
            return \Redirect::route('dashboard.user.edit',['id' => $request->id ])->with(['icon' => 'error','message' => 'Erro ao salvar']);
        }
    }

    public function delete($id)
    {
        $user = new User;
        $data = $user->del($id);

        return $data;

    }
}
