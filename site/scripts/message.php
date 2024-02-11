
window.onload = function start (){
    ShowNotification("teste","message red","notification-container");
    
    // var login_err = sessionStorage.getItem('login_err');

    // if(login_err != ''){

    // }

    // if(visit_count > 1){
    //     //document.getElementById('main-box').style.display = 'none';
    // }
}

function VerifyLogin(){

}

function ShowNotification(message, type, divId){

    const div = document.createElement('div');
    const clsBtn = document.createElement('input')
    const messageP = document.createElement('p');

    div.setAttribute("class",type);
    div.setAttribute("id","main-box");
    div.style.display = "block";
    
    clsBtn.setAttribute("onclick","this.parentNode.remove(); return false;")
    clsBtn.setAttribute("type","button")
    clsBtn.setAttribute("class","close-btn")
    clsBtn.setAttribute("value","X")

    messageP.innerText = message

    div.appendChild(clsBtn);
    div.appendChild(messageP);
    
    document.getElementById(divId).appendChild(div);
}
