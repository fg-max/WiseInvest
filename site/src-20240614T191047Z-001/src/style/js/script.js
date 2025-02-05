const btnLogin = document.getElementById("logar");
const btnCadastro = document.getElementById("cadastro");

btnLogin.addEventListener('click', function(){
    window.location.href = 'login.html'
})

btnCadastro.addEventListener('click', function(){
    window.location.href = 'cadastro.html';
})

function verSenha() {
    var eye = document.getElementById("showpwsd")
    var senha = document.getElementById("senha")

    if (senha.type === 'password') {

        senha.type = 'text';
        eye.classList.remove('fi-rs-eye');
        eye.classList.add('fi-rs-crossed-eye');
        return;
    }
    else if (senha.type === 'text') {

        senha.type = 'password';
        eye.classList.add('fi-rs-eye');
        eye.classList.remove('fi-rs-crossed-eye');
        return;
    }
}
/*---------------------------------------------------------------*/
function voltarIndex() {
    window.location.href = 'index.html'
}

function acessoLogin() {
    window.location.href = 'login.html'
}

function mostrarCard() {

    var dropdownicon = document.getElementById("dropdownicon")
    var morsou = document.getElementById("boa-morsa")

    if (morsou.classList.contains('morsado')){
        morsou.classList.remove('morsado')
        morsou.classList.add('mostrarTela')

        dropdownicon.classList.remove('fi-rr-angle-small-down')
        dropdownicon.classList.add('fi-rr-angle-small-up')
    }
    else if(dropdownicon.classList.contains('fi-rr-angle-small-up')) {
        morsou.classList.add('morsado')
        morsou.classList.remove('mostrarTela')

        dropdownicon.classList.add('fi-rr-angle-small-down')
        dropdownicon.classList.remove('fi-rr-angle-small-up')
    }
}
