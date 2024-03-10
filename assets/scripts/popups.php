<?php


function setPopupCookie($msg, $typ='none'){
    setcookie('popup[msg]', $msg ,time()+60*10,'/');
    setcookie('popup[typ]',$typ,time()+60*10,'/');
}

function showPopups($popupContainer = '#main-popup'){
    var_dump($_COOKIE);
    if (isset($_COOKIE['popup'])) {
        foreach ($_COOKIE['popup'] as $k => $v) {
            if($k == 'msg') $msg = $v;
            if($k == 'typ') $typ = $v;
        }
        
        setcookie('popup[msg]','',1, '/');
        setcookie('popup[typ]','',1, '/');
        echo '<script>generatePopup("'.$msg.'", "'.$typ.'");</script>';
    }   
}


?>