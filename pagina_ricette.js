/* Menù a tendina */
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


/* API PER RICETTE */
function ricette(event){
    event.preventDefault();
    const form_data = new FormData(document.querySelector("form"));
    fetch("cerca_ricetta.php?q="+encodeURIComponent(form_data.get('search'))).then(onResponse).then(onJsonR);
}

function onJsonR(json) {
    console.log(json);
    const r = document.querySelector('#recipe');
     r.innerHTML = '';
     if(json.totalResults == 0){ 
     document.querySelector('#errore').classList.remove('hidden');
     } else { document.querySelector('#errore').classList.add('hidden');
     for(let i=0; i<10; i++) {
       const lib = document.createElement('div');
       const data = json.results[i];
       let img_rec = data['image'];
       let img_tit = data['title'];
       const a = document.createElement('p');
       const img = document.createElement('img');
       img.src = img_rec;
       a.textContent = img_tit;
       lib.appendChild(img);
       lib.appendChild(a);
       r.appendChild(lib);
     }
    }
}

function onResponse(response){
   return response.json();
}

document.querySelector('#food').addEventListener('submit', ricette);