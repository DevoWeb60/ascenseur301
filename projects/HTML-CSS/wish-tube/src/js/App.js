export default class App {
   constructor() {
      this.video = document.querySelector("video");
      this.videoDuration = null;
      this.play = document.querySelector(".play");
      this.pause = document.querySelector(".pause");
      this.volume = document.querySelector(".volume");
      this.fullscreen = document.querySelector(".fullscreen");
      this.watched = document.querySelector("#watched");
      this.playedText = document.querySelector(".played");
      this.durationVideoText = document.querySelector(".durationVideo");
      this.refreshCurrentTime = null;
   }

   playVideo() {
      return this.play.addEventListener("click", () => {
         if (this.video.ended) {
            this.video.currentTime = 0;
            this.refreshCurrentTime = null;
         }

         this.video.play();
         this.play.classList.toggle("hide");
         this.pause.classList.toggle("hide");

         if (this.videoDuration === null) {
            this.videoDuration = this.video.duration;
            this.durationVideoText.innerText = Math.round(this.videoDuration);
            this.watched.max = Math.round(this.videoDuration * 1000);
         }

         this.createInterval();
      });
   }

   pauseVideo() {
      return this.pause.addEventListener("click", () => {
         this.video.pause();
         this.play.classList.toggle("hide");
         this.pause.classList.toggle("hide");
      });
   }

   currentWatchTime() {
      this.watched.value = this.video.currentTime * 1000;

      this.playedText.innerText = Math.round(this.video.currentTime);
   }

   setCurrentWatchTime() {
      this.watched.addEventListener("mousedown", () => {
         clearInterval(this.refreshCurrentTime);
         this.refreshCurrentTime = null;
         this.video.pause();
      });

      this.watched.addEventListener("mouseup", () => {
         this.video.currentTime = this.watched.value / 1000;
         this.video.play();
         this.play.classList.add("hide");
         this.pause.classList.remove("hide");
         this.createInterval();
      });
   }

   createInterval() {
      if (!this.refreshCurrentTime) {
         this.refreshCurrentTime = setInterval(() => {
            this.currentWatchTime();
            if (this.video.ended) {
               clearInterval(this.refreshCurrentTime);
               this.play.classList.toggle("hide");
               this.pause.classList.toggle("hide");
            }
         }, 10);
      }
   }
}
