@extends('layouts.student.app')

@section('content')
<div class="extact-page">
  <h4>{{session()->all()['nome']}}</h4>
  <small>Saldo atual: R$ {{number_format($aluno->saldo, 2, ',', ',')}}</small>
  
  <div class="date-filter-deposit">
    <form action="">
      <div class="label-float">
        <label>data de inicio</label>
        <input type="date" value="" required id="inicio" placeholder=""/>
      
      </div>
      <div class="label-float">
        <label>data do final</label>
        <input type="date" value="" required id="fim" placeholder=" " />
        
      </div>
      <button type="button" onclick="filterDate()" class="btn btn-primary">Buscar</button>

    </form>
  </div>
  <div id="cards-extract">
    @foreach($deposito as $key => $item)
    <div class="card-extract" id="card-extract">
      <span class="extact-icon add">
        <i class="fa fa-plus"></i>
      </span>
      <div>
        <h4>{{$key}}</h4>
        @foreach($item as $val)
        <small>R$ {{number_format($val['valor'], 2, ',', ',')}}</small>
        @endforeach
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

<script src="{{ asset('js/student/extract.js') }}"></script>
