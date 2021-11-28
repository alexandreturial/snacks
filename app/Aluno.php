<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Deposito;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use DateTime;

class Aluno extends Model
{
    protected $table = 'aluno';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'matricula', 
        'nome', 
        'email', 
        'senha',
        'turma',
        'turno',
        'telefone',
        'saldo',
        'idUsuario',
        'idResponsavel'
    ];

    public $timestamps = false;

    static function getAllStudents(){
        $responsavel = Aluno::join(
            'usuarios', 
            'usuarios.codUsuario', 
            'aluno.idUsuario')->get();
            
        return $responsavel;
    }

    static function getStudentsByname(String $name){
        $responsavel = Aluno::join(
            'usuarios', 
            'usuarios.codUsuario', 
            'aluno.idUsuario')->where('nome', 'LIKE', '%' . $name . '%')->get();
        
        return $responsavel;
    }

    static function getStudentsBynameAndResponsible(String $name, int $id){
        
        $responsavel = Aluno::join(
            'usuarios', 
            'usuarios.codUsuario', 
            'aluno.idUsuario'
            )->where([
                ['aluno.nome', 'LIKE', '%' . $name . '%',],
                ['aluno.idResponsavel', '=', $id]
            ])->get();
        
        return $responsavel;
    }

    static function getStudentById(int $id){
        $saldo = Aluno::join(
            'usuarios', 
            'usuarios.codUsuario', 
            'aluno.idUsuario')
            ->where('usuarios.codUsuario', $id)
            ->select('aluno.saldo', 'aluno.id','aluno.matricula')
            ->first();
        
        return $saldo;
    }

    static function getStudentByRegistration(int $id){
        return Aluno::where('aluno.id', $id)->first();
    }

    static function discountBalance(int $id, float $newBalance){
        
        $saldo = Aluno::
            where('aluno.id', $id)
            ->update([
                "saldo" => $newBalance
            ]);
            
        return $saldo;
    }

    static function getExtact(int $id){
        
        $saldo = Aluno::join(
            'deposito', 
            'deposito.idAluno', 
            'aluno.id')
            ->where('aluno.id', '=', $id)
            ->select('deposito.valor', 'deposito.datahora')
            ->orderBy('deposito.datahora', 'desc')
            ->get()
            ->groupBy(function ($item, $key) {
                $date = explode("-", $item['datahora']);
                $formateDate = $date[2]."/".$date[1]."/".$date[0];
                
                return $formateDate;
            });

        
        return $saldo;
    }

    static function getExtactByDate(int $id, String $initDate, String $finalDate){
        $saldo = Aluno::join(
            'deposito', 
            'deposito.idAluno', 
            'aluno.id')
            ->where([
                ['aluno.id', '=', $id],
                ["deposito.datahora", '>=', $initDate],
                ["deposito.datahora", '<=', $finalDate]
            ])
            ->select('deposito.valor', 'deposito.datahora')
            ->orderBy('deposito.datahora', 'desc')
            ->get()
            ->groupBy(function ($item, $key) {
                $date = explode("-", $item['datahora']);
                $formateDate = $date[2]."/".$date[1]."/".$date[0];
                
                return $formateDate;
            });
        
        
        return $saldo;
    }

    static function getStudentsByResponsible(int $id){
        $responsavel = Aluno::where('aluno.idResponsavel', $id)
            ->select('aluno.matricula', 'aluno.nome', 'aluno.id')
            ->get();
        
        return $responsavel;
    }

    static function updateUserByRegistration(Array $data, int $id){
        
        try {
            Aluno::where('id', $id)
            ->update([
                'matricula' => $data['matricula'],
                'nome' => $data['nome'],
                'email' => $data['email'],
                'turma' => $data['turma'],
                'turno' => $data['turno'],
                'telefone' => $data['telefone']
            ]);

            if($data['login'] != null || $data['login'] != ""){
                Aluno::join(
                    'usuarios', 
                    'usuarios.codUsuario', 
                    'aluno.idUsuario')
                ->where('aluno.id', $id)
                ->update([
                    'usuarios.login' => $data['login'],
                ]);
            }

            if($data['senha'] !=null || $data['senha'] != ""){
                Aluno::join(
                    'usuarios', 
                    'usuarios.codUsuario', 
                    'aluno.idUsuario')
                ->where('aluno.id', $id)
                ->update([
                    'usuarios.senha' => Hash::make($data['login']),
                ]);
            }

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    static function updateUserBalance(Array $data, int $idResponsavel){
        $date = new DateTime();
        try {
            Aluno::where('id',  $data['id'])
            ->update([
                'saldo' => $data['saldo'],
            ]);
            
           
            $tet = Deposito::insert([
                'idAluno' => intval($data['id']),
                'idResponsavel' => $idResponsavel,
                'datahora' => $date, 
                'valor' => $data['valor'] 
            ]);
           
            return true;
        } catch (\Throwable $th) {
            
            return false;
        }
    }

    static function createStudent(Array $data){
       
        
        try {
            $user = User::insertGetId([
                'login' => $data['login']
                ,'senha' =>  Hash::make($data['senha'])
                ,'idEscola' => 1
                ,'type' => 3
            ]);
           
            Aluno::insert([
                'matricula' => $data['matricula'], 
                'nome' => $data['nome'], 
                'email' => $data['email'], 
                'turma' => $data['turma'],
                'turno' => $data['turno'],
                'telefone' => $data['telefone'],
                'saldo' => 0,
                'idUsuario'=> $user,
                'idResponsavel' => $data['idResponsavel']
            ]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
