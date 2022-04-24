const searchSVG = document.querySelector(".search svg");
const searchSection = document.querySelector(".search");
const searchInput = document.querySelector(".search input");
const projectsContainer = document.querySelector(".project-container");
const projects = document.querySelectorAll(".card-project");
const countProject = document.querySelector(".countProject");

let projectsArray = Array.from(projects);

searchSVG.addEventListener("click", () =>
    searchSection.classList.toggle("active")
);

searchInput.addEventListener("click", () => {
    if (window.location.search !== "?search=active") {
        window.location.search = "?search=active";
    }
});

function toLowerIncludes(item, value) {
    item = item.toLowerCase();
    value = value.toLowerCase();

    return item.includes(value);
}

if (window.location.search.includes("?search")) {
    searchInput.focus();
    searchInput.addEventListener("keyup", () => {
        projectsContainer.innerHTML = "";

        let filteredArray = [];
        projectsArray.forEach((project) => {
            let projectTitle = project.children[0];
            let projectBadgesAndTitle = Array.from(
                project.children[2].children
            );
            projectBadgesAndTitle.push(projectTitle);

            projectBadgesAndTitle.forEach((content) => {
                if (toLowerIncludes(content.textContent, searchInput.value)) {
                    filteredArray.push(project);
                }
            });
        });

        filteredArray.forEach((project) => {
            projectsContainer.append(project);
        });
        if (filteredArray.length > 28) {
            countProject.innerHTML = projectsArray.length;
        } else {
            countProject.innerHTML = filteredArray.length;
        }
    });
}
