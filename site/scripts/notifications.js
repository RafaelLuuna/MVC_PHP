
window.onload = function start (){
    ShowNotification("teste","error-box","notification");
    
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

    const boxDiv = `<div class="${type}" id="main-box">
                        <input onclick="this.parentNode.remove(); return false;" type="button" class="close-btn" value="X">
                        <p>${message}</p>
                    </div>`;
    document.getElementById(divId).innerHTML = boxDiv;
    document.getElementById('main-box').style.display = 'block';
}

