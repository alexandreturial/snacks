@extends('layouts.student.app')

@section('content')

{{-- <div class="product-options">
  <div class="label-float">
    <input type="text" required name="busca" value="" id="busca" onchange="isNotEmpty('busca')" placeholder=" "/>
    <label>Buscar Produto</label>
  </div>
</div> --}}

<div class="product-options">
  <div class="option-btn">
    <input type="radio" name="tipo" checked value="food" id="comida" onclick="isFood()" placeholder=" " />
    <label for="comida">Comida</label>
  </div>
  <div class="option-btn">
    <input type="radio" name="tipo" value="drink" id="bebida" onclick="isDrink()" placeholder=" " />
    <label for="bebida">Bebida</label>
  </div>
</div>

<div class="cards active" id="food">
 {{-- @for($i=0; $i < 5; $i++) --}}
  <div class="card" >
    <div data-toggle="modal" data-target="#detailProduct">
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/food3.png') }}" alt="Produto">
      </div>
      <h4>Pão com ovo</h4>
      <small>R$ 4,00</small>
    </div>
    <span class="buy" >
      <button type="button" class="btn btn-primary" onclick="newElement('Pão com ovo', 4, '45')"><i class="fa fa-shopping-cart"></i></button>
    </span>
  </div>
  <div class="card" >
    <div data-toggle="modal" data-target="#detailProduct">
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/rosquinhas.jpg') }}" alt="Produto">
      </div>
      <h4>Rosquinhas</h4>
      <small>R$ 2,50</small>
    </div>
    <span class="buy" >
      <button type="button" class="btn btn-primary" onclick="newElement('Rosquinhas', 2.50, '30')"><i class="fa fa-shopping-cart"></i></button>
    </span>
  </div>
  <div class="card" >
    <div data-toggle="modal" data-target="#detailProduct">
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/panquecas.jpg') }}" alt="Produto">
      </div>
      <h4>Panquecas</h4>
      <small>R$ 5,00</small>
    </div>
    <span class="buy" >
      <button type="button" class="btn btn-primary" onclick="newElement('Panquecas', 5, '5')"><i class="fa fa-shopping-cart"></i></button>
    </span>
  </div>
  <div class="card" >
    <div data-toggle="modal" data-target="#detailProduct">
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/cupcake.jpg') }}" alt="Produto">
      </div>
      <h4>Cupcake</h4>
      <small>R$ 3,50</small>
    </div>
    <span class="buy" >
      <button type="button" class="btn btn-primary" onclick="newElement('Coupcake', 3.50, '17')"><i class="fa fa-shopping-cart"></i></button>
    </span>
  </div>
  <div class="card" >
    <div data-toggle="modal" data-target="#detailProduct">
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/food2.png') }}" alt="Produto">
      </div>
      <h4>Sorvete</h4>
      <small>R$ 2,50</small>
    </div>
    <span class="buy" >
      <button type="button" class="btn btn-primary" onclick="newElement('Sorvete', 2.50, '22')"><i class="fa fa-shopping-cart"></i></button>
    </span>
  </div>
  {{-- @endfor --}}
</div>

<div class="cards" id="drink">
  {{-- @for($i=0; $i < 5; $i++) --}}
   <div class="card" >
     <div data-toggle="modal" data-target="#detailDrink">
       <div class="img-product">
         <img id="produto-image" src="{{ asset('images/buterbeer.jpg') }}" alt="Produto">
       </div>
       <h4>Cerveja amanteigada</h4>
       <small>R$ 5,00</small>
     </div>
     <span class="buy" >
      <button type="button" class="btn btn-primary" onclick="newElement('Cerveja amanteigada', 5, '66')"><i class="fa fa-shopping-cart"></i></button>
    </span>
   </div>
   <div class="card" >
    <div data-toggle="modal" data-target="#detailDrink">
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/milkshake.jpg') }}" alt="Produto">
      </div>
      <h4>Milkshake</h4>
      <small>R$ 10,00</small>
    </div>
    <span class="buy" >
      <button type="button" class="btn btn-primary" onclick="newElement('Milkshake', 10, '33')"><i class="fa fa-shopping-cart"></i></button>
    </span>
  </div>
  <div class="card" >
    <div data-toggle="modal" data-target="#detailDrink">
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/coke.jpg') }}" alt="Produto">
      </div>
      <h4>Coca-cola</h4>
      <small>R$ 1,99</small>
    </div>
    <span class="buy" >
      <button type="button" class="btn btn-primary" onclick="newElement('Coca-cola', 1.99, '11')"><i class="fa fa-shopping-cart"></i></button>
    </span>
  </div>
   {{-- @endfor --}}
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
        {{-- @for($i=0; $i < 3; $i++)
          <div class="card-consumption">
            <span class="consumption-icon">
              <i class="fa fa-cutlery"></i>
            </span>
            <div>
              <h4>Lanche</h4>
              <small> R$ 60,00</small>
            </div>
            <div class="quantity-menu">
              <span onclick="less({{$i}})"><i class="fa fa-minus"></i></span>
              <small id="quantity{{$i}}">1</small>
              <span onclick="add({{$i}})"><i class="fa fa-plus"></i></span>
            </div>
            <div class="quantity-menu">
              <span ><i class="fa fa-trash"></i></span>
            </div>
          </div>
        @endfor    --}}
      </div> 
      <div class="footer-modal">
        <button class="btn cancel" data-dismiss="modal" aria-label="Close">Cancelar</button>
        <button class="btn buy" onclick="alert('Compra efetuada!')">Comprar</button>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/student/carrinho.js') }}"></script>
<script src="{{ asset('js/student/shop_filter.js') }}"></script>

@endsection
