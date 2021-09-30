@extends('layouts.responsible.app')

@section('content')
<div class="student-name">
  <h4>Alexandre Silva Turial de Brito</h4>
  <h5>Saldo: R$ 20,00</h5>
</div>
<div class="info-student">
  <div class="box-info">
    <small>Matricula: 144181067</small>
    <small>Telefone: (71) 98457-1518</small>
   
  </div>
  <div class="box-info">
    <small>Turma: SSD-45</small>
    <small>Turno: Matutino</small>
    <small>Email: aleturial@gmail.com</small>
  </div>
</div>

<hr>
<div class="option-student">
  
  <a href="{{Route('resp_deposit')}}" type="button" class="btn">Depositar</a>
  <a href="{{Route('resp_extract')}}" type="button" class="btn">Extrato</a>
  <a href="{{Route('resp_consumption')}}" type="button" class="btn">Consumo</a>
  <a href="{{Route('resp_edit')}}" type="button" class="btn">Editar</a>
</div>

<hr>
<h4>Produtos</h4>
<div class="options">
  <div class="label-float">
    <input type="text" required name="busca" value="" id="busca" onchange="isNotEmpty('busca')" placeholder=" "/>
    <label>Buscar Produtos para bloquear</label>
  </div>
</div>
<div class="cards">
  <div class="card-product" >
    <span class="locked" id='15' onclick="unlockFood('15')">
      <img src="{{ asset('images/lock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
    onclick="loadvalues(
      'Pão com ovo', 
      'Cod.: 1561561', 
      '/images/food3.png', 
      'Comida', 
      'Este produto contém 4 ovos (ovos orgânicos ou caipiras), 2 colheres de sopa de vinagre de vinho branco, 2 english muffins cortados ao meio ou fatias de pão de forma branco sem casca, Um pouco de manteiga, 8 fatias de presunto, bacon ou salmão fumado e, cebolinha picada para finalizar', 
      'R$ 4,00'
      )"
    >
      <div class="img-product">
        <img id="produto-image" src="{{ asset('images/food3.png') }}" alt="Produto">
      </div>
      <h4>Pão com ovo</h4>
      <small>R$ 4,00</small>
    </div>
  </div>
  <div class="card-product" >
    <span class="unlocked" id='16' onclick="unlockFood('16')">
      <img src="{{ asset('images/unlock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Rosquinhas', 
        'Cod.: 1558525', 
        '/images/rosquinhas.jpg', 
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
    <span class="unlocked" id='17' onclick="unlockFood('17')">
      <img src="{{ asset('images/unlock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Panquecas', 
        'Cod.: 1514227', 
        '/images/panquecas.jpg', 
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
    <span class="unlocked" id='18' onclick="unlockFood('18')">
      <img src="{{ asset('images/unlock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Cupcake', 
        'Cod.: 1118247', 
        '/images/cupcake.jpg', 
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
    <span class="unlocked" id='19' onclick="unlockFood('19')">
      <img src="{{ asset('images/unlock.svg') }}" alt="">
    </span>
    <div data-toggle="modal" data-target="#descriptionModal"
      onclick="loadvalues(
        'Sorvete', 
        'Cod.: 12358478', 
        '/images/food2.png', 
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
        '/images/coke.jpg', 
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
        '/images/coke.jpg', 
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
    </div>
  </div>
</div>


@endsection
<script src="{{ asset('js/responsible/index.js') }}"></script>
<script src="{{ asset('js/Home/home.js') }}"></script>
<script src="{{ asset('js/components/modal_detail.js') }}"></script>
