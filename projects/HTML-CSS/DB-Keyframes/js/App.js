export default class App {
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
             if (anim.element[0] !== undefined) {
                anim.element.forEach(
                   (singleAnim) => (singleAnim.style.animationPlayState = action)
                );
             } else {
                anim.element.style.animationPlayState = action;
 
                if (anim.element.classList.contains("modalContainer")) {
                   anim.element.classList.toggle("active");
                   anim.status = !anim.status;
                }
             }
 
             anim.isRunning();
 
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