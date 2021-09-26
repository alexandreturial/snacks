@extends('layouts.responsible.app')

@section('content')
<div class="extact-page">
  <h4>Alexandre </h4>
  <small>Saldo atual: R$ 40,00</small>
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
      <button type="submit" class="btn btn-primary">Buscar</button>

    </form>
  </div>
  <div>
    <div class="card-extract">
      <span class="extact-icon add">
        <i class="fa fa-plus"></i>
      </span>
      <div>
        <h4>25/06/2021</h4>
        <small>R$ 5,00</small>
        <small>R$ 15,00</small>
        <small>R$ 10,00</small>
      </div>
    </div>
    <div class="card-extract">
      <span class="extact-icon add">
        <i class="fa fa-plus"></i>
      </span>
      <div>
        <h4>05/07/2021</h4>
        <small>R$ 50,00</small>
      </div>
    </div>
    <div class="card-extract">
      <span class="extact-icon add">
        <i class="fa fa-plus"></i>
      </span>
      <div>
        <h4>30/02/2021</h4>
        <small>R$ 30,00</small>
        <small>R$ 40,00</small>
      </div>
    </div>
  </div>

</div>
@endsection
