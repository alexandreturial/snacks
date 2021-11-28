<?php

namespace App;
use App\ResponsavelConsumoAluno;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    static function getProductsToStudent(int $id){
        $product = Produto::where([
            ['status', '=', 1 ]
        ])->get();
       
        $blockedProduct = ResponsavelConsumoAluno::getProductByIdStudent($id);
       
        foreach($product as $item){
            foreach($blockedProduct as $blocItem){
                if($item->codigo == strval($blocItem->idProduto)){
                    $item->isBlock = true;
                }
            }
        }

        
        return $product;
    }
    
    static function getProductsUnlockToStudent(int $id){
        $product = Produto::where([
            ['status', '=', 1 ]
        ])->get();
       
        $blockedProduct = ResponsavelConsumoAluno::getProductByIdStudent($id);
       
        foreach($product as $key =>$item){
            foreach($blockedProduct as $blocItem){
                if($item->codigo == strval($blocItem->idProduto)){
                    unset($product[$key]);
                }
            }
        }

        
        return $product;
    }

  
  
    static function getProductsByNameAndUnlockToStudent(String $name, int $id){
        $product = Produto::where([
            ['nome', 'LIKE', '%' . $name . '%'],
            ['status', '=', 1 ]
        ])->get();

        $blockedProduct = DB::table('responsavel_bloqueio_produto')
        ->where('idAluno', $id)->get();
       
        foreach($product as $item){
            foreach($blockedProduct as $blocItem){
                if($item->codigo == strval($blocItem->idProduto)){
                    $item->isBlock = true;
                }
            }
        }
        
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
