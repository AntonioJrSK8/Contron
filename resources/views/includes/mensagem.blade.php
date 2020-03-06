@if(session('mensagem'))
<div class="alert alert-success">
    <ul>
        <li>{{ session('mensagem') }}</li>
    </ul>
</div>
@endif
