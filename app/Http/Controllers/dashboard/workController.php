<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\dashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Work;

class workController extends dashboardController
{
    public function index()
    {
        $data = Work::all();

        return view('dashboard.work.list',['data' => $data ]);
    }

    public function insert()
    {
        $route = "dashboard.curriculum.add.send";
        $action = "adicionar";
        $icon = "fas fa-plus-circle";

        return view('dashboard.work.form',['route' => $route,'action' => $action, 'icon' => $icon ]);
    }

    public function edit($id)
    {
        $route = "dashboard.curriculum.edit.send";
        $action = "editar";
        $icon = "far fa-edit";
        $data = Work::find($id);
        $data->view += 1;
        $data->save();

        return view('dashboard.work.form',['route' => $route,'action' => $action, 'icon' => $icon, 'data' => $data ]);
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
            return redirect(route('dashboard.curriculum.add'))
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
            $upload = $request->image->storeAs('work/'.$data->id, $nameFile,'public');
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return \Redirect()
                            ->back()
                            ->with(['icon' => 'error','message' =>'error', 'Falha ao fazer upload'])
                            ->withInput();

                            if(!empty($data->id))
                            {
                                return \Redirect::route('dashboard.curriculum.add')->with(['icon' => 'success','message' => 'Dados Salvo']);
                            }else{
                                return \Redirect::route('dashboard.curriculum.add')->with(['icon' => 'error','message' => 'Erro ao salvar']);
                            }
        }else{
            if(!empty($data->id))
            {
                return \Redirect::route('dashboard.curriculum.add')->with(['icon' => 'success','message' => 'Dados Salvo']);
            }else{
                return \Redirect::route('dashboard.curriculum.add')->with(['icon' => 'error','message' => 'Erro ao salvar']);
            }
        }

    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'birthday' => 'required',
            'cpf' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('dashboard.curriculum.edit',['id'=> $request->id]))
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
            'phone' => $request->phone,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'birthday'    => $request->birthday,
            'status'    => $status
        ];

        $work = new Work;
        $data = $work->edit($input,$request->id);


        if(!empty($data->id))
        {
            return \Redirect::route('dashboard.curriculum.edit',['id' => $request->id ])->with(['icon' => 'success','message' => 'Dados Salvo']);
        }else{
            return \Redirect::route('dashboard.curriculum.edit',['id' => $request->id ])->with(['icon' => 'error','message' => 'Erro ao salvar']);
        }
    }

    public function delete($id)
    {
        $work = new Work;
        $data = $work->del($id);

        return $data;

    }
}
