@extends('layouts.student.app')

@section('content')
<div class="consumption-page">
  <h4>Consumo de Alexandre </h4>
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
  <div class="list-consumption">
    @for($i=0; $i < 3; $i++)
      <div class="card-consumption">
        <span class="consumption-icon">
          <i class="fa fa-cutlery"></i>
        </span>
        <div>
          <h4>Lanche</h4>
          <small> R$ 60,00</small>
          <small> 25/08/2020</small>
        </div>
      </div>
      <div class="card-consumption">
        <span class="consumption-icon">
          <i class="fa fa-glass"></i>
        </span>
        <div>
          <h4>Bebida</h4>
          <small>R$ 60,00</small>
          <small> 25/08/2020</small>
        </div>
      </div>
    @endfor
  </div>

</div>
@endsection
