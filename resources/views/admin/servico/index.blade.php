@extends('admin.layout.master')

@section('titulo', 'Serviços')
@section('conteudo')
<section class="title__page">
@if(count($servicos) < 3)
    <div class="title__page--right">
        <a href="{{ url('admin/servico/criar') }}" class="btn btn-primary btn-round">
            <i class="material-icons">add_circle_outline</i> Adicionar
        </a>
    </div>
@endif
</section>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="title text-center">@yield('titulo')</h3>
        <br />
        <div class="nav-center">
            <ul class="nav nav-pills nav-pills-warning nav-pills-icons" role="tablist">
                @foreach($servicos as $servico)
                    <li {{ $servicos[0]->id == $servico->id ? 'class=active' : '' }}>
                        <a href="#description-{{$servico->id}}" role="tab" data-toggle="tab">
                            <i class="material-icons">work</i> {{$servico->titulo}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <br>
            <br>
        </div>
        <div class="tab-content">
            @foreach($servicos as $servico)
                <div class="tab-pane {{ $servicos[0]->id == $servico->id ? 'active' : '' }}" id="description-{{$servico->id}}">
                    <div class="card">
                        <div class="card-actions">
                            <a href="{{ url('admin/servico/editar/'.$servico->id) }}">
                                <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Editar">
                                    <i class="material-icons">edit</i>
                                </button>
                            </a>
                            <a href="{{ url('/admin/servico/excluir/'.$servico->id) }}">
                                <button type="button" class="btn btn-danger btn-simple excluir{{$servico->id}}" rel="tooltip" data-placement="bottom" title="Remover">
                                    <i class="material-icons">close</i>
                                </button>
                            </a>
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">{{$servico->titulo}}</h4>
                            <p class="category">
                                {{$servico->icone}}
                            </p>
                        </div>
                        <div class="card-content">
                            {!!$servico->descricao!!}
                            <br />
                            <br />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection