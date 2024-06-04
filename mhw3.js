/* FUNZIONI PER CAMBIARE IMMAGINI */
function cambia_immagine(){
    const image = document.querySelector('#image22 img');
    if(image.src==="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/C3_EN_CUSTOM_2884x1026_STATIC_022113_R0.png"){
    image.src = "https://www.kelloggs.it/content/Europe/kelloggs_it/it_IT/pages/home/jcr:content/gridSystem/par/inuitgrid_587080621/par/feature/slideData/jcr:content/par/responsiveimage_1626132963.img.jpg/1699616908091.jpg";
    }
    else if(image.src === "https://www.kelloggs.it/content/Europe/kelloggs_it/it_IT/pages/home/jcr:content/gridSystem/par/inuitgrid_587080621/par/feature/slideData/jcr:content/par/responsiveimage_1626132963.img.jpg/1699616908091.jpg"){
        image.src = "https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/banners/extraConsumerBrandDesk.jpg";
    }
    else if(image.src === "https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/banners/extraConsumerBrandDesk.jpg"){
        image.src = 'https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/our_brands/kelloggs-to-go/C1_IT_CUSTOM_2884x1026_STATIC_028712_R0.png';
    }
    else if(image.src === "https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/our_brands/kelloggs-to-go/C1_IT_CUSTOM_2884x1026_STATIC_028712_R0.png"){
        image.src = 'https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/C3_EN_CUSTOM_2884x1026_STATIC_022113_R0.png';
    }
}

const cambia_image_button = document.querySelector('#cambia_img');
cambia_image_button.addEventListener('click', cambia_immagine);

function back_immagine(){
    const image = document.querySelector('#image22 img');
    if(image.src==="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/C3_EN_CUSTOM_2884x1026_STATIC_022113_R0.png"){
    image.src = "https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/our_brands/kelloggs-to-go/C1_IT_CUSTOM_2884x1026_STATIC_028712_R0.png";
    }
    else if(image.src === "https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/our_brands/kelloggs-to-go/C1_IT_CUSTOM_2884x1026_STATIC_028712_R0.png"){
        image.src = "https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/banners/extraConsumerBrandDesk.jpg";
    }
    else if(image.src === "https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/banners/extraConsumerBrandDesk.jpg"){
        image.src = 'https://www.kelloggs.it/content/Europe/kelloggs_it/it_IT/pages/home/jcr:content/gridSystem/par/inuitgrid_587080621/par/feature/slideData/jcr:content/par/responsiveimage_1626132963.img.jpg/1699616908091.jpg';
    }
    else if(image.src === "https://www.kelloggs.it/content/Europe/kelloggs_it/it_IT/pages/home/jcr:content/gridSystem/par/inuitgrid_587080621/par/feature/slideData/jcr:content/par/responsiveimage_1626132963.img.jpg/1699616908091.jpg"){
        image.src = 'https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/C3_EN_CUSTOM_2884x1026_STATIC_022113_R0.png';
    }
}
const back_image_button = document.querySelector('#previous');
back_image_button.addEventListener('click', back_immagine);

/* VISUALIZZAZIONE PULSANTI PER SPOSTARCI IMAGE2 */
function view(){
    document.querySelector("#previous").classList.remove("hidden");
    document.querySelector("#cambia_img").classList.remove("hidden");
}

const button_remove = document.querySelector(".image2")
button_remove.addEventListener('mouseover', view);

function view2(){
    document.querySelector("#previous").classList.add("hidden");
    document.querySelector("#cambia_img").classList.add("hidden");
}
const button_open = document.querySelector('.image2');
button_open.addEventListener('mouseleave', view2);


/* VISUALIZZAZIONE PULSANTI VARIE SEZIONI */
function view1(){
    document.querySelector("#changeProduct").classList.remove("hidden");
    document.querySelector("#changeProductback").classList.remove("hidden");
}

const button_remove_product = document.querySelector(".Prodotti")
button_remove_product.addEventListener('mouseover', view1);

function view21(){
    document.querySelector("#changeProduct").classList.add("hidden");
    document.querySelector("#changeProductback").classList.add("hidden");
}
const button_open_product = document.querySelector('.Prodotti');
button_open_product.addEventListener('mouseleave', view21);


function view_benefici(){
    document.querySelector("#changeBackgroundnext").classList.remove("hidden");
    document.querySelector("#changeBackgroundback").classList.remove("hidden");
}

const button_remove_benefici = document.querySelector(".benefici")
button_remove_benefici.addEventListener('mouseover', view_benefici);

function view_ben(){
    document.querySelector("#changeBackgroundnext").classList.add("hidden");
    document.querySelector("#changeBackgroundback").classList.add("hidden");
}
const button_open_benefici = document.querySelector('.benefici');
button_open_benefici.addEventListener('mouseleave', view_ben);

/********************************************************************* */
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

/* CAMBIO IMMAGINE BACKGROUND BENEFICI+H3+P */

function showBackground(index){
    const background = backgrounds[index];
    const element = document.querySelector(".benefici");
    element.style.backgroundImage = `url(${background.image})`;
    element.querySelector("h3").textContent = background.h3;
    element.querySelector("p").textContent = background.p;
}
/* Array di oggetti con informazione dei background */
const backgrounds = [
    {
        image: "https://www.kelloggs.it/content/dam/europe/kelloggs_ie/images/our_brands/frosties/cereal_banner_1.jpg",
        h3: "I benefici dei cereali",
        p: "Tutti abbiamo sentito dire almeno una volta che la colazione è un pasto molto importante e che i cereali sono una delle scelte migliori per la colazione.",
    },
    {
        image: "https://www.kelloggs.it/content/dam/europe/kelloggs_ie/images/our_brands/frosties/passionfornutrition_web_1.jpg",
        h3: "I benefici delle fibre",
        p: "Ulteriori informazioni sui numerosi benefici delle fibre.",
    },
    {
        image: "https://www.kelloggs.it/content/dam/europe/kelloggs_ie/images/our_brands/frosties/benefitsoffibre_web.jpg",
        h3: "La nostra passione per la nutrizione",
        p: "Oltre cento anni fa, W.K. Kellogg riconobbe le potenzialità racchiuse in un singolo chicco di mais.",
    }
];
/* variabile che mi tiene traccia dell'indice */
let currentIndex = 0;

const buttonNext = document.querySelector("#changeBackgroundnext");
const buttonBack = document.querySelector("#changeBackgroundback");

buttonNext.addEventListener("click", () => {
    currentIndex++;
    if(currentIndex >= backgrounds.length){
        currentIndex = 0;
    }
    showBackground(currentIndex);
});

buttonBack.addEventListener("click", () => {
    currentIndex--;
    if(currentIndex < 0){
        currentIndex = backgrounds.length - 1;
    }
    showBackground(currentIndex);
});