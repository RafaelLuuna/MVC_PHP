insertInto("main-card","http://localhost/login/views/login.html");

function validarCadastro(){
    const email = document.querySelector('#emailCadastro').value;
    const pw1 = document.querySelector('#pw1').value;
    const pw2 = document.querySelector('#pw2').value;

    if(pw1 == pw2){
        return true;
    }else{
        generatePopup('As senhas devem ser iguais');
        return false;
    }
    

}