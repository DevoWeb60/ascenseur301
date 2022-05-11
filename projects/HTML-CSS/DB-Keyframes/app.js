import App from './js/App.js';
import AnimationsObjects from './js/AnimationsObjects.js';

const animsArray = [
   new AnimationsObjects(
      "circleDragonBall",
      "Cercle Dragon Ball",
      true,
      ".circleDragonBall"
   ),
   new AnimationsObjects(
      "dragonBall",
      "Dragon Ball",
      true,
      ".circleDragonBall img"
   ),
   new AnimationsObjects("citation", "Citation", true, ".bandeau p"),
   new AnimationsObjects("nuageMagique", "Nuage Magique", true, "#nuage"),
   new AnimationsObjects("vegeta", "Vegeta", true, "#vegita span"),
   new AnimationsObjects("quotes", "Guillement citation", true, [
      ".bandeauContainer .fa-quote-left",
      ".bandeauContainer .fa-quote-right",
   ]),
   new AnimationsObjects("freeza", "Freezer", true, "#freeza")
];

const app = new App(animsArray);

animsArray.forEach((anim) => {
   anim.newCheckbox();
});
app.play.addEventListener("click", () => {
   app.controlAnimation("running");
});
app.pause.addEventListener("click", () => {
   app.controlAnimation("paused");
});
app.modalClose.addEventListener("click", () => {
   app.closeModal();
});

setTimeout(() => {
   document.querySelector(".overlay").remove()
}, 3000)