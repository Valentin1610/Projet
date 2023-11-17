const pwShowHide = document.querySelectorAll(".pw_hide");
let username = document.getElementById('username');
let usernameError = document.getElementById('usernameerrortext');
let password = document.getElementById('password');
let sentencePassword = document.getElementById('sentenceErrorPassword');

const regexusername = /^[a-zA-Z0-9 éèàù\-_]*$/;
const regexPassword = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&]).{12,}$/;


const checkusername = () => {
    username.classList.remove('is-valid','is-invalid');
    usernameError.classList.add('d-none');

    if(username.value === ''){
        return;
    }

    let regexusernameUser = regexusername.test(username.value);

    if(!regexusernameUser){
        username.classList.add('is-invalid','border-3');
        usernameError.classList.remove('d-none');
    } else{
        username.classList.add('is-valid','border-3');
        usernameError.classList.add('d-none');
    }
}

const checkPassword = () => {
    password.classList.remove('is-valid','is-invalid');
    sentencePassword.classList.add('d-none');
    
    if(password.value === ''){
        return;
    }

    let regexPasswordUser = regexPassword.test(password.value);

    if(!regexPasswordUser){
        password.classList.add('is-invalid');
        sentencePassword.classList.remove('d-none');
    } else{
        password.classList.add('is-valid');
        sentencePassword.classList.add('d-none');
    }
}

pwShowHide.forEach((icon) => {
    icon.addEventListener("click", () => {
        let getPwInput = icon.parentElement.querySelector("input");
        if(getPwInput.type === "password") {
            getPwInput.type = "text";
            icon.classList.replace("uil-eye-slash", "uil-eye");
        }else {
            getPwInput.type = "password";
            icon.classList.replace("uil-eye", "uil-eye-slash");
        }
    });
});



username.addEventListener('input', checkusername);
password.addEventListener('input', checkPassword);