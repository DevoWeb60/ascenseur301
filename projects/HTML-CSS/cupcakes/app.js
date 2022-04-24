const mobileMenu = document.querySelector("#mobile-menu");
const menuList = document.querySelector("nav ul");

mobileMenu.addEventListener("click", () => {
   if (menuList.classList.contains("active")) {
      mobileMenu.style.transform = "rotate(0deg)";
      menuList.classList.remove("active");
   } else {
      mobileMenu.style.transform = "rotate(180deg)";
      menuList.classList.add("active");
   }
});
