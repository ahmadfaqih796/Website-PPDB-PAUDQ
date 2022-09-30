const MenuToggle = document.querySelector('.menu-toggle input');
const Navigasi = document.querySelector('nav');
const nav = document.querySelector('nav ul');

MenuToggle.addEventListener('click', function () {
    nav.classList.toggle('slide');
});

let sticky = Navigasi.offsetTop;
const navbarScroll = () => {
    if(window.pageYOffset >= sticky) {
        Navigasi.classList.add('sticky');
    }
    else {
        Navigasi.classList.remove('sticky');
    }
};
window.onscroll = navbarScroll;