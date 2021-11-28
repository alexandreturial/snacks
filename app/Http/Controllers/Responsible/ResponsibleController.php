<?php

namespace App\Http\Controllers\Responsible;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aluno;
use App\Consumo;
use App\Produto;
use App\ResponsavelConsumoAluno;
use App\Responsavel;

class ResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session()->all()['id'];
        $responsavel = Responsavel::getResponsibleById( $id);
        
        $alunos =Aluno::getStudentsByResponsible($responsavel->id);
       
        return view('responsible.student', compact('alunos'));
    }

    public function searchStudent(Request $request){
        
        $search = $request->all();
        $id = session()->all()['id'];
        $responsavel = Responsavel::getResponsibleById($id);

        if(strlen($search['search']) >= 3){
            $student = Aluno::getStudentsBynameAndResponsible($search['search'], $responsavel->id);
        }else{
            $student = Aluno::getStudentsByResponsible($responsavel->id);
        }

        return $student;
    }

    public function searchProduct(Request $request){
        
        $search = $request->all();
       
        if(strlen($search['search']) >= 3){
            $produtos = Produto::getProductsByNameAndUnlockToStudent($search['search'], $search['idAluno']);
        }else{
            
            $produtos = Produto::getProductsUnlockToStudent(intval($search['idAluno']));
        }

        return $produtos;
    }

    public function block(Request $request){
        
        $data = $request->all();
        $id = session()->all()['id'];

        $responsavel = Responsavel::getResponsibleById( $id);
        $data['idResponsavel'] = $responsavel->id;
        
        return ResponsavelConsumoAluno::toogleProduct($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $data = $request->all();
        $id = session()->all()['id'];
        $responsavel = Responsavel::getResponsibleById($id);
        $data['idResponsavel'] = $responsavel->id;

        $created =Aluno::createStudent($data);

        return $created ? 
        redirect()->route('resp_student')
        : 
        back()->withErrors([
            'email' => 'Erro ao cadastrar Aluno'
        ])->withInput(\request(['email']));
        
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
        
        $aluno =Aluno::getStudentByRegistration($id);
        
        $produtos = Produto::getProductsToStudent($aluno->id);
        
        return view('responsible/detail', compact('aluno', 'produtos'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $aluno =Aluno::getStudentByRegistration($id);
        return view('responsible/student_edit', compact('aluno'));
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
        $data = $request->all();
       
        $updated = Aluno::updateUserByRegistration($data, $id);
        
        return $updated ? 
        Redirect()->route('resp_detail', $id) 
        : 
        back()->withErrors([
            'email' => 'email ou senha errados'
        ])->withInput(\request(['email']));
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

    public function extract($idAluno){
        $aluno = Aluno::getStudentByRegistration($idAluno);
        $deposito = Aluno::getExtact(intval($idAluno));
        
        return view('responsible/extract', compact('deposito', 'aluno'));
    }
    
    public function extractByDate(Request $request){
        
        $dates = $request->all();
        if($dates['initDate'] != "" && $dates['finalDate'] != ""){
            $extrato = Aluno::getExtactByDate(intval($dates['id']), $dates['initDate'], $dates['finalDate']);

        }else{
            $extrato = Aluno::getExtact(intval($dates['id']));
        }
        
        return $extrato;
    }

    public function depoistyView($id){
        $aluno = Aluno::getStudentByRegistration($id);
        return view('responsible/deposit', compact('aluno'));
    }

    public function depoisty(Request $resquest){
       
        $data = $resquest->all();
        $oldbalance = Aluno::getStudentByRegistration($data['id'])->saldo;
        
        $precoFromated = explode("R$ ", $data['preco']);
        $data['valor'] = str_replace(',','.',end($precoFromated));
        $data['saldo'] = floatval($data['valor']) + $oldbalance;

       
        
        $id = session()->all()['id'];
        $responsavel = Responsavel::getResponsibleById( $id);

        $updated = Aluno::updateUserBalance($data, $responsavel->id);

        return $updated ? 
        Redirect()->route('resp_detail', $data['id']) 
        : 
        back()->withErrors([
            'preco' => 'Erro ao realizar deposito'
        ])->withInput(\request(['preco']));
    }

    public function consumption($id){
       
        $produtos = Consumo::getStudnetConsumptionByRegistration($id);
        $aluno = Aluno::getStudentByRegistration($id);
        return view('responsible/consumption', compact('produtos', 'aluno'));
    }

    public function consumptionByDate(Request $request){
        $dates = $request->all();

        if($dates['initDate'] != "" && $dates['finalDate'] != ""){
            $produtos = Consumo::getStudnetConsumptionByRegistrationByDate( $dates['id'],  $dates['initDate'],  $dates['finalDate']);
        }else{
            $produtos = Consumo::getStudnetConsumptionByRegistration( $dates['id']); 
        }
        return $produtos;
    }
}
