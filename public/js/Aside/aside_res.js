function menuSelect(page){
  if(page == 'resp_index'){
    document.getElementById("produto").checked = true;
    // document.getElementById("responsavel").checked = false;
    document.getElementById("alunos").checked = true;

  }else if(
    page == 'resp_index' ||
    page == 'resp_student' || 
    page == 'resp_edit' || 
    page == 'resp_detail' ||
    page == 'resp_deposit' || 
    page == 'resp_extract' ||
    page == 'resp_consumption'
    ){
    document.getElementById("produto").checked = false;
    // document.getElementById("responsavel").checked = true;
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