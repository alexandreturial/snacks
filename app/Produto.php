<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 
        'nome', 
        'tipo', 
        'info',
        'foto',
        'preco',
        'status',
    ];
    public $timestamps = false;

    static function getProductByname(String $name){
        $product = Produto::where('nome', 'LIKE', '%' . $name . '%')->get();
        
        return $product;
    }
    
    static function toogleStatus(int $cod){
        $product = Produto::where('codigo', $cod)->select('status')->first();
        
        $status = Produto::where('codigo', $cod)
            ->update([
            'status' => $product->status == 0 ? 1 : 0,
            ]);

        return $product->status == 0 ? 1 : 0;
    }
}
