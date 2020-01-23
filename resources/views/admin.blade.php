@extends('adminlte::page')
@section ('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
   
@stop
@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <table id="table_id" class=" table table-bordered table table-hover ">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr>
        </tbody>
    </table> 

    <div class="small-box bg-success col-md-4">
        <div class="inner">
            <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">53 </font></font><sup style="font-size: 20px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">%</font></font></sup></h3>

            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Taxa de rejeição</font></font></p>
        </div>
        <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
        </div>
            <a href="#" class="small-box-footer"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mais informações </font></font><i class="fas fa-arrow-circle-right"></i></a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); 
    $(document).ready( function () {
        $('#table_id').DataTable({
            "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
        });
    } );
</script>
@stop