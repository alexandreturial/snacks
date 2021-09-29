function loadvalues(nameVal, codeVal, imgVal, typeVal, descriptionVal, priceVal){
  let name = document.getElementById("name");
  let code = document.getElementById("code");
  let type = document.getElementById("type");
  let description = document.getElementById("description");
  let price = document.getElementById("price");
  
  let title = document.getElementById("description-type");
  
  title.textContent = typeVal == 'Bebida' ? 'Fornecedor' : 'Ingredientes';

  name.textContent = nameVal;
  code.textContent = codeVal;
  // img.src = imgVal;
  type.textContent = typeVal;
  description.textContent = descriptionVal;
  price.textContent = priceVal;
  $("#produto-image-detail").attr("src", imgVal);
}