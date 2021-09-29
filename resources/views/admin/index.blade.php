@extends('layouts.adm.app')

@section('content')
<div class="options">
  <button class="btn" data-toggle="modal" data-target="#newProduct">Novo Produto</button>
  <div class="label-float">
    <input type="text" required name="busca" value="" id="busca" onchange="isNotEmpty('busca')" placeholder=" "/>
    <label>Buscar Produto</label>
  </div>
</div>

<div class="cards">
 {{-- @for($i=0; $i < 15; $i++) --}}
  <div class="card-product" >
    <span class="locked" id='15' onclick="unlockFood('15')">
      <img src="{{ asset('images/lock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal" 
    onclick="loadvalues(
      'Pão com ovo', 
      'Cod.: 1561561', 
      'images/food3.png', 
      'Comida', 
      'Este produto contém 4 ovos (ovos orgânicos ou caipiras), 2 colheres de sopa de vinagre de vinho branco, 2 english muffins cortados ao meio ou fatias de pão de forma branco sem casca, Um pouco de manteiga, 8 fatias de presunto, bacon ou salmão fumado e, cebolinha picada para finalizar', 
      'R$ 4,00'
      )">
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/food3.png') }}" alt="Produto">
      </div>
      <h4>Pão com ovo</h4>
      <small>R$ 4,00</small>
    </div>
  </div>
  <div class="card-product" >
    <span class="locked" id='16' onclick="unlockFood('16')">
      <img src="{{ asset('images/lock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Rosquinhas', 
        'Cod.: 1558525', 
        'images/rosquinhas.jpg', 
        'Comida', 
        '4 xícaras farinha de trigo ou até o ponto, 1 xícara de açúcar refinado, 1/2 xícara de óleo, 1/2 xícara de leite, 2 ovos, 1 colher (sopa) de fermento em pó, 1 pitada de sal canela em pó', 
        'R$ 2,50'
      )"
    
    >
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/rosquinhas.jpg') }}" alt="Produto">
      </div>
      <h4>Rosquinhas</h4>
      <small>R$ 2,50</small>
    </div>
  </div>
  <div class="card-product" >
    <span class="locked" id='17' onclick="unlockFood('17')">
      <img src="{{ asset('images/lock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Panquecas', 
        'Cod.: 1514227', 
        'images/panquecas.jpg', 
        'Comida', 
        '2 xícaras (chá) de farinha de trigo, 2 xícaras (chá) de leite, 3 ovos, 1 pitada de sal', 
        'R$ 5,00'
      )"

    >
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/panquecas.jpg') }}" alt="Produto">
      </div>
      <h4>Panquecas</h4>
      <small>R$ 5,00</small>
    </div>
  </div>
  <div class="card-product" >
    <span class="locked" id='18' onclick="unlockFood('18')">
      <img src="{{ asset('images/lock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Cupcake', 
        'Cod.: 1118247', 
        'images/cupcake.jpg', 
        'Comida', 
        '3 gemas, 2 xícaras de açúcar, 1 colher de sopa de essência de baunilha, 250 ml de leite, 1 xícara de óleo, 3 claras em neve, 3 e 1/2 xícaras de farinha de trigo, 1 colher (sopa) de fermento, Recheio e cobertura de doce de leite', 
        'R$ 3,50'
      )"
    
    >
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/cupcake.jpg') }}" alt="Produto">
      </div>
      <h4>Cupcake</h4>
      <small>R$ 3,50</small>
    </div>
  </div>
  <div class="card-product" >
    <span class="locked" id='19' onclick="unlockFood('19')">
      <img src="{{ asset('images/lock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Sorvete', 
        'Cod.: 12358478', 
        'images/food2.png', 
        'Comida', 
        '500 ml de leite integral (leite de vaca), 1 caixa de creme de leite, 1/2 lata de leite condensado, 10 colheres de sopa de açúcar, 1 e 1/2 colher de sopa de pó para sorvete com sabor de sua preferência, 1 colher de sopa bem cheia de liga neutra, 1 colher de chá de emulsificante', 
        'R$ 2,50'
      )"
    >
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/food2.png') }}" alt="Produto">
      </div>
      <h4>Sorvete</h4>
      <small>R$ 2,50</small>
    </div>
  </div>
  <div class="card-product" >
    <span class="locked" id='19' onclick="unlockFood('19')">
      <img src="{{ asset('images/lock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Coca-cola', 
        'Cod.: 7845164', 
        'images/coke.jpg', 
        'Bebida', 
        'Coca-Cola Comapany', 
        'R$ 1,99'
      )"
    >
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/coke.jpg') }}" alt="Produto">
      </div>
      <h4>Coca-cola</h4>
      <small>R$ 1,99</small>
    </div>
  </div>
  <div class="card-product" >
    <span class="locked" id='21' onclick="unlockFood('21')">
      <img src="{{ asset('images/lock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Milkshake', 
        'Cod.: 45813579', 
        'images/coke.jpg', 
        'Bebida', 
        'Boobs', 
        'R$ 10,00'
      )"
    >
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/milkshake.jpg') }}" alt="Produto">
      </div>
      <h4>Milkshake</h4>
      <small>R$ 10,00</small>
    </div>
    </div>
    </div>
  </div>
  </div>
  {{-- @endfor --}}
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
          <h3>Ingredientes</h3>
          <div class="ingredients-list">
           <p id="description">
           </p>
          </div>
          <h3>Preço</h3>
          <small id="price"></small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <a type="button" class="btn btn-primary" href="{{Route('adm_edit_prod')}}">Editar</a>
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
        <form action="#" method="POST">
          @csrf
          <div class="image-info">
            <div class="info-base">
              <div class="label-float">
                <input type="text" required name="nome" value="" id="nome" onchange="isNotEmpty('nome')" placeholder=" "/>
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
                <input type="text" required name="codigo" value="" id="codigo" onchange="isNotEmpty('codigo')" placeholder=" " />
                <label>Código</label>
              </div>
            </div>

            <button class="btn-img"> 
              <label for="image">Selecionar imagem  </label>
            </button>
            <input type="file" required name="image" id="image" accept="image/gif, image/jpeg"/>
          </div>

          <div class="label-float" id="comida-card">
            <textarea type="textarea" required name="ingredientes" id="ingredientes" onchange="isNotEmpty('ingredientes')" value=""name="" id="">
            </textarea>
            <label>Ingredientes</label>
          </div>

          <div class="label-float disable" id="bebida-card">
            <input type="text" name="fornecedor" required id="fornecedor" onkeyup="isNotEmpty('codigo')" value="" placeholder=" "/>
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
<script src="{{ asset('js/Home/home.js') }}"></script>
<script src="{{ asset('js/components/new_product_card.js') }}"></script>
<script src="{{ asset('js/components/modal_detail.js') }}"></script>
