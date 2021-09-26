function menuSelect(page){
  if(page == 'adm_index'|| page == 'adm_edit_prod'){
    document.getElementById("produto").checked = true;
    document.getElementById("responsavel").checked = false;
    document.getElementById("alunos").checked = false;

  }else if(page == 'adm_responsible' || page == 'adm_edit_res'){
    document.getElementById("produto").checked = false;
    document.getElementById("responsavel").checked = true;
    document.getElementById("alunos").checked = false;

  }else{
    document.getElementById("produto").checked = false;
    document.getElementById("responsavel").checked = false;
    document.getElementById("alunos").checked = true;

  }
}

function showMenu() {
  var element = document.getElementById("aside");
  if (element.classList.contains('active')) {
    element.classList.remove("active");
  }else{
    element.classList.add("active");

  }
}