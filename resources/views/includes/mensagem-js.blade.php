@if(session('mensagem'))
<script>
    bootbox.alert({
                message: "{{session('mensagem')}}",
                size: 'small'
            });
</script>
@endif
