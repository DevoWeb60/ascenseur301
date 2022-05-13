export default class App {
   constructor() {
      this.container = document.querySelector(".container");
      this.animations = ["luffyPunch", "highKick", "gomuGomu"];
   }

   playAnim(animationName) {
      if (this.container.classList.contains(animationName)) {
         this.container.classList.toggle(animationName);
      } else {
         this.container.className = "container";
         this.container.classList.add(animationName);

         const getAnimationDuration = getComputedStyle(
            this.container
         ).animation.split("s")[0];

         const animationDuration = getAnimationDuration * 1000;

         setTimeout(() => {
            this.container.classList.remove(animationName);
         }, animationDuration);
      }
   }
}
