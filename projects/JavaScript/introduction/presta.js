const quantityElement = document.querySelector("#qt");
const priceElement = document.querySelector(".ttc");
let count = quantityElement.value;
const countInterval = 1;
const countMin = 1;
const priceValue = 6.65;

// FUNCTIONS
const displayPrice = () => {
   priceElement.innerText = calcul(quantityElement.value) + "€";
};
const incrementCount = () => {
   quantityElement.value = Number(quantityElement.value) + 1;
   priceElement.innerText = calcul(quantityElement.value) + "€";
};
const uncrementCount = () => {
   if (quantityElement.value <= countMin) {
      return (quantityElement.value = countMin);
   }
   quantityElement.value = Number(quantityElement.value) - 1;
   priceElement.innerText = calcul(quantityElement.value) + "€";
};
const resetCount = () => {
   quantityElement.value = 1;
   priceElement.innerText = calcul(quantityElement.value) + "€";
};
const calcul = (quantity) => {
   return Math.round(quantity * priceValue * 100) / 100;
};
// EVENT
// ___CLICK
quantityElement.addEventListener("click", displayPrice);

// ___KEYBOARD
document.addEventListener("keyup", (e) => {
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
