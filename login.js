/* APERTURA MENU DELLA NAV */
function apriMenu(id){
    /*Trova il div del menu con lo stesso ID del link cliccato */
    const menu = document.getElementById(id);

    event.preventDefault();
    /*Se il menu è aperto lo chiudiamo */
    if(!menu.classList.contains('hidden')){
        menu.classList.add('hidden');
        return;
    }
    /*Chiudiamo gli altri menu aperti */
    const aperti = document.querySelectorAll(".menu:not(.hidden)");
    for(const menuAperto of aperti){
        menuAperto.classList.add('hidden');
    }
    /*Apri menu cliccato*/
    menu.classList.remove('hidden');
}
/*Colleghiamo la funzione ai link */
const linkMenu = document.querySelectorAll(".link");
for(const link of linkMenu){
    link.addEventListener('click', () =>{
        const idMenu = link.getAttribute('data-target');
        apriMenu(idMenu);
    });
}