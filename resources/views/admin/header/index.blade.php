@extends('admin.layout.master')

@section('titulo', 'Header')
@section('conteudo')

<section class="title__page">
    <div class="title__page--left">
        <h3>@yield('titulo')</h3>
        <br>
    </div>
    @if(!$header)
    <div class="title__page--right">
            <a href="{{ url('admin/header/criar') }}" class="btn btn-primary btn-round">
                <i class="material-icons">add_circle_outline</i> Adicionar
            </a>
        </div>
    @endif
</section>
<div class="row row-flex">
    @if($header)
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card card-product card-product-campanhas">
                <div class="card-content">
                    <div class="card-actions">
                        <a href="{{ url('admin/header/editar/'.$header->id) }}">
                            <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Editar">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <a href="{{ url('/admin/header/excluir/'.$header->id) }}">
                            <button type="button" class="btn btn-danger btn-simple excluir{{$header->id}}" rel="tooltip" data-placement="bottom" title="Remover">
                                <i class="material-icons">close</i>
                            </button>
                        </a>
                    </div>
                    <h4 class="card-title">
                        <a href="#">{{$header->titulo}}</a>
                    </h4>
                    <div class="card-description">
                        {{$header->subtitulo}}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection