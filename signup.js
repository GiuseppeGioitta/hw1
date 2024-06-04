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

//
function checkName(event) {
    const input = event.currentTarget;
    
    if (formStatus[input.name] = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
}

function checkSurname(event) {
    const input = event.currentTarget;
    
    if (formStatus[input.surname] = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
}


function jsonCheckEmail(json) {
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;

    } else {
        fetch("check_email.php?q=" + encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkConfirmEmail(event) {
    const confirmEmailInput = document.querySelector('.confirm_email input');
    if (formStatus.confirmEmail = (confirmEmailInput.value === document.querySelector('.email input').value)) {
        document.querySelector('.confirm_email').classList.remove('errorj');
    } else {
        document.querySelector('.confirm_email').classList.add('errorj');
    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = (passwordInput.value.length >= 8)) {
        document.querySelector('.password').classList.remove('errorj');
    } else {
        document.querySelector('.password').classList.add('errorj');
    }

}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    if (formStatus.confirmPassword = (confirmPasswordInput.value === document.querySelector('.password input').value)) {
        document.querySelector('.confirm_password').classList.remove('errorj');
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
    }
}


function checkSignup(event) {
    const checkbox = document.querySelector('.allow input');
    formStatus.allow = checkbox.checked;
    if (Object.keys(formStatus).length !== 7 || Object.values(formStatus).includes(false)) {
        event.preventDefault();
    }
}

const formStatus = {};
document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);
document.querySelector('.confirm_email input').addEventListener('blur', checkConfirmEmail);
document.querySelector('form').addEventListener('submit', checkSignup);
