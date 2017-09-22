@extends('admin.layout.master')

@section('titulo', isset($portifolio->id) ? 'Editar' : 'Criar')
@section('conteudo')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Portifolio</h4>
                    <form method="post" action="{{env('PREFIX_ADMIN').'/portifolio/criar' }}" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @if(isset($errors) && count($errors) > 0)
                            <div>
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                            </div>
                        @endif
                        {!! csrf_field() !!}
                        <input hidden  name="id" value="{{ old('id',  isset($portifolio->id) ? $portifolio->id : null) }}">
                        <div class="form-group label-floating">
                            <label class="control-label">Nome</label>
                            <input type="text" class="form-control" name="nome" value="{{ old('nome',  isset($portifolio->nome) ? $portifolio->nome : null) }}">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Descrição</label>
                            <textarea rows="4" cols="50" type="text" class="form-control" name="descricao">{{ old('descricao',  isset($portifolio->descricao) ? $portifolio->descricao : null) }}</textarea>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">URL</label>
                            <input type="text" class="form-control" name="url" value="{{ old('url',  isset($portifolio->url) ? $portifolio->url : null) }}">
                        </div>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                @if( isset($portifolio->imagem) )
                                    <img class="" src="{{asset('portifolio/'.$portifolio->imagem)}}">
                                @else
                                    <img class="" src="{{asset('img/placeholder.jpg')}}">
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                <span class="btn btn-rose btn-round btn-file">
                                    <span class="fileinput-new">Selecione uma imagem</span>
                                    <span class="fileinput-exists">Trocar</span>
                                    <input type="file" name="imagem" />
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-xs-12 text-right">
                                <button type="submit" class="btn btn-fill btn-rose">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection