<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponsavelConsumoAluno extends Model
{
    protected $table = 'responsavel_bloqueio_produto';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'id', 
        'idResponsavel', 
        'idAluno', 
        'idProduto',
    ];

    public $timestamps = false;


    static function getProductByIdStudent(int $id){
        return ResponsavelConsumoAluno::where('idAluno', $id)->get();
    }

    static function toogleProduct(Array $data){
        
        
        if(ResponsavelConsumoAluno::where('idProduto', $data['id'])->first() == null){

            ResponsavelConsumoAluno::insert([
                'idResponsavel'=> $data['idResponsavel'],
                'idAluno' => $data['idAluno'], 
                'idProduto'  => $data['id'],
            ]);

            return 0;
        }else{
            ResponsavelConsumoAluno::where('idProduto', $data['id'])->delete();

            return 1;
        }

    }
}
