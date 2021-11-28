function filterDate(){
  let initDate = document.getElementById('inicio').value;
  let finalDate = document.getElementById('fim').value;
  console.log(initDate, finalDate);

  var token = $('meta[name="csrf-token"]').attr('content');
    const xhttp = new XMLHttpRequest();
    xhttp.open(
      "POST", "/student/extract-by-date", true
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
    })
  );
  
}

function injectExtract(products){
  let elements = document.getElementsByClassName("card-extract");
  let card = document.getElementById("cards-extract");
 
  while(elements.length > 0){
    elements[0].parentNode.removeChild(elements[0]);
  }
 
  products = Object.values(products);

  products.map((product) =>{
    var containerDiv = document.createElement("div");

    var spanIcon = document.createElement("span");
    spanIcon.classList.add('extact-icon');
    spanIcon.classList.add('add');
    
    var iconFood = document.createElement("i");
    iconFood.classList.add('fa');
    iconFood.classList.add('fa-plus');

    spanIcon.appendChild(iconFood);
    
    var itenDiv = document.createElement("div");
    itenDiv.id = "card-extract";
    itenDiv.classList.add('card-extract');
    itenDiv.appendChild(spanIcon);

    var titleDiv = document.createElement("h4");
    let dateArray = product[0].datahora.split("-");
    let dateFormat = dateArray[2]+"/"+dateArray[1]+"/"+dateArray[0];
    
    var title = document.createTextNode(dateFormat);
    titleDiv.appendChild(title);
    containerDiv.appendChild(titleDiv);

    product.map((item) =>{
      var priceDiv = document.createElement("small");
      var preco = document.createTextNode(new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(item.valor));
      priceDiv.appendChild(preco);
      containerDiv.appendChild(priceDiv);
    });

    itenDiv.appendChild(containerDiv);
    card.appendChild(itenDiv);
    
  });
}