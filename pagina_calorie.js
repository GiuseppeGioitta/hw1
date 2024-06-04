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


/* API PER CALORIE */
function calorie(event){
    event.preventDefault();
    const form_data = new FormData(document.querySelector("form"));
    fetch("cerca_calorie.php?q="+encodeURIComponent(form_data.get('search'))).then(onResponse).then(onJsonR);
}

function onJsonR(json) {
    console.log(json);
    const r = document.querySelector('#Valori');
     r.innerHTML = '';
     if(json.totalResults == 0){ 
     document.querySelector('#errore').classList.remove('hidden');
     } else { document.querySelector('#errore').classList.add('hidden');
     console.log('JSON ricevuto')
     jsonValori = json;
     console.log(json);
     
     // Creiamo il div dove inserire i valori
     const contenuto = document.createElement('div');
     contenuto.classList.add('contenuto_lista')
 
     const caloriesElement = document.createElement('p');
     caloriesElement.textContent = "Calorie: " +jsonValori.calories;
 
     const totalCO2EmissionsElement = document.createElement('p');
     totalCO2EmissionsElement.textContent = "Emissione totale di CO2: " +jsonValori.totalCO2Emissions;
 
     const co2EmissionsClassElement = document.createElement('p');
     co2EmissionsClassElement.textContent = "Classe di emissioni di CO2: " + jsonValori.co2EmissionsClass;
 
     const totalWeightElement = document.createElement('p');
     totalWeightElement.textContent = "Peso Totale: " + jsonValori.totalWeight;
 
     contenuto.appendChild(caloriesElement);
     contenuto.appendChild(totalCO2EmissionsElement);
     contenuto.appendChild(co2EmissionsClassElement);
     contenuto.appendChild(totalWeightElement);

     Valori.appendChild(contenuto);
     }
    }

function onResponse(response){
   return response.json();
}

document.querySelector('#calorie').addEventListener('submit', calorie);