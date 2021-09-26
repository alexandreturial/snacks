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
    <div data-toggle="modal" data-target="#descriptionModal">
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
    <div data-toggle="modal" data-target="#descriptionModal">
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
    <div data-toggle="modal" data-target="#descriptionModal">
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
    <div data-toggle="modal" data-target="#descriptionModal">
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
    <div data-toggle="modal" data-target="#descriptionModal">
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
    <div data-toggle="modal" data-target="#descriptionModal">
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
    <div data-toggle="modal" data-target="#descriptionModal">
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
<script src="{{ asset('js/Home/home.js') }}"></script>
