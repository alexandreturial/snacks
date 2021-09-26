@extends('layouts.app')

@section('content')
<div class="options">
  <button class="btn" data-toggle="modal" data-target="#newAluno">Novo Aluno</button>
</div>
<div class="cards">
 @for($i=0; $i < 10; $i++)
  <div class="card" >
    <span class="unlocked" id={{$i}} onclick="unlockFood({{$i}})">
      <img src="{{ asset('images/unlock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#modalDetail">
      <h4>NOME</h4>
      <small>(99) 9999-999</small>
      <small>example@mail.com</small>
    </div>
    
  </div>
  @endfor
</div>

<!-- new Studant -->
<div class="modal fade" id="newAluno" tabindex="-1" role="dialog" aria-labelledby="newAluno" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newResponsible">Novo Aluno</h5>
      </div>
      <div class="modal-body">
       <form action="" method="post">
        <div class="label-float">
          <input type="text" value="" id="matricula" onchange="isNotEmpty('matricula')" placeholder=" "/>
          <label>Matricula</label>
        </div>
        <div class="label-float">
          <input type="text" value="" id="turma" onkeyup="isNotEmpty('turma')" placeholder=" " />
          <label>Turma</label>
        </div>
        <div class="label-float">
          <input type="text" value="" id="turno" onkeyup="isNotEmpty('turno')" placeholder=" "/>
          <label>Turno</label>
        </div>
        <div class="label-float">
          <input type="text" value="" id="nome" onchange="isNotEmpty('nome')" placeholder=" " />
          <label>Nome</label>
        </div>
        <div class="label-float">
          <input type="tel" value="" id="telefone" onkeyup="foneFormat('telefone')" placeholder=" "/>
          <label>Telefone</label>
        </div>
        <div class="label-float">
          <input type="email" value="" id="email" onchange="isNotEmpty('email')" placeholder=" " />
          <label>Email</label>
        </div>
        <div class="label-float">
          <input type="tel" value="" id="login" onchange="isNotEmpty('login')" placeholder=" " />
          <label>Login</label>
        </div>
        <div class="label-float">
          <input type="password" value="" id="senha" onchange="isNotEmpty('senha')" placeholder=" " />
          <label>Senha</label>
        </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="button modal-header close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body card-detail">
        <div class="box">
          <div class="content-info">
            <h3>Nome</h3>
            <small>Example</small>
          </div>
          <div class="content-info">
            <h3>CPF</h3>
            <small>Example</small>
          </div>
         
        </div>
        <div class="box">
          <div class="content-info">
            <h3>Email</h3>
            <small>Example</small>
          </div>
          <div class="content-info">
            <h3>Telefone</h3>
            <small>Example</small>
          </div>
        </div>
        <div class="box">
          <div class="content-info">
            <h3>Login</h3>
            <small>Example</small>
          </div>
          <div class="content-info">
            <h3>Senha</h3>
            <small>Example</small>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Deletar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#newAluno">Editar</button>
      </div>
    </div>
  </div>
</div>

@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>