<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
      
      $products = Produto::get();
	    return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
       
        $precoFromated = explode("R$ ", $data['preco']);
        $precoFromated = str_replace(',','.',end($precoFromated));
        
        try{
            $produto = Produto::insert([
                'codigo' => $data['codigo']
                ,'nome' => $data['nome'] 
                ,'tipo' => $data['tipo'] 
                ,'info' => $data['tipo'] == 'bebida' ? $data['fornecedor'] : $data['ingredientes'] 
                ,'foto' => $data['image']
                ,'preco' =>  $precoFromated
                ,'status' => false
            ]);

        }catch (Exception $e){
            return back()->withErrors([
                'nome' => 'Dados incorrentos'
            ])->withInput(\request(['nome']));
        };

        return redirect()->route('adm_index');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product = Produto::where('codigo', $id)->first();
       
        return view('admin/editProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
       
        $precoFromated = explode("R$ ", $data['preco']);
        $precoFromated = str_replace(',','.',end($precoFromated));
      
        if($data['image'] != null){
            $status = Produto::where('codigo', $cod)
            ->update([
                "foto" => $data['image']
            ]);
        } 
        $status = Produto::where('codigo', $data['codigo'])
        ->update([
            "nome" => $data['nome']
            ,"tipo" => $data['tipo']
            ,"codigo" => $data['codigo']
            ,"info" =>  $data['tipo'] == 'Comida' ? $data['ingredientes'] :$data['fornecedor']
            ,"preco" => $precoFromated
        ]);
       

        return redirect()->route('adm_index');
    }

    public function block(Request $request){
      $id = $request->all()['id'];
        
      $status = Produto::toogleStatus($id);
      
      return $status;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
