@extends('layouts.responsible.app')

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
      <div class="card-consumption">
        <span class="consumption-icon">
          <i class="fa fa-cutlery"></i>
        </span>
        <div>
          <h4>25/08/2020</h4>
          <small>2x Pão com ovo  - R$ 4,00 - R$ 8,00</small>
          <small>3x Cerverja amanteigada - R$ 2,00 -  R$ 6,00</small>
          <small>milkshake - R$ 10,00 </small>
        </div>
      </div>
      <div class="card-consumption">
        <span class="consumption-icon">
          <i class="fa fa-cutlery"></i>
        </span>
        <div>
          <h4>06/04/2020</h4>
          <small>Pão com ovo  - R$ 4,00.</small>
          <small>milkshake - R$ 10,00 </small>
        </div>
      </div>
      <div class="card-consumption">
        <span class="consumption-icon">
          <i class="fa fa-cutlery"></i>
        </span>
        <div>
          <h4>06/04/2020</h4>
          <small> 3x Cerverja amanteigada - R$ 2,00 -  R$ 6,00</small>
          <small> 2x Cerverja amanteigada - R$ 2,00 -  R$ 4,00 </small>
        </div>
      </div>
  </div>

</div>
@endsection
