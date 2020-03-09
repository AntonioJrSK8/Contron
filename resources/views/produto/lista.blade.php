@extends('layouts.dashboard')

@section('content')
    <div id="demo_info"></div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="btnnovo" href="#">Novo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btneditar" href="#">Editar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnexcluir" href="#">Excluir</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Anexo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" id="btnanexocaction" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Processos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" id="btnprocaction" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <table id="TProduto" class="display" style="width:100%">
        <thead>
            <tr>
                <th style="width: 1px"></th>
                <th style="width: 20%">Id</th>
                <th>Descrição</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Id</th>
                <th>Descrição</th>
                <th style="width: 5%"></th>
                <th style="width: 5%"></th>
                <th style="width: 5%"></th>
            </tr>
        </tfoot>
    </table>

@endsection

@section('js')

    var eventFired = function ( type ) {
        var n = $('#demo_info')[0];
        n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
        n.scrollTop = n.scrollHeight;
    }

    let TProduto =
        $('#TProduto')
            .DataTable({
                processing: true,
                serverSide: false,
                responsive: false,
                ordering: true,
                select: true,
                //"scrollY": "200px",
                paging: true,
                search: false,
                ajax: '{{ url("api/produto") }}',
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#">'+ data +'</a>';
                        },
                        "targets": 1,
                        "visible": false
                    },{
                        "render": function ( data, type, row ) {
                            return data +' <b>('+ row['id'] +') </b>';
                        },
                        "targets": 2,
                        "visible": true
                    }
                ],
                columns: [
                    {
                        className: 'check-circle',
                        orderable: false,
                        data: null,
                        defaultContent: ''
                    },
                    {data: 'id'},
                    {data: 'descricao'},
                    {
                        className: 'edit',
                        orderable: false,
                        data: null,
                        defaultContent: ''
                    }, {
                        className: 'view',
                        orderable: false,
                        data: null,
                        defaultContent: ''
                    }, {
                        className: 'delete',
                        orderable: false,
                        data: null,
                        defaultContent: ''
                    }
                ],

                language: {
                    url: 'br.json'  // caminho: public/vendor/datatables/br.json
                }

        });
        //.on( 'order.dt', function () { eventFired( 'Order' ); } )
        //.on( 'search.dt', function () { eventFired( 'Search' ); } )
        //.on( 'page.dt', function () { eventFired( 'Page' ); } );

        //seleção de linha na dataTable
        $('#TProduto tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('selected');
            var data = TProduto.row(this).data();
                console.log(data['descricao']);
        } );

        //Consulta no Rodapé
        $('#TProduto tfoot th').each( function () {
            var title = $(this).text();
            if(title!='')
                $(this).html( '<input type="text" placeholder="Pesquisar '+title+'" />' );
        } );
        TProduto.columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                    that
                    .search( this.value )
                    .draw();
                }
            });
        });

        //Metodos dos botões
        $('#btnnovo').click( function () {
            var data = TProduto.rows('.selected').data();
            window.open('/produto/create', '_self');
        });

        $('#btneditar').click( function () {
            var data = TProduto.rows('.selected').data();
            if(data.length>0){
                window.open('/produto/'+data[0]['id']+'/edit','_self');
            }
            else alert('Favor selecionar o registro');
        } );

        $('#btnexcluir').click( function () {
            var data = TProduto.rows('.selected').data();
            if(data.length>0)
                alert( data[0]['id'] + ' row(s) selected')
            else alert('Favor selecionar o registro');
        } );

        $('#btnanexocaction').click( function(){
            var data = TProduto.rows('.selected').data()
                for(i=0;i<data.length;i++)
                    alert('Registro Selecionado: ' + data[i]['id']);
        });

        $('#btnprocaction').click( function(){
            var data = TProduto.rows('.selected').data()
                for(i=0;i<data.length;i++)
                    alert('Registro Selecionado: ' + data[i]['id']);
        });

        //METODOS DOS BOTÕES NA GRID
        $('#TProduto tbody').on( 'click', 'tr td.edit', function () {
            var data = TCentroCusto.row(this).data();
            if(data['id'].length>0) {
                window.open('/produto/'+data['id']+'/edit','_self');
            }

        });

        $('#TProduto tbody').on( 'click', 'tr td.view', function () {
            alert('view');
        });

        $('#TProduto tbody').on( 'click', 'tr td.delete', function () {

            var linha = TCentroCusto.row(this);
            var data = linha.data();

            bootbox.confirm("Confirmar exclusão do registro !", function(result){
                if(result){

                    if(data['id'].length>0){

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "DELETE",
                            url: '/produto',
                            data: { 'id': data.id },

                            success: function(st) {

                                bootbox.alert({
                                    message: st.message,
                                    size: 'small'
                                });

                                if(st.status === true){
                                    linha.remove()
                                    TCentroCusto.draw()
                                }

                            }
                        });


                    }
                }

            });

        });

@endsection
