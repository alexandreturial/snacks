function loadvalues(nameVal, cpfVal, emailVal, phoneVal){
  let name = document.getElementById("name");
  let cpf = document.getElementById("cpf");
  let emailel = document.getElementById("e-mail");
  let phone = document.getElementById("phone");
  
  
  name.textContent = nameVal;
  cpf.textContent = cpfVal;
  emailel.textContent = emailVal;
  phone.textContent = phoneVal;
}