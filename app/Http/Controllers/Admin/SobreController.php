<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Sobre;

class SobreController extends Controller
{
    public function __construct(Sobre $sobre)
    {
        $this->sobre = $sobre;
        $this->middleware('auth');
    }

    public function index()
    {
        $alerta = array(['msg'=> session()->pull('msg')]);
        if(!empty($alerta[0]['msg']))
        {
            // alert()->success($alerta[0]['msg']);
        }

        $sobre = $this->sobre->first();
        return view("admin.sobre.index", compact('sobre'));
    }

    public function criar()
    {
        return view("admin.sobre.criar");
    }

    public function editar($id)
    {
        $sobre = $this->sobre->find($id);
        return view("admin.sobre.criar", compact("sobre"));
    }

    public function salvar(Request $request)
    {
        if(empty($request->id)){
            $this->salvarSobre($request);
        } else {
            $this->editarSobre($request);
        }
        return redirect()->action("Admin\SobreController@index");
    }

    public function salvarSobre($request)
    {
        $this->validate($request, $this->sobre->createRules);

        $form = $request->all();

        $nome_arquivo = time().'.'.$request->file('imagem')->getClientOriginalExtension();
        $request->file('imagem')->move('sobre', $nome_arquivo);
        $form['imagem'] = $nome_arquivo;

        $sobre = $this->sobre->create($form);
        if($sobre){
            session()->put('msg', 'Sobre criado com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }
        return redirect()->action("Admin\SobreController@index");
    }

    public function editarSobre($request)
    {
        $this->validate($request, $this->sobre->editRules);
        
        $form = $request->all();

        if(!Empty($request->file('imagem'))){
            $nome_arquivo = time().'.'.$request->file('imagem')->getClientOriginalExtension();
            $request->file('imagem')->move('sobre', $nome_arquivo);
            $form['imagem'] = $nome_arquivo;
        }

        $sobre = $this->sobre->find($request->id);
        $sobre = $sobre->update($form);

        if($sobre){
            session()->put('msg', 'Sobre editado com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }
        return redirect()->action("Admin\SobreController@index");
    }

    public function excluir($id)
    {
        $this->sobre->find($id)->delete();

        session()->put('msg', 'Sobre excluido com sucesso!');
        session()->put('info', 'danger');

        return redirect()->action("Admin\SobreController@index");
    }
}
