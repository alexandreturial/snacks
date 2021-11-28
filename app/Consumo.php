<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Consumo extends Model
{
    protected $table = 'consumo';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idAluno', 
        'datahora', 
        'quantidade', 
        'idProduto',
    ];
    public $timestamps = false;


    static function addProduct(int $idAluno, int $idProduto, DateTime $date, int $quatidade){
        try{
            Consumo::insert([
                'idAluno' => $idAluno, 
                'datahora' => $date, 
                'quantidade' => $quatidade, 
                'idProduto' => $idProduto,
            ]);

            return true;

        }catch (Exception $e){
           return false;
        };
    }

    static function getStudnetConsumptionByRegistration(int $id){
        
        return Consumo::join(
          'produtos', 
          'produtos.codigo', 
          'consumo.idProduto'
        )
        ->where('consumo.idAluno', $id)
        ->select(
            'produtos.nome', 
            'produtos.preco', 
            'consumo.quantidade', 
            'consumo.datahora')
        ->orderBy('consumo.datahora', 'desc')
        ->get()
        ->groupBy(function ($item, $key) {
            $date = explode("-", $item['datahora']);
            $formateDate = $date[2]."/".$date[1]."/".$date[0];
                
            return $formateDate;
        });
    }

    static function getStudnetConsumptionByRegistrationByDate(String $id, String $initDate, String $finalDate){
        
        return Consumo::join(
          'produtos', 
          'produtos.codigo', 
          'consumo.idProduto'
        )
        ->where([
            ['consumo.idAluno', $id],
            ["consumo.datahora", '>=', $initDate],
            ["consumo.datahora", '<=', $finalDate]
        ])
        ->select(
            'produtos.nome', 
            'produtos.preco', 
            'consumo.quantidade', 
            'consumo.datahora')
        ->orderBy('consumo.datahora', 'desc')
        ->get()
        ->groupBy(function ($item, $key) {
            $date = explode("-", $item['datahora']);
            $formateDate = $date[2]."/".$date[1]."/".$date[0];
                
            return $formateDate;
        });
    }
}
