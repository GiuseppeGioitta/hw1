
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

// Caricamento dei prodotti dal database
function onJSON(json)
{
    console.log(json);
    const section_prodotti = document.getElementById("prodotti_totali");
    section_prodotti.innerHTML = '';

    for(prodotto of json.prodotti){
        const div = document.createElement('div');
        div.classList.add('primo');
        section_prodotti.appendChild(div);

        const div1 = document.createElement('div');
        div.appendChild(div1);

        const div2 = document.createElement('div');
        div.appendChild(div2);

        const image = document.createElement('img');

        image.src = prodotto.URL;
        div1.appendChild(image);

        const cuore = document.createElement('span');
        cuore.classList.add('fa', 'fa-heart');
        cuore.dataset.id_prodotto = prodotto.ID;
        div1.appendChild(cuore);

        cuore.addEventListener('click', clickHeart);


        const nome = document.createElement('span');
        nome.classList.add('nome_ridotto');
        nome.textContent = prodotto.NOME;
        div2.appendChild(nome);

        
    }
fetch("db_preferiti.php").then(OnResponseAggiorna).then(OnJsonTracciaLike);


}
function onResponse(response)
{
    return response.json();
}

function aggiornaProdotti()
{
    // Richiedi lista eventi
    fetch("db_prodotti.php").then(onResponse).then(onJSON);
}


function clickHeart(event){
    const cuore = event.currentTarget;
    const idProdotto = cuore.dataset.id_prodotto;
    let azione = "";

    console.log("Cuore cliccato", cuore);
    console.log("Id Prodotto: ", idProdotto);

    cuore.classList.toggle('rosso');

    if(cuore.classList.contains('rosso')){
        console.log("Classe 'rosso' aggiunta");
        azione = "aggiungi";
        fetch("add_remove_favorites.php?id_prodotto=" + encodeURIComponent(idProdotto) + "&azione="+encodeURIComponent(azione));

    } else {
        console.log("Classe 'rosso' rimossa");
        azione = "rimuovi";
        fetch("add_remove_favorites.php?id_prodotto=" + encodeURIComponent(idProdotto) + "&azione="+encodeURIComponent(azione));
    }
}

aggiornaProdotti();

// Lasciare il cuore rosso nei prodotti preferiti

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
