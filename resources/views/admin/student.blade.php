@extends('layouts.adm.app')

@section('content')

<div class="options">
  <div class="label-float">
    <input type="text" required name="busca"  value="" id="busca" onkeyup="searchStudent('busca')" placeholder=" "/>
    <label>Buscar Aluno</label>
  </div>
</div>
<div class="cards" id="cards">
 @foreach($aluno as $item)
  <div class="card">
    <div class="content-user not-click" data-toggle="modal" data-target="#modalDetail">
      <h4>{{$item->nome}}</h4>
      <h5>Saldo: R$ {{number_format($item->saldo, 2, ',', ',')}}</h5>
    </div>
  </div>
  @endforeach
</div>
@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>