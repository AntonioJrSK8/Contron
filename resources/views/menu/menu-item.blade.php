@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>

    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">

        <a href="{{ route("menu.edit", ['menu' => $item["id"]]) }}" class="edit-menu">
            {{$item["titulo"] . " | Url -> " . $item["url"]}}
            | Icon->
            <i style="font-size:15px;" class="{{isset($item["icono"]) ? $item["icono"] : ""}}"></i> |
            Editar
            <input type="hidden" value="{{$item["id"]}}" name="id">
        </a>

        <a href="{{route('menu.destroy', ['menu' => $item["id"]])}}" class="eliminar-menu pull-right tooltipsC" title="Deletar">
            <i class="text-danger fa fa-trash-o" aria-hidden="true"></i>
            Deletar
        </a>

    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>

    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">

        <a href="{{route('menu.edit', ['menu' => $item["id"]])}}" class="edit-menu">
            {{ $item["titulo"] . " | Url -> " . $item["url"]}}
            | Icon ->
            <i style="font-size:15px;" class="{{isset($item["icono"]) ? $item["icono"] : ""}}"></i> |
            Editar
            <input type="hidden" value="{{$item["id"]}}" name="id">
        </a>

        <a href="{{route('menu.destroy', ['menu' => $item["id"]])}}" class="eliminar-menu pull-right tooltipsC"
            title="Deletar">
            <i class="text-danger fa fa-trash-o" aria-hidden="true"></i>
            Deletar
        </a>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("menu.menu-item",[ "item" => $submenu ])
        @endforeach
    </ol>
</li>
@endif
