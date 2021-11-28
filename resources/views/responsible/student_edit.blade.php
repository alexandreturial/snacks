@extends('layouts.responsible.app')

@section('content')

<div class="responsible-data">
  <h2>Altere os dados de {{$aluno->nome}}</h2>
  <form action="{{Route('update_student', $aluno->id)}}" method="post">
    @csrf
    <div class="label-float">
      <input class="not-empty" type="text" name="matricula" required value="{{$aluno->matricula}}" id="matricula" onchange="isNotEmpty('matricula')" placeholder=" "/>
      <label>Matricula</label>
    </div>
    <div class="label-float">
      <input class="not-empty" type="text" name="turma" value="{{$aluno->turma}}" required id="turma" onkeyup="isNotEmpty('turma')" placeholder=" " />
      <label>Turma</label>
    </div>
    <div class="label-float">
      <input class="not-empty" class="not-empty" name="turno" type="text" value="{{$aluno->turno}}" required id="turno" onkeyup="isNotEmpty('turno')" placeholder=" "/>
      <label>Turno</label>
    </div>
    <div class="label-float">
      <input class="not-empty" type="text" name="nome" value="{{$aluno->nome}}" required id="nome" onchange="isNotEmpty('nome')" placeholder=" " />
      <label>Nome</label>
    </div>
    <div class="label-float">
      <input class="not-empty" type="tel" name="telefone" value="{{$aluno->telefone}}" required id="telefone" onkeyup="foneFormat('telefone')" maxlength="11" placeholder=" "/>
      <label>Telefone</label>
    </div>
    <div class="label-float">
      <input class="not-empty" type="email" name="email" value="{{$aluno->email}}" required id="email" onchange="isNotEmpty('email')" placeholder=" " />
      <label>Email</label>
    </div>
    <div class="label-float">
      <input type="tel" value="" id="login" name="login" onchange="isNotEmpty('login')" placeholder=" " />
      <label>Login</label>
    </div>
    <div class="label-float">
      <input type="password" value="" id="senha" name="senha" onchange="isNotEmpty('senha')" minlength="3" placeholder=" " />
      <label>Senha</label>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
   </form>
</div>



@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>