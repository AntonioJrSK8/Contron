@extends('layouts.dashboard')

@section('content')

<h3>Listagem de pessoas - {{ Session::get('chave') }} </h3>
<br/><br/>
@include('includes.mensagem')
</br>
<a class="btn btn-default" href="{{ route('pessoas.create') }}">Criar novo</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CNPJ/CPF</th>
            <th>Data Nasc.</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pessoas as $pessoa)
        <tr>
            <td>{{ $pessoa->id ?? '' }}</td>
            <td>{{ $pessoa->nome ?? '' }}</td>
            <td>{{ $pessoa->documento_numero_formatted ?? ''}}</td>
            <td>{{ $pessoa->data_nascimento_formatted ?? ''}}</td>
            <td>{{ $pessoa->email ?? ''}}</td>
            <td>{{ $pessoa->fone ?? ''}}</td>
            <td>{{ $pessoa->sexo ?? ''}}</td>
            <td>
                <a href="{{route('pessoas.edit',['pessoa' => $pessoa->id])}}">Editar</a> |
                <a href="{{route('pessoas.show',['pessoa' => $pessoa->id])}}">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$pessoas->links()}}
@endsection
