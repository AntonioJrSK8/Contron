@extends('layouts.dashboard')

@section('content')
    <h3>Novo cliente</h3>
    <h4>{{$pessoaType == \App\Pessoa::TYPE_INDIVIDUAL? 'Pessoa Física': 'Pessoa Jurídica'}}</h4>
    <a href="{{route('pessoas.create',['pessoa_type' => \App\Pessoa::TYPE_INDIVIDUAL])}}">Pessoa Física</a> |
    <a href="{{route('pessoas.create',['pessoa_type' => \App\Pessoa::TYPE_LEGAL])}}">Pessoa Jurídica</a>
    @include('form._form_errors')
    <!--<form method="post" action="{{ route('pessoas.store') }}">-->
    {{ Form::open(['route' => 'pessoas.store']) }}
        @include('pessoas._form')
        <button type="submit" class="btn btn-default">Criar</button>
    {{ Form::close() }}
@endsection
