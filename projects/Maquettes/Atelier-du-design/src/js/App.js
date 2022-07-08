import Modal from "./Modal.js";
import Filter from "./Filter.js";

export default class App {
    constructor() {
        this.init();
    }

    init() {
        new Modal();
        new Filter();
    }
}
