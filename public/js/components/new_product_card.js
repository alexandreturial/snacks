function isDrink(id) {
  
  var element = document.getElementById(id);

  var comida = document.getElementById("comida-card");
  var bebida = document.getElementById("bebida-card");

  if (id == 'comida') {
    comida.classList.remove('disable');
    bebida.classList.add('disable');
  } else {
    bebida.classList.remove('disable');
    comida.classList.add('disable');
  }

  if (element.value.trim() != '') {
    if (element instanceof HTMLTextAreaElement) {
      element.classList.add('not-empty-area');
    } else {
      element.classList.add('not-empty');
    }
  } else {
    if (element instanceof HTMLTextAreaElement) {
      element.classList.remove('not-empty-area');
    } else {
      element.classList.remove('not-empty');
    }
  }

}