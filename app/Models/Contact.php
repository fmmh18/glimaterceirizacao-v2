<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function add($input)
    {
        $data = new Contact;

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
        $data = Contact::find($id);

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
        $data = Contact::find($id);

        $data->status = 0;

        $data->save();

        return $data;
    }
}
