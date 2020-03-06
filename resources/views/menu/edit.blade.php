@extends('layouts.dashboard')

@section('content')

@include('includes.form-erros')
@include('includes.mensagem')

<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Horizontal Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(['route' => ['menu.update', $menu->id], 'method'=>'PUT', 'class'=>'form-horizontal']) !!}

        <div class="card-body">
            @include('menu.form')
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="reset" class="btn btn-default">Cancelar</button>
        </div>
    {!! Form::close() !!}
        <!-- /.card-footer -->
    </form>
</div>
@endsection
