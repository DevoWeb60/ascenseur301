import App from './src/js/App.js';

const app = new App();

document.addEventListener('keydown', (e) => {
    if(e.key === "ArrowRight") {
        app.playAnim("luffyPunch")
    }
    if(e.key === "ArrowLeft") {
        app.playAnim("highKick")
    }
    if(e.key === "ArrowUp"){
        app.playAnim("gomuGomu");
    }
})