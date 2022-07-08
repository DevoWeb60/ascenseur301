export default class Modal {
    constructor() {
        this.modals = Array.from(document.querySelectorAll(".overlay"));
        this.reels = Array.from(document.querySelectorAll(".reel"));
        this.init();
    }

    init() {
        this.reels.forEach((reel) => {
            reel.addEventListener("click", (e) => {
                e.preventDefault();
                this.openModal(reel);
            });
        });
    }

    openModal(element) {
        this.modals.forEach((modal) => {
            modal.classList.remove("active");
        });
        const [modalOfReel] = this.modals.filter(
            (modal) => modal.dataset.id === element.dataset.id
        );
        this.setupImg(element, modalOfReel);
        this.closeModal(modalOfReel);

        modalOfReel.classList.add("active");
    }

    setupImg(element, modal) {
        const imgOfModal = modal.querySelector(".modal-img");
        const imgOfReel = element.querySelector("img");
        imgOfModal.src = imgOfReel.src;
    }

    closeModal(modal) {
        const close = modal.querySelector(".close");
        close.addEventListener("click", (e) => {
            e.preventDefault();
            modal.classList.remove("active");
        });
    }
}
