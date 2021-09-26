@extends('layouts.responsible.app')

@section('content')

<div class="responsible-data">
  <h2>Altere os dados de Alexandre Silva</h2>
  <form action="/" method="post">
    <div class="label-float">
      <input class="not-empty" type="text" required value="144181067" id="matricula" onchange="isNotEmpty('matricula')" placeholder=" "/>
      <label>Matricula</label>
    </div>
    <div class="label-float">
      <input class="not-empty" type="text" value="SSD-45" required id="turma" onkeyup="isNotEmpty('turma')" placeholder=" " />
      <label>Turma</label>
    </div>
    <div class="label-float">
      <input class="not-empty" class="not-empty" type="text" value="Matutino" required id="turno" onkeyup="isNotEmpty('turno')" placeholder=" "/>
      <label>Turno</label>
    </div>
    <div class="label-float">
      <input class="not-empty" type="text" value="Alexandre Silva Turial de Brito" required id="nome" onchange="isNotEmpty('nome')" placeholder=" " />
      <label>Nome</label>
    </div>
    <div class="label-float">
      <input class="not-empty" type="tel" value="(71) 98457-1518" required id="telefone" onkeyup="foneFormat('telefone')" maxlength="11" placeholder=" "/>
      <label>Telefone</label>
    </div>
    <div class="label-float">
      <input class="not-empty" type="email" value="aleturial@gmail.com" required id="email" onchange="isNotEmpty('email')" placeholder=" " />
      <label>Email</label>
    </div>
    <div class="label-float">
      <input type="tel" value="" required id="login" onchange="isNotEmpty('login')" placeholder=" " />
      <label>Login</label>
    </div>
    <div class="label-float">
      <input type="password" value="" required id="senha" onchange="isNotEmpty('senha')" minlength="3" placeholder=" " />
      <label>Senha</label>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
   </form>
</div>



@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>