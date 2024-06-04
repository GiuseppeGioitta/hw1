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

/*    ****************************************************************************** */

fetch("db_preferiti.php").then(OnResponse).then(OnJson);

function OnResponse(response){
    console.log(response);
    return response.json();
}

function OnJson(json){
    console.log(json);
    const prodotto = json;
    const visualizza_preferiti = document.querySelector('#prodotti_preferiti');
    visualizza_preferiti.innerHTML = '';

    for(let i of prodotto){
        const div = document.createElement('div');
        div.classList.add('primo');
        visualizza_preferiti.appendChild(div);

        const div1 = document.createElement('div');
        div.appendChild(div1);

        const div2 = document.createElement('div');
        div.appendChild(div2);

        const image = document.createElement('img');

        image.src = i.URL;
        div1.appendChild(image);

        const cuore = document.createElement('span');
        cuore.classList.add('fa', 'fa-heart');
        cuore.dataset.id_prodotto = i.ID;
        div1.appendChild(cuore);
        // Inserire l'evento al cuore in modo da togliere i prodotti dai preferiti
        cuore.addEventListener('click', clickHeart);


        const nome = document.createElement('span');
        nome.classList.add('nome_ridotto');
        nome.textContent = i.NOME;
        div2.appendChild(nome);
    }
}
// funzione al cuore, avendo già i preferiti, il cuore sarà rosso, quindi solo rimuovere
    function clickHeart(event){
    const cuore = event.currentTarget;
    const idProdotto = cuore.dataset.id_prodotto;
    let azione = "rimuovi";

    fetch("add_remove_favorites.php?id_prodotto=" + encodeURIComponent(idProdotto) + "&azione=" +encodeURIComponent(azione));

    const divToRemove = cuore.closest('.primo');
    divToRemove.remove();

    console.log("Cuore cliccato", cuore);
    console.log("Id Prodotto: ", idProdotto);

    /*cuore.classList.toggle('rosso');
    fetch("db_preferiti.php").then(OnResponseAggiorna).then(OnJsonTracciaLike);*/
}

// Lasciare il cuore rosso nei prodotti preferiti
fetch("db_preferiti.php").then(OnResponseAggiorna).then(OnJsonTracciaLike);

function OnResponseAggiorna(response){
    console.log(response);
    return response.json();
}

function OnJsonTracciaLike(json){
    console.log("JSON:", json);
    const cuori = document.querySelectorAll('span.fa-heart');

    console.log("CUORI:", cuori);

    for(cuore of cuori){
        const cuoreID = cuore.dataset.id_prodotto; 
        const prodottoPresente = json.find(prodotto => prodotto.ID === cuoreID);

        if(prodottoPresente){
            cuore.classList.add('rosso');
        } else {
            cuore.classList.remove('rosso');
        }
    }
}

fetch("db_preferiti.php").then(OnResponseAggiorna).then(OnJsonTracciaLike);