@extends('layouts.adm.app')

@section('content')
<div class="options">
  <button class="btn" data-toggle="modal" data-target="#newResponsible">Novo Responsável</button>
  <div class="label-float">
    <input type="text" required name="busca" value="" id="busca" onchange="isNotEmpty('busca')" placeholder=" "/>
    <label>Buscar Responsavel</label>
  </div>
</div>
<div class="cards">
  <div class="card" >
    <div data-toggle="modal" data-target="#modalDetailRes"
      onclick="loadvalues(
        'Albus Percival Wulfric Brian Dumbledore', 
        '841.171.548.48', 
        'dumbledore_dr@gmail.com', 
        '(74) 98745-1532'
      )"
    >
      <h4>Albus Percival Wulfric Brian Dumbledore</h4>
      <small>(74) 98745-1532</small>
      <small>dumbledore_dr@gmail.com</small>
    </div>
  </div>
  <div class="card" >
    <div data-toggle="modal" data-target="#modalDetailRes"
      onclick="loadvalues(
        'Severus Prince Snape', 
        '226.845.559.78', 
        'severus_prof@gmail.com', 
        '(74) 98252-4394'
      )"
    >
      <h4>Severus Prince Snape</h4>
      <small>(74) 98252-4394</small>
      <small>severus_prof@gmail.com</small>
    </div>
  </div>
  <div class="card" >
    <div data-toggle="modal" data-target="#modalDetailRes"
      onclick="loadvalues(
        'Minerva McGonagall', 
        '335.661.559.77', 
        'minerva_prof@gmail.com', 
        '(74) 98621-4817'
      )"
    >
      <h4>Minerva McGonagall</h4>
      <small>(74) 98621-4817</small>
      <small>minerva_prof@gmail.com</small>
    </div>
  </div>

</div>

<!-- new responsible -->
<div class="modal fade" id="newResponsible" tabindex="-1" role="dialog" aria-labelledby="newResponsible" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newResponsible">Novo Responsável</h5>
      </div>
      <div class="modal-body">
       <form action="#">
        @csrf
        <div class="label-float">
          <input type="text" required value="" id="nome" onchange="isNotEmpty('nome')" placeholder=" "/>
          <label>Nome</label>
        </div>
        <div class="label-float">
          <input type="text" required value="" id="CPF" onkeyup="cpfFormat('CPF')"  maxlength="11"placeholder=" " />
          <label>CPF</label>
        </div>
        <div class="label-float">
          <input type="tel" required value="" id="telefone" onkeyup="foneFormat('telefone')"  maxlength="11" placeholder=" "/>
          <label>Telefone</label>
        </div>
        <div class="label-float">
          <input type="email" required value="" id="email" onchange="isNotEmpty('email')" placeholder=" " />
          <label>Email</label>
        </div>
        <div class="label-float">
          <input type="text" required value="" id="login" onchange="isNotEmpty('login')" placeholder=" " />
          <label>Login</label>
        </div>
        <div class="label-float">
          <input type="password" required value="" id="senha" onchange="isNotEmpty('senha')" placeholder=" " />
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


<!-- Modal -->
<div class="modal fade" id="modalDetailRes" tabindex="-1" role="dialog" aria-labelledby="modalDetailRes" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="button modal-header close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body card-detail">
        <div class="box">
          <div class="content-info">
            <h3>Nome</h3>
            <small id="name"></small>
          </div>
          <div class="content-info">
            <h3>CPF</h3>
            <small id="cpf"></small>
          </div>
          <div class="box">
            <div class="content-info">
              <h3>Email</h3>
              <small id="e-mail"></small>
            </div>
            <div class="content-info">
              <h3>Telefone</h3>
              <small id="phone"></small>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Deletar</button>
        <a type="button" class="btn btn-primary" href="{{Route('adm_edit_res')}}">Editar</a>
      </div>
    </div>
  </div>
</div>

@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>
<script src="{{ asset('js/components/modal_detail_res.js') }}"></script>
