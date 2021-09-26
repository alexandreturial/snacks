
<aside id="aside" >
  <div class="custom-menu">
    <button type="button" id="sidebarCollapse" onclick="showMenu()" class="btn btn-primary">
      <i class="fa fa-bars"></i>
    </button>
  </div>
  <div class="user-info">
    <img src="#" alt="avatar">
      <small>Name</small>
        <small>Responsável</small>
        </div>
        <div class="user-menu">
          <input type="radio" id="produto" name="menu-option"/>
          <a for="produto" href="/responsible/">Produtos</a>

          {{-- <input type="radio" id="responsavel" name="menu-option"/>
          <a for="responsavel" href="/responsible/edit">Responsável</a> --}}

          <input type="radio" id="alunos" name="menu-option"/>
          <a for="alunos" href="/responsible/student" >Alunos</a>
        </div>
  </aside>

  <script src="{{ asset('js/Aside/aside_res.js') }}"></script>
