
<aside id="aside" >
  <div class="custom-menu">
    <button type="button" id="sidebarCollapse" onclick="showMenu()" class="btn btn-primary">
      <i class="fa fa-bars"></i>
    </button>
  </div>
  <div class="user-info">
    <div class="user-img">
      <img src="{{ asset('images/southpark.png') }}" alt="avatar">
    </div>
      
      <small>{{session()->all()['nome']}}</small>
        <small>Funcionário</small>
        </div>
        <div class="user-menu">
          <input type="radio" id="produto" name="menu-option"/>
          <a for="produto" href="{{ route('adm_index') }}">Produtos</a>
          

          <input type="radio" id="responsavel" name="menu-option"/>
          <a for="responsavel" href="{{ route('adm_responsible') }}">Responsável</a>

          <input type="radio" id="alunos" name="menu-option"/>
          <a for="responsavel" href="{{ route('adm_student') }}">Alunos</a>

          <input type="radio" id="logout" name="menu-option"/>
          <a for="responsavel" href="{{ route('logout') }}">Sair</a>
        </div>
  </aside>
  <script src="{{ asset('js/Aside/aside.js') }}"></script>

