export default class App {
   constructor() {
      this.img = document.querySelector("img");
      this.audio = document.querySelector("audio");
      this.btnPressed = "./src/img/transparent_button_pressed.webp";
      this.btnPUnpressed = "./src/img/transparent_button_normal.webp";
   }

   playSound() {
      this.img.src = this.btnPressed;
      this.audio.play();
   }

   pauseSound() {
      this.img.src = this.btnPUnpressed;
      this.audio.pause();
      this.audio.currentTime = 0;
   }

   playEvent() {
      this.img.addEventListener("mousedown", () => this.playSound());
      this.img.addEventListener("mouseup", () => this.pauseSound());
      document.addEventListener("keydown", (e) => {
         if (e.key === " ") {
            this.playSound();
         }
      });
      document.addEventListener("keyup", (e) => {
         if (e.key === " ") {
            this.pauseSound();
         }
      });
   }
}
