export default class Menu {
    constructor() {
        this.menu = document.querySelector("header div nav ul");
        this.close = document.querySelector("#close-menu");
        this.hamburger = document.querySelector("#hamburger");
        this.init();
    }

    init() {
        this.hamburger.addEventListener("click", this.toggleMenu.bind(this));
        this.close.addEventListener("click", this.toggleMenu.bind(this));
    }

    toggleMenu() {
        this.menu.classList.toggle("active");
        if (this.menu.classList.contains("active")) {
            this.close.classList.add("active");
            this.hamburger.classList.add("hidden");
        } else {
            this.close.classList.remove("active");
            this.hamburger.classList.remove("hidden");
        }
    }
}
