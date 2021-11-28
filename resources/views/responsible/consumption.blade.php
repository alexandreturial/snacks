@extends('layouts.responsible.app')

@section('content')

<div class="consumption-page">
  <h4>Consumo de {{$aluno->nome}} </h4>
  <small>Saldo atual: R$ {{number_format($aluno->saldo, 2, ',', ',')}}</small>
  <div>
    <form action="">
      <div class="label-float">
        <label>data de inicio</label>
        <input type="date" value="" required id="inicio" placeholder=""/>
      
      </div>
      <div class="label-float">
        <label>data do final</label>
        <input type="date" value="" required id="fim" placeholder=" " />
        
      </div>
      <button type="button" onclick="filterDate({{$aluno->id}})" class="btn btn-primary">Buscar</button>

    </form>
  </div>
  <div class="list-consumption" id="card-consumo">
    @foreach($produtos as $key =>$produto)
      <div class="card-consumption">
        <span class="consumption-icon">
          <i class="fa fa-cutlery"></i>
        </span>
        <div>
          <h4>{{$key}}</h4>
          @foreach($produto as $item)

            <small>{{$item->quantidade}}x {{$item->nome}}  - R$ {{number_format($item->preco, 2, ',', ',')}} - R$ {{number_format(floatval($item->quantidade) * floatval($item->preco), 2, ',', ',')}}</small>
        
          @endforeach
        </div>
      </div>
    @endforeach
  </div>

</div>
@endsection
<script src="{{ asset('js/responsible/consumisption.js') }}"></script>
