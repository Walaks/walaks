<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Portifolio;

class PortifolioController extends Controller
{
    public function __construct(Portifolio $portifolio)
    {
        $this->portifolio = $portifolio;
        $this->middleware('auth');
    }

    public function index()
    {
        $alerta = array(['msg'=> session()->pull('msg')]);
        if(!empty($alerta[0]['msg']))
        {
            // alert()->success($alerta[0]['msg']);
        }

        $portifolios = $this->portifolio->get();
        return view("admin.portifolio.index", compact("portifolios"));
    }

    public function criar()
    {
        return view("admin.portifolio.criar");
    }

    public function editar($id)
    {
        $portifolio = $this->portifolio->find($id);
        return view("admin.portifolio.criar", compact("portifolio"));
    }

    public function salvar(Request $request)
    {
        if(empty($request->id)){
            $this->salvarPortifolio($request);
        } else {
            $this->editarPortifolio($request);
        }
        return redirect()->action("Admin\PortifolioController@index");
    }

    public function salvarPortifolio($request)
    {
        $this->validate($request, $this->portifolio->createRules);

        $form = $request->all();
        $nome_arquivo = time().'.'.$request->file('imagem')->getClientOriginalExtension();
        $request->file('imagem')->move('portifolio', $nome_arquivo);
        $form['imagem'] = $nome_arquivo;

        $portifolio = $this->portifolio->create($form);
        if($portifolio){
            session()->put('msg', 'Portifolio criado com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }

        return redirect()->action("Admin\PortifolioController@index");
    }

    public function editarPortifolio($request)
    {
        $this->validate($request, $this->portifolio->editRules);
        
        $form = $request->all();
        
        if(!Empty($request->file('imagem'))){
            $nome_arquivo = time().'.'.$request->file('imagem')->getClientOriginalExtension();
            $request->file('imagem')->move('portifolio', $nome_arquivo);
            $form['imagem'] = $nome_arquivo;
        }

        $portifolio = $this->portifolio->find($request->id);
        $portifolio = $portifolio->update($form);

        if($portifolio){
            session()->put('msg', 'Portifolio editado com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }
        return redirect()->action("Admin\PortifolioController@index");
    }

    public function excluir($id)
    {
        $this->portifolio->find($id)->delete();

        session()->put('msg', 'Portifolio excluido com sucesso!');
        session()->put('info', 'danger');

        return redirect()->action("Admin\PortifolioController@index");
    }
}
