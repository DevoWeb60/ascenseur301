export default class App {
    constructor(){
        this.hamburger = document.querySelector("#hamburger");
        this.nav = document.querySelector("header .container nav");
    }

    toggleMenu() {
        this.nav.classList.toggle('active');
    }
}