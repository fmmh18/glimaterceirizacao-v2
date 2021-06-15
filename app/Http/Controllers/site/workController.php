<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\siteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Work;

class workController extends siteController
{
    public function index()
    {
        return view('site.work');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'birthday' => 'required',
            'cpf' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect(route('site.work'))
                        ->withErrors($validator)
                        ->withInput();
        }



        $input = [

            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'birthday'    => $request->birthday,
            'status'    => 1
        ];
        $work = new Work;
        $data = $work->add($input);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $nameFile = null;

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->file->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            $input2 = [
                'path' => 'work/'.$data->id.'/'.$nameFile
            ];

            $work->edit($input2,$data->id);

            // Faz o upload:
            $upload = $request->file->storeAs('work/'.$data->id, $nameFile,'public');
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return \Redirect()
                            ->back()
                            ->with(['icon' => 'error','message' =>'error', 'Falha ao fazer upload'])
                            ->withInput();

                            if(!empty($data->id))
                            {
                                return \Redirect::route('site.work')->with(['icon' => 'success','message' => 'Dados Salvo']);
                            }else{
                                return \Redirect::route('site.work')->with(['icon' => 'error','message' => 'Erro ao salvar']);
                            }
        }else{
            if(!empty($data->id))
            {
                return \Redirect::route('site.work')->with(['icon' => 'success','message' => 'Dados Salvo']);
            }else{
                return \Redirect::route('site.work')->with(['icon' => 'error','message' => 'Erro ao salvar']);
            }
        }

    }
}
