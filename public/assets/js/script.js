const pwShowHide = document.querySelectorAll(".pw_hide");
let user = document.getElementById('user');
let userError = document.getElementById('usererrortext');
let password = document.getElementById('password');
let sentencePassword = document.getElementById('sentenceErrorPassword');

const regexuser = /^[a-zA-Z0-9 éèàù\-_]*$/;
const regexPassword = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&]).{12,}$/;


const checkuser = () => {
    user.classList.remove('is-valid','is-invalid');
    userError.classList.add('d-none');

    if(user.value === ''){
        return;
    }

    let regexuserUser = regexuser.test(user.value);

    if(!regexuserUser){
        user.classList.add('is-invalid','border-3');
        userError.classList.remove('d-none');
    } else{
        user.classList.add('is-valid','border-3');
        userError.classList.add('d-none');
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



user.addEventListener('input', checkuser);
password.addEventListener('input', checkPassword);