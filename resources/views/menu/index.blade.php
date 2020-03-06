@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-lg-12">

        @include('includes.mensagem')

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Menus</h3>
                <div class="box-tools pull-right">
                    <a href="{{route('menu.create')}}" class="btn btn-success btn-sm">Criar Menu</a>
                </div>
            </div>

            <div class="box-body">
                @csrf
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach ($menus as $key => $item)
                            @if ($item["menu_id"] != 0)
                                @break
                            @endif
                            @include("menu.menu-item",["item" => $item])
                        @endforeach
                    </ol>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
