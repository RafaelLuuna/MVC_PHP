
window.onload = function start (){
    ShowNotification("mensagem de teste", "error-box", "notification")

    // var visit_count = sessionStorage.getItem('visit_count');
    // if(visit_count == null){
    //     sessionStorage.setItem('visit_count',0);
    // }else{
    //     sessionStorage.setItem('visit_count',parseInt(visit_count)+1);
    // }
    // var visit_count = sessionStorage.getItem('visit_count');
    // var login_err = sessionStorage.getItem('login_err');

    // if(login_err != ''){

    // }

    // if(visit_count > 1){
    //     //document.getElementById('main-box').style.display = 'none';
    // }
}

function ShowNotification(message, type, divId){

    const boxDiv = `<div class="${type}" id="main-box">
                        <input onclick="this.parentNode.remove(); return false;" type="button" class="close-btn" value="X">
                        <p>${message}</p>
                    </div>`;
    document.getElementById(divId).innerHTML = boxDiv;
}

