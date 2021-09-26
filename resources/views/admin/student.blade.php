@extends('layouts.adm.app')

@section('content')
<div class="options">
  <div class="label-float">
    <input type="text" required name="busca" value="" id="busca" onchange="isNotEmpty('busca')" placeholder=" "/>
    <label>Buscar Produto</label>
  </div>
</div>
<div class="cards">
 @for($i=0; $i < 10; $i++)
  <div class="card">
    <div class="content-user" data-toggle="modal" data-target="#modalDetail">
      <h4>Alexandre Silva Turial de Brito</h4>
      <h5>Saldo: R$ 40</h5>
    </div>
  </div>
  @endfor
</div>
@endsection
<script src="{{ asset('js/Home/home.js') }}"></script>