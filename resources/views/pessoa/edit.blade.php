@extends('layouts.dashboard')

@section('content')
    <h3>Editar pessoa</h3>

    @include('includes._form_errors')


    {{ Form::model($pessoa, ['route' => ['pessoas.update', $pessoa->id ], 'method' => 'PUT' ]) }}

    {{ Form::token()  }}
        @include('pessoa._form')

    <button type="submit" class="btn btn-default btn-primary">Salvar</button>

    {{ Form::close() }}

@endsection
