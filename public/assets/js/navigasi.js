const menuBtn = document.querySelector(".menu-icon span");
const pencarianBtn = document.querySelector(".search-icon");
const batalBtn = document.querySelector(".cancel-icon");
const items = document.querySelector(".nav-items");
const form = document.querySelector("form");
menuBtn.onclick = () => {
    items.classList.add("active");
    menuBtn.classList.add("hide");
    batalBtn.classList.add("show");
    batalBtn.style.color = "#ff3d00";
}
batalBtn.onclick = () => {
    items.classList.remove("active");
    menuBtn.classList.remove("hide");
    batalBtn.classList.remove("show");
    form.classList.remove("active");
    batalBtn.style.color = "#ff3d00";
}