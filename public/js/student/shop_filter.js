function isFood(){
 
 let foodCards = document.getElementById("food");
 let drinkCards = document.getElementById("drink");

  drinkCards.classList.remove("active");
  foodCards.classList.add("active");

}

function isDrink(){
 
  let foodCards = document.getElementById("food");
  let drinkCards = document.getElementById("drink");
 
  foodCards.classList.remove("active");
  drinkCards.classList.add("active");
  
 }