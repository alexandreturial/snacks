@extends('layouts.responsible.app')

@section('content')
  <div class="new-deposit">
    <h3>{{$aluno->nome}}</h3>
    <h3>Saldo atual: R$ {{number_format($aluno->saldo, 2, ',', ',')}}</h3>
    <form action="{{Route('resp_new_deposit')}}" method="post">
      @csrf
      <input type="hidden" name="id" required id="id" value="{{$aluno->id}}" placeholder=" "/>

      <div class="label-float">
        <input type="text" name="preco" required id="preco" onkeyup="moneyCurrent('preco')" value="" placeholder=" "/>
        <label>Valor</label>
      </div>

      <button type="submit" class="btn btn-primary">Depositar</button>
    </form>
  </div>
@endsection

<script src="{{ asset('js/Home/home.js') }}"></script>

