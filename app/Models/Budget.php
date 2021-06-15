<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    public function add($input)
    {
        $data = new Budget;

        if(!empty($input['name']))
        $data->name = $input['name'];
        if(!empty($input['email']))
            $data->email = $input['email'];
        if(!empty($input['phone']))
            $data->phone = $input['phone'];
        if(!empty($input['subject']))
            $data->subject = $input['subject'];
        if(!empty($input['content']))
            $data->content = $input['content'];
        if(!empty($input['status']))
            $data->status = $input['status'];

        $data->save();

        return $data;

    }

    public function edit($input,$id)
    {
        $data = Budget::find($id);

        if(!empty($input['name']))
            $data->name = $input['name'];
        if(!empty($input['email']))
            $data->email = $input['email'];
        if(!empty($input['phone']))
            $data->phone = $input['phone'];
        if(!empty($input['subject']))
            $data->subject = $input['subject'];
        if(!empty($input['content']))
            $data->content = $input['content'];
        if(!empty($input['status']))
            $data->status = $input['status'];

        $data->save();

        return $data;

    }

    public function del($id)
    {
        $data = Budget::find($id);

        $data->status = 0;

        $data->save();

        return $data;
    }
}
