<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\dashboardController;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class carouselController extends dashboardController
{
    public function index()
    {

        $data       = Image::where('gallery',7)->get();
        $category   = Category::where('page','carousel')->where('status',1)->get();

        return view('dashboard.carousel.list',['data' => $data,'categories' => $category ]);
    }

    public function insert()
    {

        $category   = Category::where('page','carousel')->where('status',1)->get();

        $route = "dashboard.carousel.add.send";
        $action = "adicionar";
        $icon = "fas fa-plus-circle";

        return view('dashboard.carousel.form',['route' => $route,'action' => $action, 'icon' => $icon, 'categories' => $category ]);
    }

    public function edit($id)
    {

        $category   = Category::where('page','carousel')->where('status',1)->get();

        $route = "dashboard.carousel.edit.send";
        $action = "editar";
        $icon = "far fa-edit";
        $data = Image::find($id);

        return view('dashboard.carousel.form',['route' => $route,'action' => $action, 'icon' => $icon, 'categories' => $category, 'data' => $data ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'position' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('dashboard.carousel.add'))
                        ->withErrors($validator)
                        ->withInput();
        }



        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        $image = new Image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $input = [
                'name'     => $request->name,
                'type'      => $request->image->extension(),
                'position'    => $request->position,
                'gallery'  => $request->category,
                'status'    => $status
            ];

            $data = $image->add($input);
            $nameFile = null;

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->image->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            $input2 = [
                'path' => 'gallery/carousel/'.$nameFile
            ];

            $image->edit($input2,$data->id);

            // Faz o upload:
            $upload = $request->image->storeAs('gallery/carousel/', $nameFile,'public');
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return \Redirect()
                            ->back()
                            ->with(['icon' => 'error','message' =>'error', 'Falha ao fazer upload'])
                            ->withInput();

                            if(!empty($data->id))
                            {
                                return \Redirect::route('dashboard.carousel.add')->with(['icon' => 'success','message' => 'Dados Salvo']);
                            }else{
                                return \Redirect::route('dashboard.carousel.add')->with(['icon' => 'error','message' => 'Erro ao salvar']);
                            }
        }else{
            $input = [
                'name'     => $request->name,
                'path'  => $request->path,
                'type'      => '',
                'position'    => $request->position,
                'gallery'  => $request->category,
                'status'    => $status
        ];

        $data = $image->add($input);

            if(!empty($data->id))
            {
                return \Redirect::route('dashboard.carousel.add')->with(['icon' => 'success','message' => 'Dados Salvo']);
            }else{
                return \Redirect::route('dashboard.carousel.add')->with(['icon' => 'error','message' => 'Erro ao salvar']);
            }
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'position' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('dashboard.carousel.edit',['id'=>$request->id]))
                        ->withErrors($validator)
                        ->withInput();
        }



        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        $image = new Image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $input = [
                'name'     => $request->name,
                'type'      => $request->image->extension(),
                'position'    => $request->position,
                'gallery'  => $request->category,
                'status'    => $status
            ];

            $data = $image->edit($input);
            $nameFile = null;

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->image->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            $input2 = [
                'path' => 'gallery/carousel/'.$nameFile
            ];

            $image->edit($input2,$data->id);

            $old = 'gallery/carousel/'.$request->imageOld;
            Storage::disk('public')->delete($old);
            // Faz o upload:
            $upload = $request->image->storeAs('gallery/carousel/'.$data->id, $nameFile,'public');
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return \Redirect()
                            ->back()
                            ->with(['icon' => 'error','message' =>'error', 'Falha ao fazer upload'])
                            ->withInput();

                            if(!empty($data->id))
                            {
                                return \Redirect::route('dashboard.carousel.edit',['id' => $request->id ])->with(['icon' => 'success','message' => 'Dados Salvo']);
                            }else{
                                return \Redirect::route('dashboard.carousel.edit',['id' => $request->id ])->with(['icon' => 'error','message' => 'Erro ao salvar']);
                            }
        }else{
            $input = [
                'name'     => $request->name,
                'path'  => $request->path,
                'type'      => '',
                'position'    => $request->position,
                'gallery'  => $request->category,
                'status'    => $status
        ];

        $data = $image->edit($input);

            if(!empty($data->id))
            {
                return \Redirect::route('dashboard.carousel.edit',['id' => $request->id ])->with(['icon' => 'success','message' => 'Dados Salvo']);
            }else{
                return \Redirect::route('dashboard.carousel.edit',['id' => $request->id ])->with(['icon' => 'error','message' => 'Erro ao salvar']);
            }
        }
    }

    public function delete($id)
    {

        $image = new Image;

        $row = $image::find($id);
        $old = 'gallery/carousel/'.$row->path;
        Storage::disk('public')->delete($old);

        return $image->del($id);
    }

}
