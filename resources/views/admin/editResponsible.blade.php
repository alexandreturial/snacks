@extends('layouts.adm.app')

@section('content')

<div class="responsible-data">
  
  <h2>Altere os dados de Albus Percival</h2>
  <form action="{{Route('update_res')}}" method="POST">
    @csrf
    <input class="not-empty" name='id' value="{{$responsavel->id}}" type="hidden" id="id"/>
    
    <div class="label-float">
      <input class="not-empty" name='nome' value="{{$responsavel->nome}}" type="text" id="nome" onchange="isNotEmpty('nome')" placeholder=" "/>
      <label>Nome</label>
    </div>
    <div class="label-float">
      <input class="not-empty" name='CPF' value="{{$responsavel->cpf}}"type="text" id="CPF" onkeyup="cpfFormat('CPF')" maxlength="11" placeholder=" " />
      <label>CPF</label>
    </div>
    <div class="label-float">
      <input class="not-empty" name='telefone' value="{{$responsavel->telefone}}" type="tel" id="telefone" onkeyup="foneFormat('telefone')" maxlength="11" placeholder=" "/>
      <label>Telefone</label>
    </div>
    <div class="label-float">
      <input class="not-empty" name='email' value="{{$responsavel->email}}" type="email" id="email" onchange="isNotEmpty('email')" placeholder=" " />
      <label>Email</label>
    </div>
    <div class="label-float">
      <input class="not-empty" type="text" id="login" name='login' value="{{$responsavel->login}}" onchange="isNotEmpty('login')" placeholder=" " />
      <label>Login</label>
    </div>
    <div class="label-float">
      <input type="password" id="senha" name='senha' onchange="isNotEmpty('senha')" minlength="3" placeholder=" " />
      <label>Senha</label>
    </div>
    <button type="submit" class="btn btn-primary" >Salvar</button>
  </form>
</div>



@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>