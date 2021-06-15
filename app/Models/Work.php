<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function add($input)
    {
        $data = new Work;

        if(!empty($input['name']))
        $data->name = $input['name'];
        if(!empty($input['email']))
            $data->email = $input['email'];
        if(!empty($input['phone']))
            $data->phone = $input['phone'];
        if(!empty($input['path']))
            $data->path = $input['path'];
        if(!empty($input['birthday']))
            $data->birthday = $input['birthday'];
        if(!empty($input['cpf']))
            $data->cpf = $input['cpf'];
        if(!empty($input['status']))
            $data->status = $input['status'];

        $data->save();

        return $data;
    }

    public function edit($input,$id)
    {
        $data = Work::find($id);


        if(!empty($input['name']))
        $data->name = $input['name'];
        if(!empty($input['email']))
            $data->email = $input['email'];
        if(!empty($input['phone']))
            $data->phone = $input['phone'];
        if(!empty($input['path']))
            $data->path = $input['path'];
        if(!empty($input['birthday']))
            $data->birthday = $input['birthday'];
        if(!empty($input['cpf']))
            $data->cpf = $input['cpf'];
        if(!empty($input['status']))
            $data->status = $input['status'];

        $data->save();

        return $data;
    }

    public function del($id)
    {
        $data = Work::find($id);

        $data->status = 0;

        $data->save();

        return $data;
    }
}
