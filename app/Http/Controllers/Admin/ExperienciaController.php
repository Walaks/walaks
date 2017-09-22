<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Experiencia;

class ExperienciaController extends Controller
{
    public function __construct(Experiencia $experiencia)
    {
        $this->experiencia = $experiencia;
        $this->middleware('auth');
    }

    public function index()
    {
        $alerta = array(['msg'=> session()->pull('msg')]);
        if(!empty($alerta[0]['msg']))
        {
            // alert()->success($alerta[0]['msg']);
        }
        $experiencias = $this->experiencia->get();
        
        return view("admin.experiencia.index", compact("experiencias"));
    }

    public function criar()
    {
        return view("admin.experiencia.criar");
    }

    public function editar($id)
    {
        $experiencia = $this->experiencia->find($id);
        return view("admin.experiencia.criar", compact("experiencia"));
    }

    public function salvar(Request $request)
    {
        if(empty($request->id)){
            $this->salvarExperiencia($request);
        } else {
            $this->editarExperiencia($request);
        }
        return redirect()->action("Admin\ExperienciaController@index");
    }

    public function salvarExperiencia($request)
    {
        $this->validate($request, $this->experiencia->createRules);

        $form = $request->all();

        $nome_arquivo = time().'.'.$request->file('imagem')->getClientOriginalExtension();
        $request->file('imagem')->move('experiencia', $nome_arquivo);
        $form['imagem'] = $nome_arquivo;

        $experiencia = $this->experiencia->create($form);
        if($experiencia){
            session()->put('msg', 'Experiencia criada com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }
        return redirect()->action("Admin\ExperienciaController@index");
    }

    public function editarExperiencia($request)
    {
        $this->validate($request, $this->experiencia->editRules);
        
        $form = $request->all();
        
        if(!Empty($request->file('imagem'))){
            $nome_arquivo = time().'.'.$request->file('imagem')->getClientOriginalExtension();
            $request->file('imagem')->move('experiencia', $nome_arquivo);
            $form['imagem'] = $nome_arquivo;
        }

        $experiencia = $this->experiencia->find($request->id);
        $experiencia = $experiencia->update($form);

        if($experiencia){
            session()->put('msg', 'Experiencia editada com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }

        return redirect()->action("Admin\ExperienciaController@index");
    }

    public function excluir($id)
    {
        $this->experiencia->find($id)->delete();

        session()->put('msg', 'Experiencia excluida com sucesso!');
        session()->put('info', 'danger');

        return redirect()->action("Admin\ExperienciaController@index");
    }
}
