function showmodal(id) {
  
  $('#select-son').modal("show");

  $('#btn-save-data').on('click' , function() { 

    unlock(id);
  });

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

function unlockFood(id, idAluno){

  var element = $('#'+id);
  
  var token = $('meta[name="csrf-token"]').attr('content');
  var element = document.getElementById(id);

  const xhttp = new XMLHttpRequest();
  xhttp.open(
    "POST", "/responsible/block-prduct", true
    );
  // Envia a informação do cabeçalho junto com a requisição.
  xhttp.setRequestHeader(
    "Content-Type", 
    "application/json",
  );
  xhttp.setRequestHeader(
    "X-CSRF-TOKEN", 
    `${token}`,
  );

  
  
  if (element.classList.value == 'locked') {
    if(confirm("Deseja desbloquear o produto?")){
      xhttp.send(JSON.stringify({'id': id, 'idAluno': idAluno}));

      // element.classList.remove('locked');
      // element.classList.add('unlocked');
      // element.querySelector("img").src = '/images/unlock.svg'
    }
    
  } else {
    if(confirm("Deseja bloquear o produto?")){
  
      xhttp.send(JSON.stringify({'id': id, 'idAluno': idAluno}));
      
      // element.classList.remove('unlocked');
      // element.classList.add('locked');
      // element.querySelector("img").src = '/images/lock.svg'
    }
   
  }

  xhttp.onreadystatechange = function() { // Chama a função quando o estado mudar.
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      
      if(JSON.parse(xhttp.response) == 1){
        element.classList.remove('locked');
        element.classList.add('unlocked');
  
        element.querySelector("img").src = '/images/unlock.svg';

      }else{
        element.classList.remove('unlocked');
        element.classList.add('locked');
    
        element.querySelector("img").src = '/images/lock.svg';
      }
    }
  }
}

// ESTUDANTE
function searchStudent(id){
  var element = document.getElementById(id);
  var token = $('meta[name="csrf-token"]').attr('content');

 
    const xhttp = new XMLHttpRequest();
    xhttp.open(
      "POST", "/responsible/search-student", true
      );
    // Envia a informação do cabeçalho junto com a requisição.
    xhttp.setRequestHeader(
      "Content-Type", 
      "application/json",
    );
    xhttp.setRequestHeader(
      "X-CSRF-TOKEN", 
      `${token}`,
    );

    xhttp.onreadystatechange = function() { // Chama a função quando o estado mudar.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Requisição finalizada. Faça o processamento aqui.
            
            newStudent(JSON.parse(xhttp.response));
        }
    }

    
    xhttp.send(JSON.stringify({'search': element.value}));
   
}


function newStudent(students){
  const elements = document.getElementsByClassName('card');
  while(elements.length > 0){
      elements[0].parentNode.removeChild(elements[0]);
  }

  let cards = document.getElementById("cards");
 
 
  students.map((student) =>{
    
    var itenDiv = document.createElement("div");
    itenDiv.classList.add('card');
   
    var contentDiv = document.createElement("div");
    contentDiv.classList.add('content-user');
    contentDiv.classList.add('not-click');
    
    
    var titleFood = document.createElement("h4");
    var title = document.createTextNode(student.nome);
    titleFood.appendChild(title);
    contentDiv.appendChild(titleFood);

    var smallFood = document.createElement("small");
    var small = document.createTextNode(`Matricula: ${student.matricula}`);
    smallFood.appendChild(small);
    contentDiv.appendChild(smallFood);

    var btnDetail = document.createElement("a");
    btnDetail.classList.add('btn');
    btnDetail.classList.add('btn-primary');
    btnDetail.href = `responsible/detail/${student.id}`; 

    var small = document.createTextNode("detalhe");
    btnDetail.appendChild(small);
    contentDiv.appendChild(btnDetail);

    itenDiv.appendChild(contentDiv);
    cards.appendChild(itenDiv);
  });
}


function searchProduct(id, idAluno) {
  var element = document.getElementById(id);
  var token = $('meta[name="csrf-token"]').attr('content');

    const xhttp = new XMLHttpRequest();
    xhttp.open(
      "POST", "/responsible/search-product", true
      );
    // Envia a informação do cabeçalho junto com a requisição.
    xhttp.setRequestHeader(
      "Content-Type", 
      "application/json",
    );
    xhttp.setRequestHeader(
      "X-CSRF-TOKEN", 
      `${token}`,
    );

    xhttp.onreadystatechange = function() { // Chama a função quando o estado mudar.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          newcardProduct(JSON.parse(xhttp.response));
        }
    }

    xhttp.send(JSON.stringify({'search': element.value, 'idAluno': idAluno}));

}

function newcardProduct(products){
  const elements = document.getElementsByClassName('card-product');
  while(elements.length > 0){
      elements[0].parentNode.removeChild(elements[0]);
  }

  let cards = document.getElementById("cards-product");
  cards.classList.add('cards');
 
 
  products.map((product) =>{
    
    var itenDiv = document.createElement("div");
    itenDiv.classList.add('card-product');

    var spanIcon = document.createElement("span");
    
   
    spanIcon.id = product.codigo;
    spanIcon.addEventListener("click", function(event){
      event.preventDefault(); 
      unlockFood(product.codigo);
    });

    var iconlock = document.createElement("img");
    
    if(product.isBlock){
      iconlock.src = '/images/lock.svg';
      spanIcon.classList.add('locked');
    }else{
      iconlock.src = '/images/unlock.svg';
      spanIcon.classList.add('unlocked');
    }
    

    spanIcon.appendChild(iconlock);
    itenDiv.appendChild(spanIcon);
  
    var contentDiv = document.createElement("div");
    contentDiv.setAttribute("data-toggle", "modal");
    contentDiv.dataset.target = "#descriptionModal";
    contentDiv.addEventListener("click", function(event){
      event.preventDefault(); 
      loadvalues(product.codigo);
    });
    var divImageFood = document.createElement("div");
    divImageFood.classList.add('img-product');

    var imageFood = document.createElement("img");
    imageFood.id = 'produto-image';
    imageFood.src = `/images/produtos/${product.codigo}/${product.foto}`;
    divImageFood.appendChild(imageFood);

    contentDiv.appendChild(divImageFood);
    itenDiv.appendChild(contentDiv);

    var titleFood = document.createElement("h4");
    var title = document.createTextNode(product.nome);
    titleFood.appendChild(title);
    contentDiv.appendChild(titleFood);

    var smallFood = document.createElement("small");
    var small = document.createTextNode(`R$ ${product.preco}`);
    smallFood.appendChild(small);
    contentDiv.appendChild(smallFood);

    cards.appendChild(itenDiv);


  });
}