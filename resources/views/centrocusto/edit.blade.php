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

<form method="POST" action="/centrodecusto/update">
    @csrf
    <div class="form-group">
        <input type="hidden" id="id" name="id" value="{{ $dados->id }}">
        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">

        <label for="descricao">Descrição Centro de Custo</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $dados->descricao }}">

    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

@endsection
