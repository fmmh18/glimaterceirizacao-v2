<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\dashboardController;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class newsController extends dashboardController
{
    public function index()
    {
        $data = News::all();

        return view('dashboard.news.list',['data' => $data ]);
    }

    public function insert()
    {
        $route = "dashboard.news.add.send";
        $action = "adicionar";
        $icon = "fas fa-plus-circle";
        $category = Category::where('page','news')->where('status',1)->get();

        return view('dashboard.news.form',['route' => $route,'action' => $action, 'icon' => $icon, 'categories' => $category ]);

    }

    public function edit($id)
    {

        $route = "dashboard.news.edit.send";
        $action = "editar";
        $icon = "far fa-edit";
        $category = Category::where('page','news')->where('status',1)->get();
        $data = News::find($id);

        return view('dashboard.news.form',['route' => $route,'action' => $action, 'icon' => $icon, 'categories' => $category, 'data' => $data ]);

    }

    public function store(Request $request)
    {
        $news = new News;

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('dashboard.news.add'))
                        ->withErrors($validator)
                        ->withInput();
        }



        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        $input = [
            'title'     => $request->title,
            'subtitle'  => $request->subtitle,
            'slug'      => $request->slug,
            'author'    => $request->author,
            'content'   => $request->content,
            'category'  => $request->category,
            'status'    => $status
        ];
        $data = $news->add($input);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $nameFile = null;

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->image->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            $input2 = [
                'image' => 'news/'.$data->id.'/'.$nameFile
            ];

            $news->edit($input2,$data->id);

            // Faz o upload:
            $upload = $request->image->storeAs('news/'.$data->id, $nameFile,'public');
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return \Redirect()
                            ->back()
                            ->with(['icon' => 'error','message' =>'error', 'Falha ao fazer upload'])
                            ->withInput();

                            if(!empty($data->id))
                            {
                                return \Redirect::route('dashboard.news.add')->with(['icon' => 'success','message' => 'Dados Salvo']);
                            }else{
                                return \Redirect::route('dashboard.news.add')->with(['icon' => 'error','message' => 'Erro ao salvar']);
                            }
        }else{
            if(!empty($data->id))
            {
                return \Redirect::route('dashboard.news.add')->with(['icon' => 'success','message' => 'Dados Salvo']);
            }else{
                return \Redirect::route('dashboard.news.add')->with(['icon' => 'error','message' => 'Erro ao salvar']);
            }
        }
    }

    public function update(Request $request)
    {
        $news = new News;

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('dashboard.news.edit',['id'=>$request->id]))
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        $input = [
            'title'     => $request->title,
            'subtitle'  => $request->subtitle,
            'slug'      => $request->slug,
            'author'    => $request->author,
            'content'   => $request->content,
            'category'  => $request->category,
            'status'    => $status
    ];
        $data = $news->edit($input,$request->id);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $nameFile = null;

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->image->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            $input2 = [
                'image' => 'news/'.$data->id.'/'.$nameFile
            ];


            $old = 'news/'.$request->id.'/'.$request->imageOld;
            Storage::disk('public')->delete($old);

            $news->edit($input2,$data->id);

            // Faz o upload:
            $upload = $request->image->storeAs('news/'.$data->id, $nameFile,'public');
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return \Redirect()
                            ->back()
                            ->with(['icon' => 'error','message' =>'error', 'Falha ao fazer upload'])
                            ->withInput();

                            if(!empty($data->id))
                            {
                                return \Redirect::route('dashboard.news.edit',['id' => $request->id])->with(['icon' => 'success','message' => 'Dados Salvo']);
                            }else{
                                return \Redirect::route('dashboard.news.edit',['id' => $request->id])->with(['icon' => 'error','message' => 'Erro ao salvar']);
                            }
        }else{
            if(!empty($data->id))
            {
                return \Redirect::route('dashboard.news.edit',['id' => $request->id])->with(['icon' => 'success','message' => 'Dados Salvo']);
            }else{
                return \Redirect::route('dashboard.news.edit',['id' => $request->id])->with(['icon' => 'error','message' => 'Erro ao salvar']);
            }
        }
    }

    public function delete($id)
    {
        $news = new News;

        return $news->del($id);
    }

}
