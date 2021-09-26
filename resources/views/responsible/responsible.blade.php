@extends('layouts.responsible.app')

@section('content')

<div class="responsible-data">
  <h2>Meus dados</h2>
  <form action="#">
    @csrf
    <div class="label-float">
      <input value="Albus Percival Wulfric Brian Dumbledore" type="text" value="" id="nome" onchange="isNotEmpty('nome')" placeholder=" "/>
      <label>Nome</label>
    </div>
    <div class="label-float">
      <input  value="841.171.548.48"type="text" value="" id="CPF" onkeyup="cpfFormat('CPF')" maxlength="11" placeholder=" " />
      <label>CPF</label>
    </div>
    <div class="label-float">
      <input value="(74) 98745-1532" type="tel" value="" id="telefone" onkeyup="foneFormat('telefone')" maxlength="11" placeholder=" "/>
      <label>Telefone</label>
    </div>
    <div class="label-float">
      <input value="dumbledore_dr@gmail.com" type="email" value="" id="email" onchange="isNotEmpty('email')" placeholder=" " />
      <label>Email</label>
    </div>
    <div class="label-float">
      <input type="text" value="" id="login" onchange="isNotEmpty('login')" placeholder=" " />
      <label>Login</label>
    </div>
    <div class="label-float">
      <input type="password" value="" id="senha" onchange="isNotEmpty('senha')" minlength="3" placeholder=" " />
      <label>Senha</label>
    </div>
    <button type="submit" class="btn btn-primary" >Editar</button>

  </form>

</div>



@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>