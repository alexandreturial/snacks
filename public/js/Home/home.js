function unlockFood(id) {

  var element = document.getElementById(id);

  
  if (element.classList.value == 'locked') {
    if(confirm("Deseja desbloquear o produto?")){
      element.classList.remove('locked');
      element.classList.add('unlocked');

      element.querySelector("img").src = '/images/unlock.svg'
    }
    
  } else {
    if(confirm("Deseja bloquear o produto?")){
      element.classList.remove('unlocked');
      element.classList.add('locked');
  
      element.querySelector("img").src = '/images/lock.svg'
    }
   
  }

}

function isNotEmpty(id) {
  var element = document.getElementById(id);

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

function moneyCurrent(id) {
  var elemento = document.getElementById(id);
  var valor = elemento.value;

  valor = valor + '';
  
  //Remove qualquer caractere q nao for um numero
  valor = parseInt(valor.replace(/[\D]+/g, ''));
  valor = valor + '';

  //adicona a virgula com duas casas decimais
  valor = valor.replace(/([0-9]{2})$/g, ",$1");

  //verifica se o numro esta na casa do milhar apra add o ponto
  if (valor.length > 6) {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

  }

  elemento.value = 'R$ ' + valor;
  if (valor == 'NaN') elemento.value = '';
  isNotEmpty(id);
}


function foneFormat(id) {
  var elemento = document.getElementById(id);
  var valor = elemento.value;

  valor = valor + '';
  
  //Remove qualquer caractere q nao for um numero
  valor = parseInt(valor.replace(/[\D]+/g, ''));
  valor = valor + '';

  //formata o numero (xx) xxxxx-xxxx
  valor = valor.replace(/([0-9]{2})([0-9]{5})([0-9]{4}$)/g, '($1) $2-$3');


  elemento.value = valor;
  if (valor == 'NaN') elemento.value = '';
  isNotEmpty(id);
}

function cpfFormat(id) {
  var elemento = document.getElementById(id);
  var valor = elemento.value;

  valor = valor + '';
  
  //Remove qualquer caractere q nao for um numero
  valor = parseInt(valor.replace(/[\D]+/g, ''));
  valor = valor + '';

  //formata o numero (xx) xxxxx-xxxx
  valor = valor.replace(/([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2}$)/g, '$1.$2.$3-$4');


  elemento.value = valor;
  if (valor == 'NaN') elemento.value = '';
  isNotEmpty(id);
}