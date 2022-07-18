import Modal from "./Modal.js";
import Filter from "./Filter.js";
import Menu from "./Menu.js";

export default class App {
    constructor() {
        this.init();
    }

    init() {
        new Modal();
        new Filter();
        new Menu();
    }
}
