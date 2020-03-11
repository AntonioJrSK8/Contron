<div class="form-group{{$errors->has($field)?' has-error' : ''}}">
    {{ $slot }}
    @include('includes._help_block', ['field' => $field])
</div>
