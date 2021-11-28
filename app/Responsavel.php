<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $table = 'responsavel';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'nome', 
        'cpf', 
        'telefone',
        'email',
        'idUsuario'
       
    ];
    public $timestamps = false;

    static function getResponsibleByname(String $name){
        $responsavel = Responsavel::join(
            'usuarios', 
            'usuarios.codUsuario', 
            'responsavel.idUsuario')->where('nome', 'LIKE', '%' . $name . '%')->get();
        
        return $responsavel;
    }

    static function getAllResponsible(){
        $responsavel = Responsavel::join(
            'usuarios', 
            'usuarios.codUsuario', 
            'responsavel.idUsuario')->get();
            
        return $responsavel;
    }

    static function getResponsibleById(int $id){
        return Responsavel::join(
            'usuarios', 
            'usuarios.codUsuario', 
            'responsavel.idUsuario')->where('codUsuario', $id)->first();
    }
}
