import App from './App.js';

export default class AnimationsObjects extends App {
    constructor(name, label, status, element, single = true) {
       super();
       this.name = name;
       this.label = label;
       this.status = status;
       this.element = this.getElements(element);
       this.single = single;
       this.checkbox = "";
       this.displayStatus = "";
    }
 
    getElements(element) {
       let queryElement = [];
       if (typeof element === "object") {
          element.forEach((el) => queryElement.push(document.querySelector(el)));
       } else {
          queryElement = document.querySelector(element);
       }
       return queryElement;
    }
 
    newCheckbox() {
       const div = document.createElement("div");
       div.innerHTML = `
          <input type="checkbox" id="${this.name}-checkbox" />
          <label for="${this.name}-checkbox">${this.label} - <span id="status-${
          this.name
       }">${super.activeOrDisabled(this)}</span></label>
       `;
 
       document.querySelector(".checkboxs").appendChild(div);
       this.checkbox = document.querySelector("#" + this.name + "-checkbox");
       this.displayStatus = document.querySelector("#status-" + this.name);
    }
 
    isRunning() {
       if (this.element[0] !== undefined) {
          this.element.forEach((singleElement) => {
             if (singleElement.style.animationPlayState === "running") {
                this.status = true;
             } else {
                this.status = false;
             }
          });
       } else {
          if (this.element.style.animationPlayState === "running") {
             this.status = true;
          } else {
             this.status = false;
          }
       }
    }
 
    refreshAnimationState() {
       this.displayStatus.innerText = this.activeOrDisabled();
    }
 }
 