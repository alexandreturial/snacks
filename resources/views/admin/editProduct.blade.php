@extends('layouts.adm.app')

@section('content')

<div class="responsible-data">
  <h2>Altere os dados do produto</h2>
  <div class="modal-body body-edit">
    <form action="#" method="POST">
      @csrf
      <div class="image-info">
        <div class="info-base">
          <div class="label-float">
            <input class="not-empty" type="text" required name="nome" value="Pão com ovo" id="nome" onchange="isNotEmpty('nome')" placeholder=" "/>
            <label>Nome</label>
          </div>
          <div class="label-radio-btn">
            <input type="radio" checked required name="tipo" value="" id="comida" onchange="isDrink('comida')" placeholder=" " />
            <label for="comida">Comida</label>
          </div>
          <div class="label-radio-btn">
            <input type="radio" required name="tipo" value="" id="bebida" onchange="isDrink('bebida')" placeholder=" " />
            <label for="bebida">Bebida</label>
          </div>
          
          <div class="label-float">
            <input class="not-empty" type="text" required name="codigo" value="1561561" id="codigo" onchange="isNotEmpty('codigo')" placeholder=" " />
            <label>Código</label>
          </div>
        </div>

        <button class="btn-img"> 
          <label for="image">Selecionar imagem  </label>
        </button>
        <input type="file" required name="image" id="image" accept="image/gif, image/jpeg"/>
      </div>

      <div class="label-float" id="comida-card">
        <textarea class="not-empty" type="textarea" required name="ingredientes" id="ingredientes" onchange="isNotEmpty('ingredientes')" 
        value=""
        name="" id="">
        Este produto contém 4 ovos (ovos orgânicos ou caipiras),
        2 colheres de sopa de vinagre de vinho branco,
        2 english muffins cortados ao meio ou fatias de pão de forma branco sem casca
        Um pouco de manteiga,
        8 fatias de presunto, bacon ou salmão fumado e
        cebolinha picada para finalizar
        </textarea>
        <label>Ingredientes</label>
      </div>

      <div class="label-float disable" id="bebida-card">
        <input class="not-empty" type="text" name="fornecedor" required id="fornecedor" onkeyup="isNotEmpty('codigo')" value="" placeholder=" "/>
        <label>Fornecedor</label>
      </div>

      <div class="label-float">
        <input class="not-empty"type="text" name="preco" required id="preco" onkeyup="moneyCurrent('preco')" value="R$ 4,00" placeholder=" "/>
        <label>Preço</label>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
</div>



@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>
<script src="{{ asset('js/components/new_product_card.js') }}"></script>