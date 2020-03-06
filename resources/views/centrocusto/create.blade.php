@extends('layouts.dashboard')

@section('content')

    @include('includes.form-erros')

    <form method="POST" action="/centrodecusto/store">
        @csrf
        <div class="form-group">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <label for="descricao">Descrição Centro de Custo</label>
            <input type="text" class="form-control" id="descricao" name="descricao">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
