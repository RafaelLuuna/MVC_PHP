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

function generatePopup(type, message){
    const div = document.createElement('div');
    const clsBtn = document.createElement('input')
    const msgP = document.createElement('p');

    div.setAttribute("class",type);
    div.style.display = "block";

    clsBtn.setAttribute("onclick",'closePopup(this.parentNode);')
    clsBtn.setAttribute("type","button")
    clsBtn.setAttribute("class","close-btn")
    clsBtn.setAttribute("value","X")

    msgP.innerText = message

    div.appendChild(clsBtn);
    div.appendChild(msgP);

    return div;
}

function showPopups(){
    const popupLimit = 10;

    for(i = popupLimit; i >= 0; i--){
        
        try{
            const cookies = document.cookie.split('; ');
            const popupCookie = cookies
                                        .find((row) => row.startsWith('popup-'+i))
                                        ?.split('=');
            const msg = decodeURI(popupCookie[1].replace('+',' '));
            const cor = popupCookie[0].split('-')[2];
            
            const popupElement = generatePopup('popup '+ cor, msg);

            insertInto("main-popup", popupElement, false);

            console.log(cookies);

            console.log(popupElement);

            

        }catch(err){}

    }

}

function closePopup(element){
    element.style.animation = 'subir 1s';
    element.style.transform = 'translate(-50%, -200%)';
    window.setTimeout(function(){
        element.remove();
    }, 500);
    return false;
}


