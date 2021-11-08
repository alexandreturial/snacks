@extends('layouts.adm.app')

@section('content')
<div class="options">
  <button class="btn" data-toggle="modal" data-target="#newProduct">Novo Produto</button>
  <div class="label-float">
    <input type="text" required name="busca" value="" id="busca" onkeyup="search('busca')" placeholder=" "/>
    <label>Buscar Produto</label>
  </div>
</div>

<div class="cards" id="cards-product">
  

  @foreach($produtos as $item)
  
  <div class="card-product" >
    @if($item->status == 1)
    <span class="locked" id={{$item->codigo}} onclick="unlockFood('{{$item->codigo}}')">
      <img src="{{ asset('images/unlock.svg') }}" alt="">
    </span>
    @else
    <span class="locked" id={{$item->codigo}} onclick="unlockFood('{{$item->codigo}}')">
      <img src="{{ asset('images/lock.svg') }}" alt="">
    </span>
    @endif
    <div data-toggle="modal" data-target="#descriptionModal" 
    onclick="loadvalues(
      '{{$item->nome}}', 
      '{{$item->codigo}}', 
      '{{$item->foto}}', 
      '{{$item->tipo}}', 
      '{{$item->info}}', 
      '{{$item->preco}}'
      )">
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/'.$item->foto) }}" alt="Produto">
      </div>
      <h4>{{$item->nome}}</h4>
      <small>R$ {{number_format($item->preco, 2, ',', ',')}}</small>
    </div>
  </div>
  @endforeach
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
            <h3 id="name"></h3>
            <small id="code">Cod.: </small>
          </div>
          <div class="img-product">
            <img id="produto-image-detail" src="" alt="Produto">
          </div>
        </div>
        <h3>Tipo</h3>
        <small id="type"></small>
          <h3 id="description-type"></h3>
          <div class="ingredients-list">
           <p id="description">
           </p>
          </div>
          <h3>Preço</h3>
          <small id="price"></small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <a type="button" id="edit-product" class="btn btn-primary" href="">Editar</a>
      </div>
    </div>
  </div>
</div>

<!-- new Peoduct -->
<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProduct" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo produto</h5>
      </div>
      <div class="modal-body">
        <form action="{{route('new_product')}}" method="POST">
          @csrf
          <div class="image-info">
            <div class="info-base">
              <div class="label-float">
                <input type="text" required name="nome" value="" id="nome" onchange="isNotEmpty('nome')" placeholder=" "/>
                <label>Nome</label>
              </div>
              <div class="label-radio-btn">
                <input type="radio" checked name="tipo" value="comida" id="comida" onchange="isDrink('comida')" placeholder=" " />
                <label for="comida">Comida</label>
              </div>
              <div class="label-radio-btn">
                <input type="radio" name="tipo" value="bebida" id="bebida" onchange="isDrink('bebida')" placeholder=" " />
                <label for="bebida">Bebida</label>
              </div>
              
              <div class="label-float">
                <input type="text" required name="codigo" value="" id="codigo" onchange="isNotEmpty('codigo')" placeholder=" " />
                <label>Código</label>
              </div>
            </div>

            <button id="btn-img"  type="button" class="btn-img"> 
              <label for="image">Selecionar imagem  </label>
            </button>
            <input type="file" required name="image" onchange="selectImage('image')" id="image" accept="image/gif, image/jpeg"/>
            
            <div id="preview" class="hide-img detail-img">
              <div class="img-product">
                <img id="produto-image-new" src="" alt="Produto">
              </div>
              <label for="image">Trocar imagem  </label>
            </div>
          </div>

          <div class="label-float" id="comida-card">
            <textarea type="textarea" name="ingredientes" id="ingredientes" onchange="isNotEmpty('ingredientes')" value=""name="" id="">
            </textarea>
            <label>Ingredientes</label>
          </div>

          <div class="label-float disable" id="bebida-card">
            <input type="text" name="fornecedor" id="fornecedor" onkeyup="isNotEmpty('codigo')" value="" placeholder=" "/>
            <label>Fornecedor</label>
          </div>

          <div class="label-float">
            <input type="text" name="preco" required id="preco" onkeyup="moneyCurrent('preco')" value="" placeholder=" "/>
            <label>Preço</label>
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
<script src="{{ asset('js/Home/home.js') }}"></>
<script src="{{ asset('js/components/new_product_card.js') }}"></script>
<script src="{{ asset('js/components/modal_detail.js') }}"></script>
