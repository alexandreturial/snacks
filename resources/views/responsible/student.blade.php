@extends('layouts.responsible.app')

@section('content')
<div class="options">
  <button class="btn" data-toggle="modal" data-target="#newAluno">Novo Aluno</button>
  <div class="label-float">
    <input type="text" required name="busca" value="" id="busca" onKeyup="searchStudent('busca')" placeholder=" "/>
    <label>Buscar Aluno</label>
  </div>
</div>

<div class="cards"  id="cards">
 @foreach($alunos as $aluno)
  <div class="card" >
    <div class="content-user"  data-toggle="modal" data-target="#modalDetail">
      <h4>{{$aluno->nome}}</h4>
      <small>Matricula: {{$aluno->matricula}}</small>
      <a href="{{Route('resp_detail', $aluno->id)}}" class="btn btn-primary">Detalhe</a>
    </div>
  </div>
  @endforeach
</div>

<!-- new Studant -->
<div class="modal fade" id="newAluno" tabindex="-1" role="dialog" aria-labelledby="newAluno" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newResponsible">Novo Aluno</h5>
      </div>
      <div class="modal-body">
       <form action="{{Route('new_student')}}" method="post">
        @csrf
        <div class="label-float">
          <input type="text" required name="matricula" value="" id="matricula" onchange="isNotEmpty('matricula')" placeholder=" "/>
          <label>Matricula</label>
        </div>
        <div class="label-float">
          <input type="text" value="" name="turma" required id="turma" onkeyup="isNotEmpty('turma')" placeholder=" " />
          <label>Turma</label>
        </div>
        <div class="label-float">
          <input type="text" value="" name="turno" required id="turno" onkeyup="isNotEmpty('turno')" placeholder=" "/>
          <label>Turno</label>
        </div>
        <div class="label-float">
          <input type="text" value="" name="nome" required id="nome" onchange="isNotEmpty('nome')" placeholder=" " />
          <label>Nome</label>
        </div>
        <div class="label-float">
          <input type="tel" value="" name="telefone" required id="telefone" onkeyup="foneFormat('telefone')" maxlength="11" placeholder=" "/>
          <label>Telefone</label>
        </div>
        <div class="label-float">
          <input type="email" value="" name="email" required id="email" onchange="isNotEmpty('email')" placeholder=" " />
          <label>Email</label>
        </div>
        <div class="label-float">
          <input type="tel" value=""  name="login" required id="login" onchange="isNotEmpty('login')" placeholder=" " />
          <label>Login</label>
        </div>
        <div class="label-float">
          <input type="password" value="" name="senha" required id="senha" onchange="isNotEmpty('senha')" minlength="3" placeholder=" " />
          <label>Senha</label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
       </form>
      </div>
      
    </div>
  </div>
</div>

@endsection
<script src="{{ asset('js/responsible/index.js') }}"></script>