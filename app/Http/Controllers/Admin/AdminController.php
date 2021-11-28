<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\User;
use App\Produto;
use App\Responsavel;
use App\Aluno;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $produtos = ProductController::index();
       
        return view('admin.index', compact('produtos'));
    }

    public function responsible(){
        

        $responsavel = Responsavel::getAllResponsible();

        return view('admin.responsible', compact('responsavel'));
 
    }

    public function student(){
        
        $aluno = Aluno::getAllStudents();
        return view('admin.student', compact('aluno'));
 
    }

    public function search(Request $value)
    {   
        $search = $value->all();
        
        $produtos = Produto::getProductByname($search['search']);
        
        return $produtos;
    }

    public function searchResp(Request $value)
    {
        $search = $value->all();
        
        if(strlen($search['search']) >= 3){
            $responsavel =Responsavel::getResponsibleByname($search['search']);
        }else{
            $responsavel = Responsavel::getAllResponsible();
        }

        
        return $responsavel;

    }

    public function searchStudent(Request $value)
    {
        $search = $value->all();
        
        if(strlen($search['search']) >= 3){
            $student = Aluno::getStudentsByname($search['search']);
        }else{
            $student = Aluno::getAllStudents();
        }

        return $student;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createResponsible(Request $value)
    {
       
        $data = $value->all();
        
        try{
            $user = User::insertGetId([
                'login' => $data['login']
                ,'senha' =>  Hash::make($data['password'])
                ,'idEscola' => 1
                ,'type' => 2
            ]);


            $idResponsavel = Responsavel::insertGetId([
                'cpf' => $data['cpf']
                ,'nome' => $data['name'] 
                ,'telefone' => $data['phone'] 
                ,'email' => $data['email']
                ,'idUsuario' => $user
            ]);
            
            
        }catch (Exception $e){
            return back()->withErrors([
                'nome' => 'Dados incorrentos'
            ])->withInput(\request(['nome']));
        };

        return redirect()->route('adm_responsible'); 
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
        //
    }
    public function showResponsible($id)
    {
        //dd($id);
        $responsavel = Responsavel::where('id', $id)->join(
            'usuarios', 
            'usuarios.id', 
            'responsavel.idUsuario')->first();

        return view('admin.editResponsible', compact('responsavel'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function updateResponsible(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
       
        
       try {
            $status = Responsavel::where('id', $data['id'])
            ->update([
                "nome" => $data['nome']
                ,"email" => $data['email']
                ,"telefone" => $data['telefone']
                ,"cpf" =>  $data['CPF']
            ]);
            

            if($data['login'] != null){
                User::where('idResponsavel', $data['id'])
                ->update([
                    "login" => $data['login']
                ]);
            }
            if($data['senha'] != null){
                User::where('idResponsavel', $data['id'])
                ->update([
                    "senha" => $data['senha']
                ]);
            }
       } catch (\Throwable $e) {
        return back()->withErrors([
            'nome' => 'Dados incorrentos'
        ])->withInput(\request(['nome']));
       }
       
        return view('admin.adm_responsible');
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
    public function destroyResponsible($id)
    {
        
        try{

            $idUsuario = Responsavel::where('id', $id)->first();

            $produto = User::where('codUsuario', $idUsuario->idUsuario)->delete();

            $idResponsavel = Responsavel::where('id', $id)->delete();
            

        }catch (Exception $e){
            return back()->withErrors([
                'nome' => 'Dados incorrentos'
            ])->withInput(\request(['nome']));
        };
        return redirect()->route('adm_responsible');
    }
}
