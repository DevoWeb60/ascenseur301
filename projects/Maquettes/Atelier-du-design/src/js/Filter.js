export default class Filter {
    constructor() {
        this.reels = Array.from(document.querySelectorAll(".reel"));
        this.filters = Array.from(document.querySelectorAll(".filter ul li a"));
        this.init();
    }

    init() {
        this.filters.forEach((filter) => {
            filter.addEventListener("click", (e) => {
                e.preventDefault();
                this.refreshFilter();
                const categoryId = filter.dataset.category;
                if (categoryId != 0) {
                    this.disableReel(categoryId);
                }
            });
        });
    }

    refreshFilter() {
        this.reels.forEach((reel) => {
            reel.classList.remove("disabled");
        });
    }

    disableReel(categoryId) {
        const reelFiltered = this.reels.filter(
            (reel) => reel.dataset.category !== categoryId
        );
        reelFiltered.forEach((filtered) => {
            filtered.classList.add("disabled");
        });
    }
}
