<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricula', 
        'nome', 
        'email', 
        'senha',
        'turma',
        'turno',
        'telefone',
        'saldo'
    ];
    public $timestamps = false;

    static function getAllStudents(){
        $responsavel = Aluno::join(
            'usuarios', 
            'usuarios.idAluno', 
            'aluno.matricula')->get();
            
        return $responsavel;
    }

    static function getStudentsByname(String $name){
        $responsavel = Aluno::join(
            'usuarios', 
            'usuarios.idAluno', 
            'aluno.matricula')->where('nome', 'LIKE', '%' . $name . '%')->get();
        
        return $responsavel;
    }
}
