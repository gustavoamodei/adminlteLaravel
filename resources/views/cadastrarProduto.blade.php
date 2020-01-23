@extends('adminlte::page')
@section ('title', 'Dashboard')
@section('content_header')
    
   
@stop
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mr-5">
        <div class="col-md-8 col-md-offset-2">
           
            @if(isset($produto))
            <h1 class="mr-5 d-flex justify-content-center"> Editar Produtos</h1>
            @else
            <h1 class="mr-5 d-flex justify-content-center"> Cadastrar Produtos</h1>
            @endif
                
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
            @endif 
            
  @if(isset($produto))

<form  method="POST" action="{{route('cadastrar.update',$produto->id)}}">
    <input name="_method" type="hidden" value="PUT">
    {{ csrf_field() }}
    <div class="row d-flex justify-content-center">

        <div class="col-sm-10 col-md-10 col-md-offset-1 ">
            <label>Produto</label>
                <input type="text" class="form-control" name="nome" value="{{$produto->nome}}" placeholder="Nome do produto">
            <label>Valor</label>
                <input type="text" class="form-control" name="valor" value="{{$produto->valor}}">
            <label>Quantidade</label>
                <input type="number" class="form-control" value="{{$produto->qtd}}" name="qtd" min="1" max="10000">
            <div class="form-group">
                <label>Descrição</label>
                <textarea class="form-control"  rows="3" name="descricao">{{$produto->descricao}}</textarea>
            </div>
            <br>
        
            <input type="submit" value="Editar" class="form-control btn btn-primary">
        </div>
    </div>
    
</form>
    
    @else
<form  method="POST" action="{{route('cadastrar.store')}}">
{{ csrf_field() }}
    <div class="row">
    
        <div class="col-sm-10 col-md-10 col-md-offset-1 ">
                
                <label>Produto</label>
                    <input type="text" class="form-control" name="nome" value="{{old('nome')}}" placeholder="Nome do produto">
                <label>Valor</label>
                    <input type="text" class="form-control" name="valor" value="{{old('valor')}}">
                <label>Quantidade</label>
                    <input type="number" class="form-control" value="{{old('qtd', '1')}}" name="qtd" min="1" max="10000">
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control"  rows="3" name="descricao">{{old('descricao')}}</textarea>
                </div>
                <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                <br>
                <input type="submit" value="Cadastrar" class="form-control btn btn-primary">
        
        </div>
    </div>
        
</form>
    @endif
           
       
            <br>        
                
            
        </div>
    </div>
</div>
@endsection
