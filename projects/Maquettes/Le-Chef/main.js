import App from './src/js/App.js';

const app = new App();

app.hamburger.addEventListener('click', () => {
    app.toggleMenu();
})