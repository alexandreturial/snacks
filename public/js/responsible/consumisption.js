function filterDate(id){
  let initDate = document.getElementById('inicio').value;
  let finalDate = document.getElementById('fim').value;
  console.log(initDate, finalDate);

  var token = $('meta[name="csrf-token"]').attr('content');
    const xhttp = new XMLHttpRequest();
    xhttp.open(
      "POST", "/responsible/consumption-by-date", true
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
          let response = JSON.parse(xhttp.response);
          
          injectExtract(response);
        }
    }

    xhttp.send(JSON.stringify({
      'initDate': initDate,
      'finalDate': finalDate,
      'id': id
    })
  );
  
}

function injectExtract(products){
  let elements = document.getElementsByClassName("card-consumption");
  let card = document.getElementById("card-consumo");
  

  while(elements.length > 0){
    elements[0].parentNode.removeChild(elements[0]);
  }
 
  products = Object.values(products);

  products.map((product) =>{
    var containerDiv = document.createElement("div");
    containerDiv.classList.add('card-consumption');

    var spanIcon = document.createElement("span");
    spanIcon.classList.add('consumption-icon');
    spanIcon.classList.add('add');
    
    var iconFood = document.createElement("i");
    iconFood.classList.add('fa');
    iconFood.classList.add('fa-cutlery');

    spanIcon.appendChild(iconFood);
    containerDiv.appendChild(spanIcon);

    var titleDiv = document.createElement("h4");
    let dateArray = product[0].datahora.split("-");
    let dateFormat = dateArray[2]+"/"+dateArray[1]+"/"+dateArray[0];
    
    var title = document.createTextNode(dateFormat);
    titleDiv.appendChild(title);
    containerDiv.appendChild(titleDiv);

    product.map((item) =>{
      var priceDiv = document.createElement("small");
      var preco = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(item.preco);
      
      var totalCompra = item.preco * item.quantidade;
      var total = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(totalCompra);
     
      var item = document.createTextNode(`${item.quantidade}x ${item.nome} - ${preco} - ${total}`);
      priceDiv.appendChild(item);
      containerDiv.appendChild(priceDiv);
    });

    card.appendChild(containerDiv);
    
  });
}