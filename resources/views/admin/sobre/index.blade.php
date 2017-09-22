@extends('admin.layout.master')

@section('titulo', 'Sobre')
@section('conteudo')
<section class="title__page">
@if(Empty($sobre))
    <div class="title__page--right">
        <a href="{{ url('admin/sobre/criar') }}" class="btn btn-primary btn-round">
            <i class="material-icons">add_circle_outline</i> Adicionar
        </a>
    </div>
@endif
</section>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="title text-center">@yield('titulo')</h3>
        <br>
    </div>
    @if(!Empty($sobre))
        <div class="col-md-12">
            <div class="card card-testimonial">
                <div class="card-actions">
                    <a href="{{ url('admin/sobre/editar/'.$sobre->id) }}">
                        <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Editar">
                            <i class="material-icons">edit</i>
                        </button>
                    </a>
                    <a href="{{ url('/admin/sobre/excluir/'.$sobre->id) }}">
                        <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remover">
                            <i class="material-icons">close</i>
                        </button>
                    </a>
                </div>
                <div class="icon">
                    <i class="material-icons">format_quote</i>
                </div>
                <div class="card-content">
                    <h5 class="card-description">
                        {!!$sobre->descricao!!}
                    </h5>
                </div>
                <div class="footer">
                    <h4 class="card-title">{{$sobre->nome}}</h4>
                    <h6 class="category">{{$sobre->cargo}}</h6>
                    <div class="card-avatar">
                        <img class="img" src="{{asset('sobre/'.$sobre->imagem)}}" />
                    </div>
                </div>
            </div>
        </div> 
    @endif   
</div>
@endsection