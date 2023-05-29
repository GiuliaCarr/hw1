esc = url = ("images/esc.png");
sidebar = url = ("images/sidebar.png");

function closeMenu(event) {

    console.log("Closing the menu")
    
   document.querySelector('#menu').addEventListener('click', openMenu);

   

    const menu = document.querySelector("#minimenu");

    menu.classList.remove("onmenu");
    menu.classList.add("offmenu");
}






function openMenu(event) {
    console.log("Opening the menu")
    const exit = document.querySelector('#esc');
    exit.addEventListener('click', closeMenu);

    const menu = document.querySelector("#minimenu");

    menu.classList.remove("offmenu");
    menu.classList.add("onmenu");
}



document.querySelector("#menu").addEventListener('click', openMenu)