window.onload = function start (){
    alert("teste");

    var visit_count = sessionStorage.getItem('visit_count');
    if(visit_count == null){
        sessionStorage.setItem('visit_count',0);
    }else{
        sessionStorage.setItem('visit_count',parseInt(visit_count)+1);
    }
    var visit_count = sessionStorage.getItem('visit_count');
    var login_err = sessionStorage.getItem('login_err');

    if(login_err != ''){

    }

    if(visit_count > 1){
        //document.getElementById('main-box').style.display = 'none';
    }
}

function ShowNotification(box_id, text_id, message, type){
    document.getElementById(box_id).style.display = 'block';
    document.getElementById(box_id).className = type;
    document.getElementById(text_id).innerHTML = message;
}