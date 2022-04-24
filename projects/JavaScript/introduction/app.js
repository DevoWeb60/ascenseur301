const quantityElement = document.querySelector(".quantity .count");
const priceElement = document.querySelector(".price .count");
const btn = document.querySelector(".btnCount.foreward");
const btnBack = document.querySelector(".btnCount.back");
const btnReset = document.querySelector(".btnCount.reset");
let count = 1;
const countInterval = 1;
const countMin = 0;
const priceValue = 6.65;

// FUNCTIONS
const incrementCount = () => {
   count = count + countInterval;
   quantityElement.innerText = count;
   priceElement.innerText = calcul(count);
};
const uncrementCount = () => {
   if (count <= countMin) {
      return (quantityElement.innerText = countMin);
   }
   count = count - countInterval;
   quantityElement.innerText = count;
   priceElement.innerText = calcul(count);
};
const resetCount = () => {
   count = countMin;
   quantityElement.innerText = count;
   priceElement.innerText = calcul(count);
};
const calcul = (quantity) => {
   return Math.round(quantity * priceValue * 100) / 100;
};
// EVENT
// ___CLICK
btn.addEventListener("click", incrementCount);
btnBack.addEventListener("click", uncrementCount);
btnReset.addEventListener("click", resetCount);

// ___KEYBOARD
document.addEventListener("keyup", (e) => {
   console.log(e.keyCode);
   if (e.keyCode === 107) {
      incrementCount();
   } else if (e.keyCode === 109) {
      uncrementCount();
   } else if (e.keyCode === 13) {
      resetCount();
   } else {
      alert(
         "Appuie sur la bonne touche ! \n Touche + du pad \n Touche - du pad"
      );
   }
});
