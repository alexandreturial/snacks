function loadvalues(nameVal, cpfVal, emailVal, phoneVal, id){
  console.log(nameVal);
  let name = document.getElementById("name");
  let cpf = document.getElementById("cpf");
  let emailel = document.getElementById("e-mail");
  let phone = document.getElementById("phone");
  let a = document.getElementById('edit-responsible'); //or grab it by tagname etc
  let btn = document.getElementById('remove-responsible');
  
  name.textContent = nameVal;
  cpf.textContent = cpfVal;
  emailel.textContent = emailVal;
  phone.textContent = phoneVal;

  a.href = `/admin/edit/${id}`;
  btn.href = `/admin/remove/${id}`;
}