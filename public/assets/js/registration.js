const pwShowHide = document.querySelectorAll('.pw_hide');

let username = document.getElementById('username');
let sentenceUsername = document.getElementById('helpusername');
let email = document.getElementById('email');
let sentenceEmail = document.getElementById('helpmail');

let passwordInput = document.getElementById('password');
let passwordContent = document.getElementById('contentpassword');
let passwordInputVerif = document.getElementById('passwordVerif');
let passwordHelp = document.getElementById('passwordHelp');

const regexUsername = /^[a-zA-Z0-9_-]{4,20}$/;
const regexEmail =/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
const regexPassword = /(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&]).{12,}$/;

const checkUsername = () => {
    username.classList.remove('is-valid', 'is-invalid');
    sentenceUsername.classList.add('d-none');

    if(username.value === ''){
        return;
    }
    let usernameRegex = regexUsername.test(username.value);

    if(!usernameRegex){
        username.classList.add('is-invalid', 'border-3');
        sentenceUsername.classList.remove('d-none');
    } else{
        username.classList.add('is-valid','border-3');
        sentenceUsername.classList.add('d-none');
    }

}

const checkEmail = () => {
    email.classList.remove('is-valid','is-invalid');
    sentenceEmail.classList.add('d-none');

    if(email.value === ''){
        return;
    }
    let emailRegex = regexEmail.test(email.value);

    if(!emailRegex){
        email.classList.add('is-invalid','border-3');
        sentenceEmail.classList.remove('d-none');
    } else{
        email.classList.add('is-valid', 'border-3');
        sentenceEmail.classList.add('d-none');
    }
}

const checkPassword = () => {
    passwordInput.classList.remove('is-valid','is-invalid');
    passwordContent.classList.add('d-none');
    passwordInputVerif.classList.remove('is-invalid','is-valid')
    passwordHelp.classList.remove('d-none');
    
    if(passwordInput.value === '' || passwordInputVerif.value === ''){
        return;
    }
    let passwordRegex = regexPassword.test(passwordInput.value);
    
    if(!passwordRegex){
        passwordInput.classList.add('is-invalid','border-3');
        passwordContent.classList.remove('d-none');
        passwordContent.textContent = "Veuillez créer un mot de passe d'au moins 12 caractéres, comprenant au moins une lettre minuscule, un chiffre, une lettre majuscule et un caractére spécial.";
    } else{
        passwordInput.classList.add('is-valid','border-3');
        passwordContent.classList.add('d-none');
        passwordContent.textContent = "";
    }
    if(passwordInput.value !== passwordInputVerif.value){
        passwordInput.classList.add('is-invalid', 'border-3');
        passwordInputVerif.classList.add('is-invalid','border-3');
        passwordHelp.classList.remove('d-none');
    } else{
        passwordInput.classList.add('is-valid','border-3');
        passwordInputVerif.classList.add('is-valid','border-3');
        passwordHelp.classList.add('d-none');
    }
}

pwShowHide.forEach((icon) => {
    icon.addEventListener("click", ()=> {
        let getPwInput = icon.parentElement.querySelector("input");
        if(getPwInput.type === 'password'){
            getPwInput.type = 'text';
            icon.classList.replace("uil-eye-slash", "uil-eye");
        } else{
            getPwInput.type = "password";
            icon.classList.replace("uil-eye","uil-eye-slash");
        }
    })
})

username.addEventListener('input', checkUsername);
email.addEventListener('input',checkEmail);
passwordInput.addEventListener('input',checkPassword);
passwordInputVerif.addEventListener('input',checkPassword);