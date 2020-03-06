@extends('layouts.dashboard')

@section('content')

@if(session()->has('st'))
    @if(!session()->get('st')->status)
    <script>
        bootbox.alert({
                    message: "{{session()->get('st')->message}}",
                    size: 'small'
                });
    </script>
    @else
    <script>
        bootbox.alert({
                    message: "{{session()->get('st')->message}}",
                    size: 'small'
                });
    </script>
    @endif
@endif


{!! Form::open(['route' => ['cliente.update', $dados->id], 'method'=>'POST']) !!}

{!! Form::hidden('id', $dados->id) !!}

{!! Form::label('nome', 'Nome da Empresa') !!}
{!! Form::text('nome', $dados->nome, ['class'=>'form-control']) !!}

{!! Form::label('nome_fantasia', 'Nome de Fantasia') !!}
{!! Form::text('nome_fantasia', $dados->nome_fantasia, ['class'=>'form-control']) !!}
</br>
{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection
