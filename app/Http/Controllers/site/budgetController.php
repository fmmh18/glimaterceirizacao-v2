<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\siteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Budget;


class budgetController extends siteController
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect(route('site.home'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = [
            'name'     => $request->name,
            'phone'  => $request->phone,
            'email'      => $request->email,
            'subject'   => 'orçamento',
            'content'   => $request->content,
            'status'    => 1
    ];

        $budget = new Budget;

        $data = $budget->add($input,$request->id);

        if(!empty($data->id))
        {
            return \Redirect::route('site.home')->with(['icon' => 'success','message' => 'Dados Salvo']);
        }else{
            return \Redirect::route('site.home')->with(['icon' => 'error','message' => 'Erro ao salvar']);
        }

    }
}
