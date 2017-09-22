@extends('admin.layout.master')

@section('titulo', 'Experiência')
@section('conteudo')
<section class="title__page">
    <div class="title__page--right">
        <a href="{{ url('admin/experiencia/criar') }}" class="btn btn-primary btn-round">
            <i class="material-icons">add_circle_outline</i> Adicionar
        </a>
    </div>
</section>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="title text-center">@yield('titulo')</h3>
        <br>
    </div>
    @foreach($experiencias as $experiencia)
    <div class="col-md-6">
        
        <div class="card card-testimonial">
            <div class="card-actions">
                <a href="{{ url('admin/experiencia/editar/'.$experiencia->id) }}">
                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Editar">
                        <i class="material-icons">edit</i>
                    </button>
                </a>
                <a href="{{ url('/admin/experiencia/excluir/'.$experiencia->id) }}">
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
                    {!! $experiencia->descricao !!}
                </h5>
            </div>
            <div class="footer">
                <h4 class="card-title">{{$experiencia->nome}}</h4>
                <h6 class="category">{{$experiencia->periodo}}</h6>
                <h6 class="category">{{$experiencia->cargo}}</h6>
                <div class="card-avatar">
                    <img class="img" src="{{asset('experiencia/'.$experiencia->imagem)}}" />
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection