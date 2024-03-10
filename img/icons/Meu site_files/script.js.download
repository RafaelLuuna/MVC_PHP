var _CURRENT_URL = window.location.href;


switch(_CURRENT_URL){
    case 'http://localhost/admin/usuarios/cadastro/':
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
        break;
        
    case 'http://localhost/admin/usuarios/':
        xhttp = new XMLHttpRequest();

        xhttp.onload = function(){loadTable("tBodyUsuarios", JSON.parse(this.responseText));};


        xhttp.open('POST', 'http://localhost/api/users/data');
        xhttp.send();
        break;
}








