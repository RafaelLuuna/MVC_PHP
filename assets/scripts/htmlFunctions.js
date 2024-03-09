function insertInto(parentId, newElement, replace = true){
    
    if(replace == true){
        try{
            document.getElementById(parentId).child.remove();
        }
        catch(err){    }

    }

    switch(typeof newElement){
        case "string":
            fetch(newElement)
                .then(response => response.text())
                .then(data => {
                    document.getElementById(parentId).innerHTML = data;
                })
                .catch(error => console.error('Erro ao carregar ' + newElement + ':', error));
                break;
        
        case "object":
            document.getElementById(parentId).appendChild(newElement);
            break;
        
        default:
            console.log('elemento não identificado');

    }
    
}

function generatePopup(message, type, popupContainer = '#main-popup'){
    const mainDiv = document.querySelector(popupContainer);

    const div = document.createElement('div');
    const clsBtn = document.createElement('input');
    const msgP = document.createElement('p');

    div.setAttribute("class", "popup "+type);
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

function loadTable(tBodyId, json_data){
    const tBody = document.getElementById(tBodyId);    

    json_data.forEach((element) => {
        const tr = document.createElement('tr');
        const tdNome = document.createElement('td');
        const tdEmail = document.createElement('td');
        const tdActions = document.createElement('td');
        const divButtons = document.createElement('div');
        const btnAceitar = document.createElement('div');
        const btnNegar = document.createElement('div');
    
        
        btnAceitar.className = "tbl-btn green"
        btnAceitar.onclick = "";
        btnAceitar.innerHTML = '<i class="fa-solid fa-check"></i>';
        
        btnNegar.className = "tbl-btn red"
        btnNegar.innerHTML = '<i class="fa-solid fa-trash"></i>';
        
        divButtons.className = "tbl-cell";
        divButtons.appendChild(btnAceitar);
        divButtons.appendChild(btnNegar);
        
        tdActions.appendChild(divButtons);
        tdNome.innerText = element['nome'];
        tdEmail.innerText = element['email'];
        
        tr.append(tdNome);
        tr.append(tdEmail);
        tr.append(tdActions);
        
        tBody.append(tr);
    });
}

function closePopup(element){
    element.style.animation = 'subir 1s';
    element.style.transform = 'translate(-50%, -200%)';
    window.setTimeout(function(){
        element.remove();
    }, 500);
    return false;
}


function waitForElm(selector) {
    return new Promise(resolve => {
        if (document.querySelector(selector)) {
            return resolve(document.querySelector(selector));
        }

        const observer = new MutationObserver(mutations => {
            if (document.querySelector(selector)) {
                observer.disconnect();
                resolve(document.querySelector(selector));
            }
        });

        // If you get "parameter 1 is not of type 'Node'" error, see https://stackoverflow.com/a/77855838/492336
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    });
}

