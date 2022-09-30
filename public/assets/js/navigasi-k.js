const menuBtn = document.querySelector(".menu-icon span");
const pencarianBtn = document.querySelector(".search-icon");
const batalBtn = document.querySelector(".cancel-icon");
const items = document.querySelector(".nav-items");
const form = document.querySelector("form");
menuBtn.onclick = () => {
    items.classList.add("active");
    menuBtn.classList.add("hide");
    pencarianBtn.classList.add("hide");
    batalBtn.classList.add("show");
    batalBtn.style.color = "#ff3d00";
}
batalBtn.onclick = () => {
    items.classList.remove("active");
    menuBtn.classList.remove("hide");
    pencarianBtn.classList.remove("hide");
    batalBtn.classList.remove("show");
    form.classList.remove("active");
    batalBtn.style.color = "#ff3d00";
}
pencarianBtn.onclick = () => {
    form.classList.add("active");
    pencarianBtn.classList.add("hide");
    batalBtn.classList.add("show");
    batalBtn.style.color = "#ff3d00";
}

$(".icon-search").click(function () {
    $(this).toggleClass("fa-times");
    $(".content-search").toggleClass("active");
});

$(".inp-search").keyup(function () {
    if ($(this).val() != "") {
        $(".btn-search").css("opacity", 1);
        $(".btn-search").css("transform", "rotate(0deg)");
    } else {
        $(".btn-search").css("opacity", 0);
        $(".btn-search").css("transform", "rotate(45deg)");
    }
});