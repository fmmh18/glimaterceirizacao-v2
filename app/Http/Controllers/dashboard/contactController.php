<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\dashboardController;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class contactController extends dashboardController
{
    public function index()
    {
        $data = Contact::all();

        return view('dashboard.contact.list',['data' => $data ]);
    }

    public function edit($id)
    {
        $route = "dashboard.contact.edit.send";
        $action = "editar";
        $icon = "far fa-edit";
        $data = Contact::find($id);
        $data->view += 1;
        $data->save();

        return view('dashboard.contact.form',['route' => $route,'action' => $action, 'icon' => $icon, 'data' => $data ]);

    }

    public function update(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('dashboard.contact.edit',['id'=>$request->id]))
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        $input = [
            'name'     => $request->name,
            'phone'  => $request->phone,
            'email'      => $request->email,
            'subject'    => $request->subject,
            'content'   => $request->content,
            'status'    => $status
    ];
        $contact = new Contact;

        $data = $contact->edit($input,$request->id);

        if(!empty($data->id))
            {
                return \Redirect::route('dashboard.contact.edit',['id' => $request->id])->with(['icon' => 'success','message' => 'Dados Salvo']);
            }else{
                return \Redirect::route('dashboard.contact.edit',['id' => $request->id])->with(['icon' => 'error','message' => 'Erro ao salvar']);
            }
    }

    public function delete($id)
    {
        $contact = new Contact;

        return $contact->del($id);
    }
}
