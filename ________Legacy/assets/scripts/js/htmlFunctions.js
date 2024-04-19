import DOMPurify from 'dompurify';

const TABLE_BUTTONS = {
    editUser:function(element){

        return createButton(_MAIN_URL+'/admin/usarios/edit?id='+element.id_usuario,'red','fa-solid fa-check');

    },
    deleteUser:function(element){

        return createButton(_MAIN_URL+'/admin/usarios/edit?id='+element.id_usuario,'red','fa-solid fa-check');

    }
}


//:::DOM MANIPULATION:::

export function insertInto(parentId, newElement, replace = true){
    
    if(replace == true){
        document.getElementById(parentId).innerHTML = "";
    }

    switch(typeof newElement){
        case "string":
            //Caso seja string, significa que está buscando o elemento de uma URL
            fetch(newElement)
                .then(response => response.text())
                .then(data => {
                    data = DOMPurify.sanitize(data);
                    document.getElementById(parentId).innerHTML = data;
                })
                .catch(error => console.error('Erro ao carregar ' + newElement + ':', error));
            break;
        
        case "object":
            document.getElementById(parentId).appendChild(newElement);
            break;
        
        default:
            console.error('O tipo do elemento é inválido');

    }
    
}

export function validarSenha(){
    const pw1 = document.querySelector('#pw1');
    const pw2 = document.querySelector('#pw2');

    if(pw1.value == pw2.value){
        pw2.setCustomValidity('');
    }else{
        pw2.setCustomValidity('As senhas devem ser iguais');
    }
    

}

export function createButton(href, color, icon){
    const btn = document.createElement('a');
    const i = document.createElement('i');

    btn.href = href;
    btn.className = 'tbl-btn';

    i.className = icon;

    btn.append(icon);
    return btn;
}

export function loadTableData(tBodyId, jsonData, columns, actions=[]){
    const tBody = document.getElementById(tBodyId);    
    
    if(actions.length > 0){
        columns.push('actions');
    }

    jsonData.forEach((element) => {
        const tr = document.createElement('tr');
        columns.forEach((column)=>{
            const td = document.createElement('td');
            if(column == 'actions'){
                const divButtons = document.createElement('div');
                actions.forEach((action)=>{
                    const btn = TABLE_BUTTONS[action](element);
                    divButtons.append(btn);
                    td.append(divButtons);
                });
            }else{
                td.innerText = element[column];
            }

            tr.append(td);
        });
        tBody.append(tr);
    });
    
}


//:::POPUPS:::

function createPopup(message, type, popupContainer = '#main-popup'){
    const mainDiv = document.querySelector(popupContainer);

    const div = document.createElement('div');
    const clsBtn = document.createElement('input');
    const msgP = document.createElement('p');

    div.setAttribute("class", "popup "+type);
    div.id = "popupDiv";
    div.style.display = "block";

    clsBtn.setAttribute("onclick",'closePopup(this.parentNode);');
    clsBtn.setAttribute("type","button");
    clsBtn.setAttribute("class","close-btn");
    clsBtn.setAttribute("value","X");

    msgP.innerText = message;

    div.appendChild(clsBtn);
    div.appendChild(msgP);

    mainDiv.append(div);

    setTimeout(closePopup,5*1000,div)
    
}

export function showPopups(){
    const rawCookie = document.cookie.split('; ');
    let msg = '';
    let typ = '';
    rawCookie.forEach((cookie)=>{
        cookie = cookie.split('=');
        key = decodeURI(cookie[0]);
        value = decodeURI(cookie[1]);
        if(key == "popup[msg]"){
            msg = value;
            document.cookie = "popup[msg]=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }else if(key == "popup[typ]"){
            typ = value;
            document.cookie = "popup[typ]=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
    });
    if(msg != '' || typ != ''){
        createPopup(msg,typ);

    }
}

export function closePopup(element){
    element.style.animation = 'subir 1s';
    element.style.transform = 'translate(-50%, -200%)';
    window.setTimeout(function(){
        element.remove();
    }, 500);
    return false;
}




