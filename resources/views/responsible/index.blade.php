@extends('layouts.responsible.app')

@section('content')

<div class="options">
  <div class="label-float">
    <input type="text" required name="busca" value="" id="busca" onchange="isNotEmpty('busca')" placeholder=" "/>
    <label>Buscar Produto</label>
  </div>
</div>

<div class="cards">
 @for($i=0; $i < 20; $i++)
 <div class="card-product" >
  <div data-toggle="modal" data-target="#descriptionModal">
    <div class="img-product">
      <img id="produto-image" src="{{ asset('images/food3.png') }}" alt="Produto">
    </div>
    <h4>Pão com ovo</h4>
    <small>R$ 4,00</small>
  </div>
</div>
  @endfor
</div>


<!-- Modal -->
<div class="modal fade block-food" id="select-son" tabindex="-1" role="dialog" aria-labelledby="select-son" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newResponsible">Selecione seu estudante</h5>
      </div>
      <div class="modal-body">
       <form action="#">
        @csrf
        <fieldset>
          <div class="check-son">
            <input type="checkbox" name="son" id="son1">
            <label for="son1">Filho 01</label>
          </div>
          <div class="check-son">
            <input type="checkbox" name="son" id="son2">
            <label for="son2">Filho 02</label>
          </div>
          <div class="check-son">
            <input type="checkbox" name="son" id="son3">
            <label for="son3">Filho 03</label>
          </div>
        <fieldset>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" id="btn-save-data" class="btn btn-primary" >Salvar</button>
          </div>
       </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="button modal-header close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body card-detail">
        <div class="detail-img">
          <div class="detail-title">
            <h3>Pão com ovo</h3>
            <small>Cod.: 1561561</small>
          </div>
          <div class="img-product">
            <img id="produto-image" src="{{ asset('images/food3.png') }}" alt="Produto">
          </div>
        </div>
        <h3>Tipo</h3>
        <small>Comida</small>
          <h3>Ingredientes</h3>
          <div class="ingredients-list">
           <p>
            Este produto contém 4 ovos (ovos orgânicos ou caipiras),
            2 colheres de sopa de vinagre de vinho branco,
            2 english muffins cortados ao meio ou fatias de pão de forma branco sem casca
            Um pouco de manteiga,
            8 fatias de presunto, bacon ou salmão fumado e
            cebolinha picada para finalizar
           </p>
          </div>
          <h3>Preço</h3>
          <small>R$ 4,00</small>
      </div>
    </div>
  </div>
</div>
@endsection
<script src="{{ asset('js/responsible/index.js') }}"></script>

