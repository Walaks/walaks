@extends('admin.layout.master')

@section('titulo', isset($servico->id) ? 'Editar' : 'Criar')
@section('conteudo')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Serviços</h4>
                    <form method="post" action="{{env('PREFIX_ADMIN').'/servico/criar' }}" >
                        {!! csrf_field() !!}
                        <input hidden  name="id" value="{{ old('id',  isset($servico->id) ? $servico->id : null) }}">
                        <div class="form-group label-floating">
                            <label class="control-label">Título</label>
                            <input type="text" class="form-control" name="titulo" value="{{ old('titulo',  isset($servico->titulo) ? $servico->titulo : null) }}">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Descrição</label>
                            <textarea rows="4" cols="50" type="text" class="form-control" name="descricao">{{ old('descricao',  isset($servico->descricao) ? $servico->descricao : null) }}</textarea>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Icone</label>
                            <input type="text" class="form-control" name="icone" value="{{ old('icone',  isset($servico->icone) ? $servico->icone : null) }}">
                            <a target="_blank" href="http://fontawesome.io/icons/">Icones</a>
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection