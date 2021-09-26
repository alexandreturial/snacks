
<aside id="aside" >
  <div class="logo">
    Snacks
  </div>
    <div class="user-info" >
      <div class="dropdown">
        {{-- <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          menu
        </button> --}}
        <p >Saldo: R$ 20,00</p>
        <a  href="{{ route('stu_index') }}">Loja</a>
        <a  href="{{ route('stu_extract') }}">Extrato</a>
        
        {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="{{ route('stu_index') }}">Loja</a>
          <a class="dropdown-item" href="{{ route('stu_extract') }}">Extrato</a>
          <a class="dropdown-item" href="{{ route('stu_consumption') }}">Consumo</a>
        </div> --}}
      </div>
      <div class="user-img">
        <img src="{{ asset('images/aluno.jpg') }}" alt="avatar">
      </div>
      @if(Route::currentRouteName() == 'stu_index')
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buyProduct"><i class="fa fa-shopping-cart"></i></button>
      @endif
    </div>

  {{-- <div class="user-menu">
    <input type="radio" id="alunos" name="menu-option"/>
    <a for="alunos" href="/student/edit" >Perfil</a>
  </div> --}}
</aside>
<script src="{{ asset('js/Aside/aside_std.js') }}"></script>


