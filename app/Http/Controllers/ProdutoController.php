<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
class ProdutoController extends Controller
{
    private $produto;
    public function __construct(Produto $produto){
        $this->produto=$produto;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $produtos= $this->produto::where('user_id',$id)->orderby('created_at','desc')->get();
        return  view('listarProdutos',compact('produtos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return  view('cadastrarProduto');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
            $validator = Validator::make($request->all(), [
                'nome' => 'required|unique:produtos|min:3|max:50',
                'valor' => 'required',
                'descricao'=>'min:5|max:40',
                'qtd'=>'required'
            ]);
            if ($validator->fails()) {
                return redirect('cadastrar/create')
                            ->withErrors($validator)
                            ->withInput();
            }else{
            $id=Auth::user()->id;
            $dados=$request->except('_token');
            
            $status=$this->produto->create($dados);
            
            if($status){
                 return redirect()->route('cadastrar.index');
              }
            }
        /*
      
            
        if ($validator->fails()) {
            return redirect('cadastrar/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $id=Auth::user()->id;
            $dados=$request->except('_token');
            
            $status=$this->produto->create($dados);
            
            if($status){
               echo "ok";// return redirect()->route('cadastrar.index');
             }
        }

      */
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          
        $dados=$this->produto->find($id);
        return  view('confirmaExcluirProduto',compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto= $this->produto->find($id);
        return  view('cadastrarProduto',compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|min:3|max:50',
            'valor' => 'required',
            'descricao'=>'min:5|max:40',
            'qtd'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('cadastrar/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }else{   
            $dados=$request->all();
            $produto=$this->produto->find($id);
            $status=$produto->update($dados);
            if($status){
            return redirect()->route('cadastrar.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados=$this->produto->find($id);
        $status=$dados->delete();
        if($status){
            return redirect()->route('cadastrar.index');
        }else{
            return "sory";//return redirect().route('cadastrar.show',$id)->with(['errors'=>'falha ao editar']);
        }
    }
}
