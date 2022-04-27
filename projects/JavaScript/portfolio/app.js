// !OBJECTS
class Project {
   constructor(type, name, thumbnail) {
      this.name = name;
      this.type = type;
      this.thumbnail = thumbnail;
   }
}

class App {
   constructor() {
      this.container = document.querySelector(".container");
      this.navList = document.querySelector("#navList");
      this.lis;
      this.projects;
      this.types;
   }

   setAllTypes(arrayType) {
      return (this.types = arrayType);
   }

   setAllProjects(arrayProjects) {
      return (this.projects = arrayProjects);
   }

   displayNavList(type) {
      const li = document.createElement("li");
      const a = document.createElement("a");
      if (type === "Tous") {
         a.className = "active";
      }
      a.innerText = type;
      a.href = "#";
      li.setAttribute("data-type", type);

      li.appendChild(a);
      this.navList.appendChild(li);
      this.types = document.querySelectorAll("ul li");
   }

   displayProjects(project) {
      const div = document.createElement("div");
      div.className = "project";
      div.setAttribute("data-type", project.type);
      const HTML = `<img src="./images/${project.thumbnail}" alt="${project.name}" /><div class="overlay"><h3>${project.name}</h3></div>`;
      div.innerHTML = HTML;

      this.container.appendChild(div);
      this.projects = document.querySelectorAll(".project");
   }

   filterProjects(type) {
      if (type !== "Tous") {
         this.projects.forEach((project) => {
            if (project.dataset.type === type) {
               project.classList.remove("disabled");
               project.classList.add("active");
            } else {
               project.classList.add("disabled");
               project.classList.remove("active");
            }
         });
      } else {
         this.projects.forEach((project) => {
            project.classList.remove("active");
            project.classList.remove("disabled");
         });
      }
   }
}

// !INIT APP AND DATA
const app = new App();
app.setAllTypes([
   "Tous",
   "Infographies",
   "Identité visuelle",
   "Print",
   "Illustrations",
   "Isométries",
   "Storyboards",
]);
app.setAllProjects([
   new Project("Print", "Domanys", "42_10__mock-up_8.jpg"),
   new Project("Print", "Permaculture", "44_5__perma00.jpg"),
   new Project("Infographies", "Renault", "45_1__datarenault2017.jpg"),
   new Project("Identité visuelle", "Eric Le François", "43_7__elf02.jpg"),
   new Project("Infographies", "CVE", "46_6__cve02.jpg"),
   new Project("Illustrations", "GRDF", "33_1__grdf01.jpg"),
   new Project("Illustrations", "Alone In Nature", "38_16__aiparis.jpg"),
   new Project("Illustrations", "Inktober", "40_13__intober2017-04.jpg"),
   new Project("Illustrations", "Cabins Diaries", "39_11__cabins01.jpg"),
   new Project("Infographies", "Ademe", "4_18__ademe_grazia.jpg"),
   new Project("Infographies", "Natixis - IPSEN", "7_15__nat07.jpg"),
   new Project("Infographies", "Europe Assistance", "12_7__eco01.jpg"),
   new Project("Infographies", "EDF Pulse", "13_15__edf00.jpg"),
   new Project("Print", "Danger de Lyme", "8_14__lymelabco01.jpg"),
   new Project("Illustrations", "Toulon", "36_9__tpm-map05.jpg"),
   new Project("Isométries", "Créteil", "21_18__creteil01.jpg"),
   new Project("Infographies", "Veolia", "10_7__veolia02.jpg"),
   new Project("Identité visuelle", "Quali Consult", "11_5__qc01.jpg"),
   new Project(
      "Infographies",
      "AXA - Bouygues - ING Direct",
      "6_10__axamovetothecloud.jpg"
   ),
   new Project("Storyboards", "Oise mobilité", "34_19__oisemobi01.jpg"),
   new Project("Infographies", "Commission Euro", "37_20__comissioneuro.jpg"),
   new Project("Illustrations", "Golf", "35_12__golf06.jpg"),
]);

//! MAIN
app.types.forEach((type) => app.displayNavList(type));
app.projects.forEach((project) => app.displayProjects(project));

app.types.forEach((li) => {
   li.addEventListener("click", () => app.filterProjects(li.dataset.type));
});
