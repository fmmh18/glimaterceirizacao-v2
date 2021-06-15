<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function add($input)
    {
        $data = new Image;

        if(!empty($input['name']))
        $data->name = $input['name'];
        if(!empty($input['path']))
            $data->path = $input['path'];
        if(!empty($input['type']))
            $data->type = $input['type'];
        if(!empty($input['gallery']))
            $data->gallery = $input['gallery'];
        if(!empty($input['position']))
            $data->position = $input['position'];
        if(!empty($input['status']))
            $data->status = $input['status'];

        $data->save();

        return $data;

    }

    public function edit($input,$id)
    {
        $data = Image::find($id);

        if(!empty($input['name']))
        $data->name = $input['name'];
        if(!empty($input['path']))
            $data->path = $input['path'];
        if(!empty($input['type']))
            $data->type = $input['type'];
        if(!empty($input['gallery']))
            $data->gallery = $input['gallery'];
        if(!empty($input['position']))
            $data->position = $input['position'];
        if(!empty($input['status']))
            $data->status = $input['status'];

        $data->save();

        return $data;

    }

    public function del($id)
    {

        $data = Image::find($id);
        $data->status = 0;
        $data->save();

        return $data;

    }
}
