<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['only'=> 'showLoginForm']);
    }

    public function showLoginForm(){
        //Session()->flush();
        //Auth()->logout();
        if(key_exists('login',session()->all())){
            
            return Redirect()->route('adm_index');
        }else{

            return view('auth.login');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(){
        
        
        Session()->flush();
        Auth()->logout();
        $crendentials = $this->validate(request(),[
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
        
        // Get user by email
        $company = User::where('usuarios.login', $crendentials['login'])
            ->first();
           

        // Validate Company
        if(!$company) {
            return back()->withErrors([
                'email' => 'email ou senha errados'
            ])->withInput(\request(['email']));
        }
        
        if (
            Hash::check($crendentials['password'], $company['senha'])
            && $crendentials['login'] = $company['login']
            ) {
            session()->flush(); // Removes a specific variable
            session ([
                'login' => $crendentials['login'],
                'id' => $company->codUsuario,
            ]);
            
           
            if($company->type == 3){
                $aluno = User::getStudentById($company['codUsuario']);
                session([
                    'nome'=> $aluno->nome,
                    'saldo' => $aluno->saldo,
                ]);
                return Redirect()->route('stu_index');
            }else if($company->type == 2){
                $nome = User::getResponsableById($company['codUsuario'])->nome;
                session([
                    'nome'=> $nome,
                ]);
                return Redirect()->route('resp_student');
            }else{
                $nome = User::getFuncionarioById($company['codUsuario'])->nome;
                session([
                    'nome'=> $nome,
                ]);
                
                return Redirect()->route('adm_index');
            }
            
        } else {

            return back()->withErrors([
                'email' => 'email ou senha errados'
            ])->withInput(\request(['email']));
        }
    }

    public function logout() {
        Session()->flush();
        Auth()->logout();

        return redirect('/entrar');
    }
}
