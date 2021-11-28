<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;

use App\Aluno;
use App\Consumo;
use App\Produto;

use DateTime;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $aluno = Aluno::getStudentById(session()->all()['id']);
        $produtos = Produto::getProductsUnlockToStudent($aluno->id);
        
        return view('student/index', compact('produtos'));
    }

    public function buyProduct(Request $request)
    {
        $dataBuy = $request->all();

        $date = new DateTime();
        $idAluno = session()->all()['id'];

        $aluno = Aluno::getStudentById($idAluno);
        $discount = $aluno['saldo'] - $dataBuy['total'];
        if($aluno['saldo'] >= $dataBuy['total']){
            try {
            foreach($dataBuy['produtos'] as $produto){
               
                    Consumo::addProduct(
                        intval($aluno['id']), 
                        intval($produto['id']),
                        $date, 
                        intval($produto['qt']) 
                    );
              
            }
            
            Aluno::discountBalance(intval($aluno['id']), $discount);

            session([
                'saldo'=> $discount
            ]);
            
            } catch (\Throwable $th) {
                return false;
            }
            
        }

       
    }
    
    
    public function extract(){
        $idAluno = session()->all()['id'];
        $aluno = Aluno::getStudentById($idAluno);
       
        $deposito = Aluno::getExtact(intval($aluno['id']));
        
        return view('student/extract', compact('deposito', 'aluno'));
    }
    
    public function extractByDate(Request $request){
        $dates = $request->all();

        $idAluno = session()->all()['id'];
        $aluno = Aluno::getStudentById($idAluno);

        if($dates['initDate'] != "" && $dates['finalDate'] != ""){
            $extrato = Aluno::getExtactByDate(intval($aluno['id']), $dates['initDate'], $dates['finalDate']);

        }else{
            $extrato = Aluno::getExtact(intval($aluno['id']));
        }
        
        return $extrato;
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
