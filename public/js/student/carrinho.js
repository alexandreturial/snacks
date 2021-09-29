// let elemento = document.querySelector('#contador');
// let elemento = document.querySelector('#add');
// let elemento = document.querySelector('#less');


function add(id){
  let elemento = document.getElementById("quantity"+id);
  let contador = parseFloat(elemento.textContent, 10);
  contador += 1;
  elemento.textContent = contador;
}

function less(id){
  let elemento = document.getElementById("quantity"+id);
  let contador = parseFloat(elemento.textContent, 10);
  contador -= 1;
  if(contador > 0){
    elemento.textContent = contador;
  }else{
    remove(id);
    
  }
 
}

function remove(id){
  var el = document.getElementById("item"+id);
  el.remove();
}

function total(preco){
  var el = document.getElementById("totalcarrinho");
  
  val = el.textContent.replace('Total: R$', '');
  val = val.replace(',', '.');
  val = parseFloat(val);
  newValue = val + preco;
  
  if(newValue >= 0){
    val += preco;
  }
  if(val <= 0){
    isEmpty();
  }
  val = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(val);

  el.textContent = 'Total: ' + val;
}


function isEmpty(){
  let carrinho = document.getElementById("carrinho");
  var text = document.createElement("h3");
  text.id = "empty-cart";
  var title = document.createTextNode("Carrinho Vazio");

  text.appendChild(title);
  carrinho.appendChild(text);

  let btnBuy = document.getElementById("buy-btn");
  btnBuy.classList.add('disable');
}

function newElement(nome, valor, id) {
  let carrinho = document.getElementById("carrinho");
  var itenDiv = document.createElement("div");
  itenDiv.classList.add('card-consumption');
  itenDiv.id = "item"+id;

  var spanIcon = document.createElement("span");
  spanIcon.classList.add('consumption-icon');
  var iconFood = document.createElement("i");
  iconFood.classList.add('fa');
  iconFood.classList.add('fa-cutlery');

  var contentDiv = document.createElement("div");
  var titleDiv = document.createElement("h4");
  var priceDiv = document.createElement("span");
  
  var handleQuantityDiv = document.createElement("div");
  handleQuantityDiv.classList.add('quantity-menu');

  var addIcon = document.createElement("span");
  addIcon.addEventListener("click", function(event){
    event.preventDefault(); 
    add(id);
    total(valor);
  });
  var iconAdd = document.createElement("i");
  iconAdd.classList.add('fa');
  iconAdd.classList.add('fa-plus');
  

  var quantityValue = document.createElement("small");
  quantityValue.id = "quantity"+id;

  var lessIcon = document.createElement("span");
  lessIcon.addEventListener("click", function(event){
    event.preventDefault(); 
    less(id);
    total(valor * -1);
  });
  var iconLess = document.createElement("i");
  iconLess.classList.add('fa');
  iconLess.classList.add('fa-minus');

  var removeDiv = document.createElement("div");
  removeDiv.classList.add('quantity-menu');
  var removeIcon = document.createElement("span");
  removeIcon.addEventListener("click", function(event){
    event.preventDefault(); 
    var quatityItem = document.getElementById("quantity"+id).textContent;
    remove(id);
    total(valor * -1 * quatityItem);
  });
  var iconRemove = document.createElement("i");
  iconRemove.classList.add('fa');
  iconRemove.classList.add('fa-trash');
  
  var title = document.createTextNode(nome);
  var preco = document.createTextNode(  val = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(valor));
  var quantidade = document.createTextNode(1);
  
  titleDiv.appendChild(title);
  priceDiv.appendChild(preco);
  quantityValue.appendChild(quantidade);
  
  
  itenDiv.appendChild(spanIcon);
  spanIcon.appendChild(iconFood);
  itenDiv.appendChild(contentDiv);
  itenDiv.appendChild(handleQuantityDiv);
  itenDiv.appendChild(removeDiv);

  contentDiv.appendChild(titleDiv);
  contentDiv.appendChild(priceDiv);
  
  handleQuantityDiv.appendChild(lessIcon);
  lessIcon.appendChild(iconLess);
  handleQuantityDiv.appendChild(quantityValue);
  handleQuantityDiv.appendChild(addIcon);
  addIcon.appendChild(iconAdd);
 
  removeDiv.appendChild(removeIcon); 
  removeIcon.appendChild(iconRemove);

  carrinho.appendChild(itenDiv);

  total(valor);

  alert("Produto adicionado com sucesso!");

  let btnBuy = document.getElementById("buy-btn");
  btnBuy.classList.remove('disable');

  var el = document.getElementById("empty-cart");
  el.remove();
} 