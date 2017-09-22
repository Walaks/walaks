<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Header;

class HeaderController extends Controller
{
    public function __construct(Header $header)
    {
        $this->header = $header;
        $this->middleware('auth');
    }

    public function index()
    {
        $alerta = array(['msg'=> session()->pull('msg')]);
        if(!empty($alerta[0]['msg']))
        {
            // alert()->success($alerta[0]['msg']);
        }

        $header = $this->header->first();
        return view("admin.header.index", compact('header'));
    }

    public function criar()
    {
        return view("admin.header.criar");
    }

    public function editar($id)
    {
        $header = $this->header->find($id);
        return view("admin.header.criar", compact('header'));
    }

    public function salvar(Request $request)
    {
        if(empty($request->id)){
            $this->salvarHeader($request);
        } else {
            $this->editarHeader($request);
        }
        return redirect()->action('Admin\HeaderController@index');
    }

    public function salvarHeader($request)
    {
        $this->validate($request, $this->header->createRules);

        $form = $request->all();

        $header = $this->header->create($form);
        if($header){
            session()->put('msg', 'Header criada com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }

        return redirect()->action('Admin\HeaderController@index');
    }

    public function editarHeader($request)
    {
        $this->validate($request, $this->header->createRules);

        $form = $request->all();
        // dd($request->id);
        $header = $this->header->find($request->id);
        $header = $header->update($form);

        if($header){
            session()->put('msg', 'Header editado com sucesso!');
            session()->put('info', 'success');
            
        } else{
            session()->put('msg', 'Erro!');
        }

        return redirect()->action('Admin\HeaderController@index');
    }

    public function excluir($id)
    {
        $this->header->find($id)->delete();
        session()->put('msg', 'Header excluido com sucesso!');
        session()->put('info', 'danger');
        return redirect()->action('Admin\HeaderController@index');
    }
}
