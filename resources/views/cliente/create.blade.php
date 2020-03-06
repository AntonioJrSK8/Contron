@extends('layouts.dashboard')

@section('content')

    @include('includes.form-erros')

    <form method="POST" action="/cliente/store">
        @csrf
        <div class="form-group">

            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <label for="nome">Nome da Empresa</label>
            <input type="text" class="form-control" id="nome" name="nome">

            <label for="nome_fantasia">Nome Fantasia da Empresa</label>
            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia">

        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
