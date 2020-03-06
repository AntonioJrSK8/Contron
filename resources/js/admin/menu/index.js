$(document).ready(function () {
    $('#nestable').nestable().on('change', function () {
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            type: 'POST',
            url: '/menu/guardar-ordem',
            dataType: 'JSON',
            data: data,
            success:function(request) {

                bootbox.alert({
                  message: request["mensagem"],
                  size: "small"
                });

            }
        });
    });

    //$('.edit-menu').on('click', function(event){
    //    event.preventDefault();
    //    const dados = {
    //        //menu: window.JSON.stringify($('#nestable').nestable('serialize')),
    //        menu: $(this).attr('href').split('/')[4],
    //        //_token: $('input[name=_token]').val()
    //    };
    //    console.log($(this).attr("href"));
    //    $.ajax({
    //        headers: {
    //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //        },
    //        type: 'GET',
    //        url: 'menu/{menu}/edit',
    //        dataType: 'JSON',
    //        data: dados,
    //        success: function (request) {
    //        }
    //    });
    //});

    $('.eliminar-menu').on('click', function(event){
        event.preventDefault();
        const url = $(this).attr('href');
            swal({
                title: 'Está seguro que desea deletar o registro ?',
                text: "Esta acción no se puede deshacer!",
                icon: 'warning',
                buttons: {
                    cancel: "Cancelar",
                    confirm: "Aceptar"
                },
            }).then((value) => {
                if (value) {
                    window.location.href = url;
                }
            });
    });

    $('#nestable').nestable('expandAll');
});
