@extends('layouts.adm.app')

@section('content')

<div class="responsible-data">

  <h2>Altere os dados do produto</h2>
  <div class="modal-body body-edit">
    <form action="{{Route('update_product')}}" method="POST">
      @csrf
      <div class="image-info">
        <div class="info-base">
          <div class="label-float">
            <input class="not-empty" type="text" required name="nome" value="{{$product->nome}}" id="nome" onchange="isNotEmpty('nome')" placeholder=" "/>
            <label>Nome</label>
          </div>
          @if($product->tipo == 'Comida')
          <div class="label-radio-btn">
            <input type="radio" checked required name="tipo" value="{{$product->tipo}}" id="comida" onchange="isDrink('comida')" placeholder=" " />
            <label for="comida">Comida</label>
          </div>
          <div class="label-radio-btn">
            <input type="radio"  required name="tipo" value="Bebida" id="bebida" onchange="isDrink('bebida')" placeholder=" " />
            <label for="bebida">Bebida</label>
          </div>
          @else
          <div class="label-radio-btn">
            <input type="radio" required name="tipo" value="Comida" id="comida" onchange="isDrink('comida')" placeholder=" " />
            <label for="comida">Comida</label>
          </div>
          <div class="label-radio-btn">
            <input type="radio" checked required name="tipo" value="{{$product->tipo}}" id="bebida" onchange="isDrink('bebida')" placeholder=" " />
            <label for="bebida">Bebida</label>
          </div>
          @endif
          <div class="label-float">
            <input class="not-empty" type="text" required name="codigo" value="{{$product->codigo}}" id="codigo" onchange="isNotEmpty('codigo')" placeholder=" " />
            <label>Código</label>
          </div>
        </div>

        <button id="btn-img"  type="button" class="hide-img btn-img"> 
              <label for="image">Selecionar imagem  </label>
            </button>
            <input type="file" name="image" onchange="selectImage('image')" id="image" accept="image/gif, image/jpeg"/>
            
            <div id="preview" class=" detail-img">
              <div class="img-product">

                <img id="produto-image-new" src="{{asset('images/'.$product->foto) }}" alt="Produto">
              </div>
              <label for="image">Trocar imagem  </label>
            </div>
          </div>

      @if($product->tipo == 'Comida')
      <div class="label-float" id="comida-card">
        <textarea class="not-empty" type="textarea" name="ingredientes" id="ingredientes" onchange="isNotEmpty('ingredientes')" 
        value=""
        name="" id="">
        {{$product->info}}
        </textarea>
        <label>Ingredientes</label>
      </div>

      <div class="label-float disable" id="bebida-card">
        <input class="not-empty" type="text" name="fornecedor" id="fornecedor" onkeyup="isNotEmpty('codigo')" value="" placeholder=" "/>
        <label>Fornecedor</label>
      </div>
      @else
      <div class="label-float disable" id="comida-card">
        <textarea class="not-empty" type="textarea" name="ingredientes" id="ingredientes" onchange="isNotEmpty('ingredientes')" 
        value=""
        name="" id="">
        {{$product->info}}
        </textarea>
        <label>Ingredientes</label>
      </div>
      
      <div class="label-float" id="bebida-card">
        <input class="not-empty" type="text" name="fornecedor" id="fornecedor" onkeyup="isNotEmpty('codigo')" value="{{$product->info}}" placeholder=" "/>
        <label>Fornecedor</label>
      </div>
      @endif
     

      <div class="label-float">
        <input class="not-empty"type="text" name="preco" required id="preco" onkeyup="moneyCurrent('preco')" value="R$ {{number_format($product->preco, 2, ',', ',')}}" placeholder=" "/>
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