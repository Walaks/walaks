<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;
use App\Mail\NovaMensagem;
use App\Model\Header;
use App\Model\Servico;
use App\Model\Portifolio;
use App\Model\Sobre;
use App\Model\Experiencia;

class HomeController extends Controller
{
    public function __construct(Header $header, Servico $servico, Sobre $sobre, Experiencia $experiencia, Portifolio $portifolio)
    {
        $this->header = $header;
        $this->servico = $servico;
        $this->portifolio = $portifolio;
        $this->sobre = $sobre;
        $this->experiencia = $experiencia;
    }

    public function index()
    {
        $header = $this->header->first();
        $servicos = $this->servico->get();
        $portifolios = $this->portifolio->get();
        $experiencias = $this->experiencia->orderBy('id', 'desc')->get();

        $sobre = $this->sobre->first();
        $msg = array(['msg'=> session()->pull('msg')]);
        
        return view('front.index', compact('header', 'servicos', 'portifolios', 'experiencias', 'sobre', 'msg'));
    }

    public function mensagem(Request $request)
    {
        $form = $request->all();
        
        session()->put('nome', $form['nome']);
        session()->put('email', $form['email']);
        session()->put('telefone', $form['telefone']);
        session()->put('msg', $form['mensagem']);

        try{
            Mail::to("walaks.alves@gmail.com")->send(new NovaMensagem());
            session()->put('msg', 'Obrigado pelo seu contato!');
        }catch(Exception $e){
            dd($e);
        }
        return redirect('/#contact');
    }
}
