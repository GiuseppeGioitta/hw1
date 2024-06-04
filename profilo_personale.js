document.addEventListener('DOMContentLoaded', function () {
    function apriMenu(id, link) {
        const menu = document.getElementById(id);

        if (!menu.classList.contains('hidden')) {
            // Menu già aperto, segui il link normalmente
            return true;
        } else {
            event.preventDefault(); // Prevenire il comportamento predefinito solo al primo click
            // Chiudere tutti gli altri menu aperti
            const aperti = document.querySelectorAll(".menu:not(.hidden)");
            for (const menuAperto of aperti) {
                menuAperto.classList.add('hidden');
            }
            // Aprire il menu cliccato
            menu.classList.remove('hidden');
            return false;
        }
    }

    const linkMenu = document.querySelectorAll(".link");
    for (const link of linkMenu) {
        link.addEventListener('click', function (event) {
            const idMenu = link.getAttribute('data-target');
            const proceed = apriMenu(idMenu, link);
            if (proceed) {
                window.location.href = link.href;
            }
        });
    }
});

/*    ********************************************************************************** */

function modifiche_valide(event){
    const input_email = document.querySelector("#email");
    const value_email = encodeURIComponent(input_email.value);
    if(value_email.length == 0){
        event.preventDefault();

        console.log("Inserire caratteri");
        const mostra_errore_email = document.querySelector('#email_assente');
        mostra_errore_email.classList.remove('hidden');
    }

    const input_nome = document.querySelector('#nome');

    const value_nome = encodeURIComponent(input_nome.value);
    if(value_nome.length == 0){
        event.preventDefault();

        console.log("Inserire caratteri");
        const mostra_errore_nome = document.querySelector('#nome_assente');
        mostra_errore_nome.classList.remove('hidden');
    }

    const input_cognome = document.querySelector("#cognome");
    const value_cognome = encodeURIComponent(input_cognome.value);
    if(value_cognome.length == 0){
        event.preventDefault();

        console.log("Inserire caratteri");
        const mostra_errore_cognome = document.querySelector('#cognome_assente');
        mostra_errore_cognome.classList.remove('hidden');
    }
}

const form_registrazione = document.querySelector("#Profile");
form_registrazione.addEventListener('submit', modifiche_valide);