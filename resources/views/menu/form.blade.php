{{--  <input type="hidden" value="{{ $menu->id ?? '' }}" name="id"> --}}    {{--  {{old(titulo, $menu->titulo ?? '') }}  --}}
<div class="form-group">
    <label for="titulo" class="col-lg-3 control-label requerido">titulo</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $menu->titulo ?? '' }}" required>
    </div>
</div>

<div class="form-group">
    <label for="url" class="col-lg-3 control-label requerido">url</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="url" name="url" value="{{ $menu->url ?? '' }}" required>
    </div>
</div>

<div class="form-group">
    <label for="icono" class="col-lg-3 control-label">icono</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="icono" name="icono" value="{{ $menu->icono ?? '' }}">
    </div>
    <div class="col-lg-1">
        <span id="mostrar-icono" class="fa fa-fw {{ $menu->icono ?? ''}}"> </span>
    </div>
</div>

