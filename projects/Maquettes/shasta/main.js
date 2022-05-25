import App from "./src/js/App.js";

const app = new App();
app.hamburger.addEventListener("click", (e) => app.toggleMenu(e));
app.close.addEventListener("click", (e) => app.toggleMenu(e));
