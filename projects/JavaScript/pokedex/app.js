const lis = document.querySelectorAll(".filterContainer ul li a");
const content = document.querySelector(".content");
const search = document.querySelector("#search");
const URL_LOCALE = "https://ascenseur301.dev";
const URL_DEPLOY = "http://thibaultberthelin.stagiaires.media-management.fr";
const ALL_TYPE = "all";
const BY_BUTTON = "by_button";
const BY_SEARCH = "by_search";

// EVENT
lis.forEach((li) => {
   li.addEventListener("click", (e) => {
      e.preventDefault();
      li.classList.add("active");
      lis.forEach((otherLi) => {
         if (otherLi !== li) {
            otherLi.classList.remove("active");
         }
      });
      requestData(li.attributes[1].value, BY_BUTTON);
   });
});

search.addEventListener("keyup", () => {
   requestData(ALL_TYPE, BY_SEARCH, search.value);
});

// FUNCTIONS
// __BY BUTTONS
const filterPokemon = (type = ALL_TYPE, data) => {
   let filteredData;

   if (type !== ALL_TYPE) {
      filteredData = data.filter((pokemon) => pokemon.typeList.includes(type));
   } else {
      filteredData = data;
   }

   displayPokemon(filteredData);
};

//__ BY SEARCH
const searchPokemon = (valueInput, data) => {
   let filteredData;
   let value = valueInput.toLowerCase();

   let nameSearch = data.filter((pokemon) =>
      pokemon.name.toLowerCase().includes(value)
   );

   // STRICT BY TYPE
   let typeSearch = data.filter((pokemon) => {
      let type = pokemon.typeList.map((type) => '"' + type.toLowerCase() + '"');
      return type.includes(value);
   });

   // BUTTON ACTIVE BY TYPE SEARCH
   let searchToActiveFilter = value.split("");
   if (value === "" || value === '"') {
      lis.forEach((li) =>
         li.attributes[1].value.includes(ALL_TYPE)
            ? li.classList.add("active")
            : li.classList.remove("active")
      );
   } else if (
      searchToActiveFilter[0] === '"' &&
      searchToActiveFilter[searchToActiveFilter.length - 1] === '"'
   ) {
      lis.forEach((li) => {
         let typeFormatted = '"' + li.attributes[1].value.toLowerCase() + '"';

         typeFormatted.includes(value)
            ? li.classList.add("active")
            : li.classList.remove("active");
      });
   }

   filteredData = nameSearch.concat(typeSearch);

   displayPokemon(filteredData);
};

const displayPokemon = (pokemonList) => {
   content.innerHTML = "";

   pokemonList.forEach((pokemon) => {
      const div = document.createElement("div");
      let pokemonId = pokemon.id.toString();
      pokemonId = pokemonId.padStart(3, "0");

      pokemonHTML =
         '<img src="img/' +
         pokemonId +
         '.png" alt="' +
         pokemon.name +
         '" />' +
         "<h2>" +
         pokemon.name +
         "</h2><div>" +
         pokemon.typeList
            .map((type) => {
               return "<span class=" + type + ">" + type + "</span>";
            })
            .join(" ") +
         "</div>";

      div.classList.add("pokemon");
      div.innerHTML = pokemonHTML;
      content.appendChild(div);
   });
};

//__ RESQUEST JSON FILE
const requestData = (type, action = BY_BUTTON, value) => {
   let URL;
   if (document.location.origin === URL_LOCALE) {
      URL = URL_LOCALE + "/projects/JavaScript/pokedex/data/pokedex.json";
   } else if (document.location.origin === URL_DEPLOY) {
      URL = URL_DEPLOY + "/projects/JavaScript/pokedex/data/pokedex.json";
   } else {
      document.write("Erreur d'URL");
      return;
   }

   fetch(URL)
      .then((res) => {
         !res.ok ? console.error("Error Fetch") : null;
         return res.json();
      })
      .then((res) => {
         if (action === BY_BUTTON) {
            filterPokemon(type, res);
         } else if (action === BY_SEARCH) {
            searchPokemon(value, res);
         }
      });
};

// EXECUTE FIRST REQUEST ALL
requestData(ALL_TYPE);
