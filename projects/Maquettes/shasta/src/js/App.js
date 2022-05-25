export default class App {
   constructor() {
      this.hamburger = document.querySelector("#hamburger");
      this.menu = document.querySelector("header nav ul");
      this.close = document.querySelector("#close");
   }

   toggleMenu(e) {
      e.preventDefault();
      this.hamburger.classList.toggle("hide");
      this.close.classList.toggle("active");
      this.menu.classList.toggle("active");
   }
}
