<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function add($input)
    {
        $data = new News;

        if(!empty($input['title']))
            $data->title = $input['title'];
        if(!empty($input['subtitle']))
            $data->subtitle = $input['subtitle'];
        if(!empty($input['slug']))
            $data->slug = $input['slug'];
        if(!empty($input['status']))
            $data->status = $input['status'];
        if(!empty($input['author']))
            $data->author = $input['author'];
        if(!empty($input['image']))
            $data->image = $input['image'];
        if(!empty($input['content']))
            $data->content = $input['content'];
        if(!empty($input['category']))
            $data->category_id = $input['category'];

        $data->save();

        return $data;

    }

    public function edit($input,$id)
    {
        $data = News::find($id);

        if(!empty($input['title']))
            $data->title = $input['title'];
        if(!empty($input['subtitle']))
            $data->subtitle = $input['subtitle'];
        if(!empty($input['slug']))
            $data->slug = $input['slug'];
        if(!empty($input['status']))
            $data->status = $input['status'];
        if(!empty($input['author']))
            $data->author = $input['author'];
        if(!empty($input['image']))
            $data->image = $input['image'];
        if(!empty($input['content']))
            $data->content = $input['content'];
        if(!empty($input['category']))
            $data->category_id = $input['category'];

        $data->save();

        return $data;

    }

    public function del($id)
    {
        $data = News::find($id);

        $data->status = 0;

        $data->save();

        return $data;
    }

}
