class App {
   constructor(animsObjects) {
      this.play = document.querySelector("#play");
      this.pause = document.querySelector("#pause");
      this.animations = animsObjects;
      this.modalClose = document.querySelector(".modal-close");
      this.modalContainer = document.querySelector(".modalContainer");
   }

   controlAnimation(action) {
      this.animations.forEach((anim) => {
         if (anim.checkbox.checked) {
            anim.element.style.animationPlayState = action;
            if (anim.isRunning()) {
               anim.status = true;
            } else {
               anim.status = false;
            }

            if (anim.element.classList.contains("modalContainer")) {
               anim.element.classList.toggle("active");
               anim.status = !anim.status;
            }

            this.refreshStatus(anim);
         }
      });
   }

   activeOrDisabled(animation) {
      if (animation.status) {
         return "Animé";
      } else {
         return "Pause";
      }
   }

   refreshStatus(animation) {
      return (animation.displayStatus.innerHTML =
         this.activeOrDisabled(animation));
   }

   closeModal() {
      return this.modalContainer.classList.remove("active");
   }
}

class AnimationsObjects extends App {
   constructor(name, label, status, element) {
      super();
      this.name = name;
      this.label = label;
      this.status = status;
      this.element = element;
      this.checkbox = "";
      this.displayStatus = "";
   }

   newCheckbox() {
      const div = document.createElement("div");
      div.innerHTML = `
         <input type="checkbox" id="${this.name}" />
         <label for="${this.name}">${this.label} - <span id="status-${
         this.name
      }">${super.activeOrDisabled(this)}</span></label>
      `;

      document.querySelector(".checkboxs").appendChild(div);
      this.checkbox = document.querySelector("#" + this.name);
      this.displayStatus = document.querySelector("#status-" + this.name);
   }

   isRunning() {
      if (this.element.style.animationPlayState === "running") {
         return true;
      } else {
         return false;
      }
   }

   refreshAnimationState() {
      this.displayStatus.innerText = this.activeOrDisabled();
   }
}

// ANIMATED ELEMENTS
const dragonBallContainer = document.querySelector(".circleDragonBall");
const dragonBall = document.querySelector(".circleDragonBall img");
const bandeau = document.querySelector(".bandeau p");
const nuage = document.querySelector("#nuage");
const modalContainer = document.querySelector(".modalContainer");
const kakarot = document.querySelector(".name-1");
const vegeta = document.querySelector("#vegita span");

const animsArray = [
   new AnimationsObjects(
      "circleDragonBall",
      "Cercle Dragon Ball",
      true,
      dragonBallContainer
   ),
   new AnimationsObjects("dragonBall", "Dragon Ball", true, dragonBall),
   new AnimationsObjects("citation", "Citation", true, bandeau),
   new AnimationsObjects("nuageMagique", "Nuage Magique", true, nuage),
   new AnimationsObjects("vegeta", "Vegeta", true, vegeta),
];

const app = new App(animsArray);

animsArray.forEach((anim) => {
   console.log(anim);
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
