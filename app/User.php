<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Funcionario;

class User extends Authenticatable
{
    use Notifiable;

 
    protected $table = 'usuarios';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codUsuario', 
        'nome', 
        'login', 
        'senha',
        'idEscola',
        'idAluno',
        'idResponsavel',
        'idFuncionario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function getAuthPassword()
    {
        return $this->senha;
    }

    public static function getSchool(){
        $users = User::join('school','user.id_school','school.id')
            ->where('user.id_user', $id);

        return $users;
    }

    public static function getFuncionarioById($id){
        $user = User::join('funcionario', 'usuarios.idFuncionario', 'funcionario.id')
        ->where('usuarios.codUsuario', $id)
        ->first();
       
        return $user;
    }

    public static function updateUser($data){

        $user = User::where('user.id_user', $data['id_usuario'])
            ->update([
                'nome' => $data['nome'],//
                'email' => $data['email'],//
                'senha' => Hash::make($data['password']),//
                'cpf'  => $data['cpf'],
                'rg'  => $data['rg'],
                'nr_nascimento'  => $data['nrNascimento'],
                'endereco'  => $data['endereco'],//
                'cep'  => $data['cep'],//
                'telefone'  => $data['telefone']//
                ,'usuario_perfil.id_perfil' =>$data['perfil']
            ]);

        return $user;
    }

    public static function deletUsers($id){

        DB::table('usuario_perfil')->where('id_usuario', $id)->delete();

        $users = User::where('id_usuario', $id)
            ->delete();

        return $users;
    }
}
