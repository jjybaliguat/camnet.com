const menu = document.querySelector('#mobile-menu');
const menulinks = document.querySelector('.navbar_menu');
const navbarlogo = document.querySelector('#navbar_logo');

const mobileMenu = () => {
    menu.classList.toggle('is-active');
    menulinks.classList.toggle('active');
};

menu.addEventListener('click', mobileMenu);

//add highlight to menu items
const menuHighlight = () => {
    const elem = document.querySelector('.highlight');
    const homeMenu = document.querySelector('#home-page');
    const contactMenu = document.querySelector('#contact-page');
    const planMenu = document.querySelector('#plan-page');
    let scrollPos = window.scrollY;

    if(window.innerWidth > 960 && scrollPos < 600){
        homeMenu.classList.add('highlight');
        contactMenu.classList.remove('highlight');
        return;
    }else if(window.innerWidth > 960 && scrollPos < 1400){
        contactMenu.classList.add('highlight');
        homeMenu.classList.remove('highlight');
        return;
    }
    else if(window.innerWidth > 960 && scrollPos < 2345){
        contactMenu.classList.remove('highlight');
        return;
    }

    if((elem && window.innerWidth < 960 && scrollPos < 600 || elem )){
        elem.classList.remove('highlight');
    }
};
window.addEventListener('scroll', menuHighlight);
window.addEventListener('click', menuHighlight);

//close mobile menu
const hideMobileMenu = () => {
    const menuBars = document.querySelector('.is-active');
    if (window.innerWidth <= 960 && menuBars) {
      menu.classList.toggle('is-active');
      menulinks.classList.remove('active');
    }
  };
  
  menulinks.addEventListener('click', hideMobileMenu);
  navbarlogo.addEventListener('click', hideMobileMenu);