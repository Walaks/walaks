@extends('admin.layout.master')

@section('titulo', 'Portifolio')
@section('conteudo')
<section class="title__page">
    <div class="title__page--right">
        <a href="{{ url('admin/portifolio/criar') }}" class="btn btn-primary btn-round">
            <i class="material-icons">add_circle_outline</i> Adicionar
        </a>
    </div>
</section>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="title text-center">@yield('titulo')</h3>
        <br>
    </div>
    @foreach($portifolios as $portifolio)
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-image" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('portifolio/'.$portifolio->imagem)}}">
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <a href="{{ url('admin/portifolio/editar/'.$portifolio->id) }}">
                            <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <a href="{{ url('admin/portifolio/excluir/'.$portifolio->id) }}">
                            <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                                <i class="material-icons">close</i>
                            </button>
                        </a>
                    </div>
                    <h4 class="card-title">
                        <a href="#pablo">{{$portifolio->nome}}</a>
                    </h4>
                    <div class="card-description">
                        {!!$portifolio->descricao!!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection