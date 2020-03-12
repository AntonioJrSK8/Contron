@extends('layouts.dashboard')

@section('content')
    <h3>Ver pessoa</h3>
    <a class="btn btn-primary" href="{{ route('pessoas.edit',['pessoa' => $pessoa->id]) }}">Editar</a>
    <a class="btn btn-danger" href="{{ route('pessoas.destroy',['pessoa' => $pessoa->id]) }}"
        onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">Excluir</a>
    <!--<form id="form-delete"style="display: none" action="{{ route('pessoas.destroy',['pessoa' => $pessoa->id]) }}" method="post">-->
    {{Form::open(['route' => ['pessoas.destroy',$pessoa->id],'method' => 'DELETE', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <br/><br/>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{$pessoa->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$pessoa->name}}</td>
        </tr>
        <tr>
            <th scope="row">Documento</th>
            <td>{{$pessoa->document_number_formatted}}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{$pessoa->email}}</td>
        </tr>
        <tr>
            <th scope="row">Telefone</th>
            <td>{{$pessoa->phone}}</td>
        </tr>
        <tr>
            <th scope="row">Estado Civil</th>
            <td>
                @switch($pessoa->marital_status)
                    @case(1)
                        Solteiro
                        @break

                    @case(2)
                        Casado
                        @break

                    @case(3)
                        Divorciado
                        @break
                @endswitch
            </td>
        </tr>
        <tr>
            <th scope="row">Data Nasc.</th>
            <td>{{$pessoa->date_birth_formatted}}</td>
        </tr>
        <tr>
            <th scope="row">Sexo</th>
            <td>{{$pessoa->sex}}{{$pessoa->sex_formatted }}</td>
        </tr>
        <tr>
            <th scope="row">Def. Física</th>
            <td>{{$pessoa->def_fisica}}</td>
        </tr>
        <tr>
            <th scope="row">Inadimplente</th>
            <td>{{$pessoa->defaulter?'Sim': 'Não'}}</td>
        </tr>
        </tbody>
    </table>
@endsection
