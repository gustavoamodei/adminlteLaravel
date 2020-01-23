@extends('adminlte::page')

@section ('title', 'Listar Produtos')
@section('content_header')
    <h1 class=" d-flex justify-content-center">Listar Produtos</h1>
   
@stop
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                    
                    

                <a href="{{route('cadastrar.create')}}" class="btn btn-success btn btn-md">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"> Novo Produto </span> 
                </a>

                <br><br>
                    <table id="table_id" class="table table table-bordered table-hover table-sm table-md">
                        <thead>
                            <tr>
                            <th scope="col" >Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Qtd</th>
                            <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            
                            @foreach($produtos as $produto)
                            <th scope="row">{{$produto->id}}</th>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->valor}}</td>
                            <td>{{$produto->qtd}}</td>
                            
                            <td>
                                <a href="{{route('cadastrar.edit',$produto->id)}}" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true">    Editar</span>
                                </a>     
                                <a href="{{route('cadastrar.show',$produto->id)}}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true">  Excluir</span>
                                </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>       
                
        
        </div>
    </div>
</div>
@endsection

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
