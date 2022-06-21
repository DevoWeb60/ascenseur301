export default class App {
    constructor() {
        this.modal = document.querySelector(".modal");
        this.imageModal = document.querySelector(".modal img");
        this.seasons = document.querySelectorAll(".season");
        this.allImages = this.getAllImages();
        this.imageModal.src = this.allImages[0];
        this.index = this.allImages.indexOf(this.imageModal.src);
    }

    seasonClick() {
        this.seasons.forEach((season) => {
            season.addEventListener("click", () => {
                this.modal.classList.add("active");
                const imageSeason = season.style.backgroundImage.split('"')[1];
                this.imageModal.src = imageSeason;
            });
        });
    }

    closeModal() {
        this.modal.addEventListener("click", () => {
            this.modal.classList.remove("active");
        });
    }

    arrowControl() {
        document.addEventListener("keydown", (e) => {
            if (e.key === "ArrowLeft") {
                this.previousImage(this.index);
            }
            if (e.key === "ArrowRight") {
                this.nextImage(this.index);
            }
        });
    }

    previousImage(index) {
        if (index > 0) {
            this.imageModal.src = this.allImages[index - 1];
            this.index -= 1;
        }
    }

    nextImage(index) {
        if (index < this.allImages.length - 1) {
            this.imageModal.src = this.allImages[index + 1];
            this.index += 1;
        }
    }

    getAllImages() {
        const images = [];
        this.seasons.forEach((season) => {
            const imageSeason = season.style.backgroundImage.split('"')[1];
            images.push(imageSeason);
        });
        return images;
    }
}
