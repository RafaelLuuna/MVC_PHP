// import {showPopups} from './htmlFunctions.js';

const _MAIN_URL = 'http://localhost';
const _ACTUAL_URL = document.URL;

switch(_ACTUAL_URL){
    case _MAIN_URL+'/login/':
        showPopups();
        break;


    case _MAIN_URL+'/admin/usuarios/cadastro/':
        showPopups();
        break;
        
    case _MAIN_URL+'/admin/usuarios/':
        xhttp = new XMLHttpRequest();

        xhttp.onload = function(){
            console.log(JSON.parse(this.responseText));
            // loadTableData("tBodyUsuarios", JSON.parse(this.responseText), ['nome', 'email'],['editUser','deletUser']);
        };
        xhttp.open('POST', _MAIN_URL+'/api/users/data');
        xhttp.send();
        
        showPopups();
        break;


    case _MAIN_URL+'/admin/login/':
        showPopups();
        break;
}