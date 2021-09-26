<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\Outdoor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{
    public function index()
    {

        $contrato = Contrato::Join('usuarios','contrato.id_usuario','usuarios.id_usuario')
            ->Join('outdoor','contrato.id_empresa','outdoor.id_outdoor')
            ->select('usuarios.nome as usuario',
                     'outdoor.nome as outdoor',
                     'data_inicio',
                     'data_fim',
                     'id_contrato')
            ->paginate(10);

        foreach ($contrato as $i){
            // transforma a data do formato BR para o formato americano, ANO-MES-DIA
            $data1 = implode('-', array_reverse(explode('/', $i->data_inicio)));
            $data2 = implode('-', array_reverse(explode('/', $i->data_fim)));

            // converte as datas para o formato timestamp
            $d1 = strtotime($data1);
            $d2 = strtotime($data2);

            // verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
            $dataFinal = ($d2 - $d1) /86400;

            $i->dias = $dataFinal;

        }

        return view('contrato.index', compact('contrato'));
    } 
    
    public function edit(Request $request)
    {
        $clientes = User::join('usuario_perfil','usuarios.id_usuario','usuario_perfil.id_usuario')
            ->select('usuarios.nome','usuarios.id_usuario')
            ->where('usuario_perfil.id_perfil','!=',1)->get();

        $outdoors = Outdoor::select('id_outdoor','nome')->get();

        $user = Contrato::getUserById($request->all()['id_contrato']);

        return view('contrato.edit',compact('user','clientes','outdoors'));
    }

    public function editar(Request $request)
    {

        $data = $request->all();

        $pieces = explode("-", $data['dataContrato']);
        $pieces[0] = str_replace("/", "-", $pieces[0]);
        $pieces[1] = str_replace("/", "-", $pieces[1]);

        Contrato::where('id_contrato',$data['id_contrato'])
            ->update([
                'id_usuario' => $data['clienteId']
                ,'id_empresa' => $data['outdoorId']
                ,'data_inicio' => date('Y-m-d', strtotime($pieces[0]))
                ,'data_fim' =>date('Y-m-d', strtotime($pieces[1]))
             ]);

        return $this->index();
    }

    public function createPage()
    {


        $clientes = User::join('usuario_perfil','usuarios.id_usuario','usuario_perfil.id_usuario')
            ->select('usuarios.nome','usuarios.id_usuario')
            ->where('usuario_perfil.id_perfil','!=',1)->get();

        $outdoors = Outdoor::select('id_outdoor','nome')->get();

        return view('contrato.registro', compact('clientes','outdoors'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $pieces = explode("-", $data['dataContrato']);
        $pieces[0] = str_replace("/", "-", $pieces[0]);
        $pieces[1] = str_replace("/", "-", $pieces[1]);
        $contratoId =  Contrato::insertGetId([
                'id_usuario' => $data['clienteId']
                ,'id_empresa' => $data['outdoorId']
                ,'data_inicio' => date('Y-m-d', strtotime($pieces[0]))
                ,'data_fim' =>date('Y-m-d', strtotime($pieces[1]))
            ]);

        DB::table('outdoor_contrato')->insert(['id_contrato' =>$contratoId, 'id_outdoor' =>$data['outdoorId']]);

        return $this->index();
    }

    public function delet(Request $request)
    {

        $user = Contrato::deletContrato($request->all()['id_contrato']);

        return $this->index();
    }
}
