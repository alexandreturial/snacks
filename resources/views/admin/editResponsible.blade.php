@extends('layouts.adm.app')

@section('content')

<div class="responsible-data">
  <h2>Altere os dados de Albus Percival</h2>
  <form action="#">
    @csrf
    <div class="label-float">
      <input class="not-empty" value="Albus Percival Wulfric Brian Dumbledore" type="text" id="nome" onchange="isNotEmpty('nome')" placeholder=" "/>
      <label>Nome</label>
    </div>
    <div class="label-float">
      <input class="not-empty" value="841.171.548.48"type="text" id="CPF" onkeyup="cpfFormat('CPF')" maxlength="11" placeholder=" " />
      <label>CPF</label>
    </div>
    <div class="label-float">
      <input class="not-empty" value="(74) 98745-1532" type="tel" id="telefone" onkeyup="foneFormat('telefone')" maxlength="11" placeholder=" "/>
      <label>Telefone</label>
    </div>
    <div class="label-float">
      <input class="not-empty" value="dumbledore_dr@gmail.com" type="email" id="email" onchange="isNotEmpty('email')" placeholder=" " />
      <label>Email</label>
    </div>
    <div class="label-float">
      <input type="text" id="login" onchange="isNotEmpty('login')" placeholder=" " />
      <label>Login</label>
    </div>
    <div class="label-float">
      <input type="password" id="senha" onchange="isNotEmpty('senha')" minlength="3" placeholder=" " />
      <label>Senha</label>
    </div>
    <button type="submit" class="btn btn-primary" >Salvar</button>
  </form>
</div>



@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>