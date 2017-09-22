@extends('admin.layout.master')

@section('titulo', isset($header->id) ? 'Editar' : 'Criar')
@section('conteudo')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Header</h4>
                    <form method="post" action="{{env('PREFIX_ADMIN').'/header/criar' }}" >
                        {!! csrf_field() !!}
                        <input hidden  name="id" value="{{ old('id',  isset($header->id) ? $header->id : null) }}">
                        <div class="form-group label-floating">
                            <label class="control-label">Título</label>
                            <input type="text" class="form-control" name="titulo" value="{{ old('titulo',  isset($header->titulo) ? $header->titulo : null) }}">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Subtítulo</label>
                            <input type="text" class="form-control" name="subtitulo" value="{{ old('subtitulo',  isset($header->subtitulo) ? $header->subtitulo : null) }}">
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection