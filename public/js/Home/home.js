
function search(id) {
  var element = document.getElementById(id);
  var token = $('meta[name="csrf-token"]').attr('content');

  if(element.value.length >= 3){
    const xhttp = new XMLHttpRequest();
    xhttp.open(
      "POST", "admin/search", true
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

    xhttp.send(JSON.stringify({'search': element.value}));
  
  }else{
    const xhttp = new XMLHttpRequest();
    xhttp.open(
      "GET", "products", true
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

    xhttp.send();
  }
 
}

function searchResponsible(id){
  var element = document.getElementById(id);
  var token = $('meta[name="csrf-token"]').attr('content');

 
    const xhttp = new XMLHttpRequest();
    xhttp.open(
      "POST", "/admin/search-resp", true
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
          newResposible(JSON.parse(xhttp.response))
        }
    }

    
    xhttp.send(JSON.stringify({'search': element.value}));
  
  
 
}

function selectImage(id){
  var imgInp = document.getElementById(id);
  var preview_img = document.getElementById("produto-image-new");
  var preview = document.getElementById("preview");
  var btn_img = document.getElementById("btn-img");
  
  const [file] = imgInp.files
  if (file) {
    preview_img.src = URL.createObjectURL(file)

    preview.classList.remove('hide-img');
    btn_img.classList.add('hide-img');
  }


}

function newcardProduct(products){
  const elements = document.getElementsByClassName('card-product');
  while(elements.length > 0){
      elements[0].parentNode.removeChild(elements[0]);
  }

  let cards = document.getElementById("cards-product");
  cards.classList.add('cards');
 
 
  products.map((product) =>{
    console.log(product.nome);
    var itenDiv = document.createElement("div");
    itenDiv.classList.add('card-product');

    var spanIcon = document.createElement("span");
    spanIcon.classList.add('locked');
    spanIcon.id = product.codigo;
    spanIcon.addEventListener("click", function(event){
      event.preventDefault(); 
      unlockFood(product.codigo);
    });

    var iconlock = document.createElement("img");
    iconlock.src = 'images/lock.svg';
  
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
    imageFood.src = `/images/${product.foto}`;
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

function newResposible(responsibles){
  const elements = document.getElementsByClassName('card');
  while(elements.length > 0){
      elements[0].parentNode.removeChild(elements[0]);
  }

  let cards = document.getElementById("cards");
 
 
  responsibles.map((responsible) =>{
    console.log(responsible);
    var itenDiv = document.createElement("div");
    itenDiv.classList.add('card');
   
    var contentDiv = document.createElement("div");
    contentDiv.setAttribute("data-toggle", "modal");
    contentDiv.dataset.target = "#modalDetailRes";
    contentDiv.addEventListener("click", function(event){
      event.preventDefault(); 
      loadvalues(
        responsible.nome, 
        responsible.cpf, 
        responsible.email, 
        responsible.telefone,
        responsible.id
      );
    });
  
    var titleFood = document.createElement("h4");
    var title = document.createTextNode(responsible.nome);
    titleFood.appendChild(title);
    contentDiv.appendChild(titleFood);

    var smallFood = document.createElement("small");
    var small = document.createTextNode(responsible.telefone);
    smallFood.appendChild(small);
    contentDiv.appendChild(smallFood);

    var smallFood = document.createElement("small");
    var small = document.createTextNode(responsible.cpf);
    smallFood.appendChild(small);
    contentDiv.appendChild(smallFood);
    itenDiv.appendChild(contentDiv);
    cards.appendChild(itenDiv);
  });
}
function unlockFood(id) {
  var token = $('meta[name="csrf-token"]').attr('content');
  var element = document.getElementById(id);

  const xhttp = new XMLHttpRequest();
  xhttp.open(
    "POST", "admin/block-prduct", true
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

  if (element.classList.value == 'locked') {
    if(confirm("Deseja desbloquear o produto?")){
      xhttp.send(JSON.stringify({'id': id}));

      // element.classList.remove('locked');
      // element.classList.add('unlocked');
      // element.querySelector("img").src = '/images/unlock.svg'
    }
    
  } else {
    if(confirm("Deseja bloquear o produto?")){
  
      xhttp.send(JSON.stringify({'id': id}));
      
      // element.classList.remove('unlocked');
      // element.classList.add('locked');
      // element.querySelector("img").src = '/images/lock.svg'
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

function moneyFormat(value) {
  valor = value + '';
  
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

// ESTUDANTE
function searchStudent(id){
  var element = document.getElementById(id);
  var token = $('meta[name="csrf-token"]').attr('content');

 
    const xhttp = new XMLHttpRequest();
    xhttp.open(
      "POST", "/admin/search-student", true
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

function searchStudnet(id){
  var element = document.getElementById(id);
  var token = $('meta[name="csrf-token"]').attr('content');

  if(element.value.length >= 3){
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
            console.log(element.value);
        }
    }
   
  
    xhttp.send(JSON.stringify({'search': element.value}));
    
  }
 
}

function newStudent(students){
  const elements = document.getElementsByClassName('card');
  while(elements.length > 0){
      elements[0].parentNode.removeChild(elements[0]);
  }

  let cards = document.getElementById("cards");
 
 
  students.map((student) =>{
    console.log(student);
    var itenDiv = document.createElement("div");
    itenDiv.classList.add('card');
   
    var contentDiv = document.createElement("div");
    contentDiv.classList.add('content-user');
    contentDiv.classList.add('not-click');
    
    
    var titleFood = document.createElement("h4");
    var title = document.createTextNode(student.nome);
    titleFood.appendChild(title);
    contentDiv.appendChild(titleFood);

    var smallFood = document.createElement("h5");
    var small = document.createTextNode(`Saldo: R$ ${student.saldo}`);
    smallFood.appendChild(small);
    contentDiv.appendChild(smallFood);

    itenDiv.appendChild(contentDiv);
    cards.appendChild(itenDiv);
  });
}