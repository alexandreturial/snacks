@extends('layouts.student.app')

@section('content')

<div class="product-options">
  <div class="option-btn">
    <input type="radio" name="tipo" checked value="food" id="comida" onclick="isFood()" placeholder=" " />
    <label for="comida">Comida</label>
  </div>
  <div class="option-btn">
    <input type="radio" name="tipo" value="drink" id="bebida" onclick="isDrinkProduct()" placeholder=" " />
    <label for="bebida">Bebida</label>
  </div>
</div>

<div class="cards active" id="food">
  @foreach($produtos as $produto)
  @if($produto->tipo == 'comida')
    <div class="card" >
      <div data-toggle="modal" data-target="#detailProduct"
        onclick="loadvalues(
        '{{$produto->nome}}', 
        '{{$produto->codigo}}', 
        '{{$produto->foto}}', 
        '{{$produto->tipo}}', 
        '{{$produto->info}}', 
        'R$ {{number_format($produto->preco, 2, ',', ',')}}'
        )"
      >
        <div class="img-product">
          <img id="produto-image" src="{{ asset('images/produtos/'.$produto->codigo.'/'.$produto->foto) }}" alt="Produto">
        </div>
       
        <h4>{{$produto->nome}}</h4>
        <small>R$ {{number_format($produto->preco, 2, ',', ',')}}</small>
      </div>
      <span class="buy" >
        <button type="button" class="btn btn-primary" onclick="newElement('{{$produto->nome}}', {{$produto->preco}}, '{{$produto->codigo}}')"><i class="fa fa-shopping-cart"></i></button>
      </span>
    </div>
  @endif
  @endforeach
 
</div>

<div class="cards" id="drink">
@foreach($produtos as $produto)
  @if($produto->tipo == 'bebida')
    <div class="card" >
      <div data-toggle="modal" data-target="#detailProduct"
        onclick="loadvalues(
        '{{$produto->nome}}', 
        '{{$produto->codigo}}', 
        '{{$produto->foto}}', 
        '{{$produto->tipo}}', 
        '{{$produto->info}}', 
        'R$ {{number_format($produto->preco, 2, ',', ',')}}'
        )"
      >
        <div class="img-product">
          <img id="produto-image" src="{{ asset('images/produtos/'.$produto->codigo.'/'.$produto->foto) }}" alt="Produto">
        </div>
       
        <h4>{{$produto->nome}}</h4>
        <small>R$ {{number_format($produto->preco, 2, ',', ',')}}</small>
      </div>
      <span class="buy" >
        <button type="button" class="btn btn-primary" onclick="newElement('{{$produto->nome}}', {{$produto->preco}}, '{{$produto->codigo}}')"><i class="fa fa-shopping-cart"></i></button>
      </span>
    </div>
  @endif

  
  @endforeach
 </div>

<!-- Detail -->
<div class="modal fade" id="detailProduct" tabindex="-1" role="dialog" aria-labelledby="detailProduct" aria-hidden="true">
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
          <h3 id="description-type">Ingredientes</h3>
          <div class="ingredients-list">
           <p id="description">
           </p>
          </div>
          <h3>Preço</h3>
          <small id="price"></small>
      </div>
    </div>
  </div>
</div>


<!-- Detail -->
<div class="modal fade" id="detailDrink" tabindex="-1" role="dialog" aria-labelledby="detailDrink" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="button modal-header close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body card-detail">
        <div class="detail-img">
          <div class="detail-title">
            <h3>Cerveja amanteigada</h3>
            <small>Cod.: 159126</small>
          </div>
          <div class="img-product">
            <img id="produto-image" src="{{ asset('images/buterbeer.jpg') }}" alt="Produto">
          </div>
        </div>
        <h3>Tipo</h3>
        <small>Bebida</small>
          <h3>Fornecedor</h3>
          <div class="">
           <small>
            O Cadeirão Furado
           </small>
          </div>
          <h3>Preço</h3>
          <small>R$ 5,00</small>
      </div>
    </div>
  </div>
</div>



<!-- buy -->
<div class="modal fade" id="buyProduct" tabindex="-1" role="dialog" aria-labelledby="buyProduct" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="header-modal">
        <h3>Carrinho</h3>
        <h4 id="totalcarrinho">Total: R$ 00,00</h4>
      </div>
      <div class="body-modal" id="carrinho">
        <h3 id="empty-cart">Carrinho Vazio</h3>
      </div> 
     
      <div class="footer-modal">
        <button class="btn cancel" data-dismiss="modal" aria-label="Close">Cancelar</button>
        <button class="btn buy disable" id="buy-btn" onclick="buy( {{session()->all()['id']}})">Comprar</button>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/student/carrinho.js') }}"></script>
<script src="{{ asset('js/student/shop_filter.js') }}"></script>
<script src="{{ asset('js/components/modal_detail.js') }}"></script>

@endsection
