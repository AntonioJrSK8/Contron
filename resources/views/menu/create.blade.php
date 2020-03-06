@extends('layouts.dashboard')

@section('content')

@include('includes.form-erros')
@include('includes.mensagem')
@include('includes.mensagem-js')

<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Horizontal Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('menu.store') }}" id="form-general" method="POST" class="form-horizontal" autocomplete="off">
        @csrf
        <div class="card-body">
            @include('menu.form')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="reset" class="btn btn-default">Cancelar</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@endsection
