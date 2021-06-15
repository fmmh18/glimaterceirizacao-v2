<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\siteController;
use Illuminate\Http\Request;

class contactController extends siteController
{
    public function index()
    {
        return view('site.contact');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('site.contact'))
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

        $data = $contact->add($input,$request->id);

        if(!empty($data->id))
            {
                return \Redirect::route('site.contact')->with(['icon' => 'success','message' => 'Dados Salvo']);
            }else{
                return \Redirect::route('site.contact')->with(['icon' => 'error','message' => 'Erro ao salvar']);
            }
    }
}
