@extends('layouts.responsible.app')

@section('content')

<div class="student-name">
  <h4>{{$aluno->nome}}</h4>
  <h5>Saldo: R$ {{number_format($aluno->saldo, 2, ',', ',')}}</h5>
</div>
<div class="info-student">
  <div class="box-info">
    <small>Matricula: {{$aluno->matricula}}</small>
    <small>Telefone: {{$aluno->telefone}}</small>
   
  </div>
  <div class="box-info">
    <small>Turma: {{$aluno->turma}}</small>
    <small>Turno: {{$aluno->turno}}</small>
    <small>Email: {{$aluno->email}}</small>
  </div>
</div>

<hr>
<div class="option-student">
  
  <a href="{{Route('resp_deposit', $aluno->id)}}" type="button" class="btn">Depositar</a>
  <a href="{{Route('resp_extract', $aluno->id)}}" type="button" class="btn">Extrato</a>
  <a href="{{Route('resp_consumption', $aluno->id)}}" type="button" class="btn">Consumo</a>
  <a href="{{Route('resp_edit', $aluno->id)}}" type="button" class="btn">Editar</a>
</div>

<hr>
<h4>Produtos</h4>

<div class="options">
  <div class="label-float">
    <input type="text" required name="busca" value="" id="busca" onKeyup="searchProduct('busca', {{$aluno->id}})" placeholder=" "/>
    <label>Buscar Produtos para bloquear</label>
  </div>
</div>
<div class="cards"  id="cards-product">
  @foreach($produtos as $item)
  <div class="card-product" >
    @if($item->isBlock == false)
    <span class="unlocked" id={{$item->codigo}} onclick="unlockFood('{{$item->codigo}}', {{$aluno->id}})">
      <img src="{{ asset('images/unlock.svg') }}" alt="">
    </span>
    @else
    <span class="locked" id={{$item->codigo}} onclick="unlockFood('{{$item->codigo}}', {{$aluno->id}})">
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
        <img id="produto-image" src="{{ asset('images/produtos/'.$item->codigo.'/'.$item->foto) }}" alt="Produto">
      </div>
      <h4>{{$item->nome}}</h4>
      <small>R$ {{number_format($item->preco, 2, ',', ',')}}</small>
    </div>
  </div>
  @endforeach
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
<!-- <script src="{{ asset('js/Home/home.js') }}"></script> -->
<script src="{{ asset('js/components/modal_detail.js') }}"></script>
