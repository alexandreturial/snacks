@extends('layouts.responsible.app')

@section('content')
  <div class="new-deposit">
    <h3>Alexandre</h3>
    <h3>Saldo atual: R$ 20,00</h3>
    <form action="#">
      <div class="label-float">
        <input type="text" name="preco" required id="preco" onkeyup="moneyCurrent('preco')" value="" placeholder=" "/>
        <label>Preço</label>
      </div>

      <button type="submit" class="btn btn-primary">Depositar</button>
    </form>
  </div>
@endsection

<script src="{{ asset('js/Home/home.js') }}"></script>

