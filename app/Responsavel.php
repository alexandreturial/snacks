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
        'id_usuario',
    ];
    public $timestamps = false;

    static function getResponsibleByname(String $name){
        $responsavel = Responsavel::join(
            'usuarios', 
            'usuarios.idResponsavel', 
            'responsavel.id')->where('nome', 'LIKE', '%' . $name . '%')->get();
        
        return $responsavel;
    }

    static function getAllResponsible(){
        $responsavel = Responsavel::join(
            'usuarios', 
            'usuarios.idResponsavel', 
            'responsavel.id')->get();
            
        return $responsavel;
    }
}
