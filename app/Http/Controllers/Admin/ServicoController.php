<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Servico;

class ServicoController extends Controller
{
    public function __construct(Servico $servico)
    {
        $this->servico = $servico;
        $this->middleware('auth');
    }

    public function index()
    {
        $alerta = array(['msg'=> session()->pull('msg')]);
        if(!empty($alerta[0]['msg']))
        {
            // alert()->success($alerta[0]['msg']);
        }

        $servicos = $this->servico->get();
        return view("admin.servico.index", compact("servicos"));
    }

    public function criar()
    {
        return view("admin.servico.criar");
    }

    public function editar($id)
    {
        $servico = $this->servico->find($id);
        return view("admin.servico.criar", compact("servico"));
    }

    public function salvar(Request $request)
    {
        if(empty($request->id)){
            $this->salvarServico($request);
        } else {
            $this->editarServico($request);
        }
        return redirect()->action("Admin\ServicoController@index");
    }

    public function salvarServico($request)
    {
        $this->validate($request, $this->servico->createRules);

        $form = $request->all();

        $servico = $this->servico->create($form);
        if($servico){
            session()->put('msg', 'Serviço criado com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }
        return redirect()->action("Admin\ServicoController@index");
    }

    public function editarServico($request)
    {
        $this->validate($request, $this->servico->createRules);
        $form = $request->all();

        $servico = $this->servico->find($request->id);
        $servico = $servico->update($form);

        if($servico){
            session()->put('msg', 'Serviço editado com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }
        return redirect()->action("Admin\ServicoController@index");
    }

    public function excluir($id)
    {
        $this->servico->find($id)->delete();

        session()->put('msg', 'Serviço excluido com sucesso!');
        session()->put('info', 'danger');

        return redirect()->action("Admin\ServicoController@index");
    }
}
