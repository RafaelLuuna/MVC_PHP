<?php
defined('ROOTPATH') OR exit("Access denied.");

$popup = $_COOKIE['popup'];
$popup = explode('|',$popup);
foreach($popup as $popupElement){
    [$key, $value] = explode('::',$popupElement);
    switch($key){
        case 'title':
            $title = $value;
            break;
        case 'content':
            $content = $value;
            break;
        case 'imgPath':
            $imgPath = $value;
            break;
        case 'buttons':
            $buttons = $value;
            break;
    }
}

if(isset($imgPath)){
    $imgPath = ROOT.$imgPath;
    $imgStyle = '';
}else{
    $imgPath = '';
    $imgStyle = 'display:none;';
}

if(isset($buttons)){
    $buttonStyle = '';
}else{
    $buttonStyle = 'display:none;';
}

isset($title) or $title = '';
isset($content) or $content = '';
isset($buttons) or $buttons = '';
isset($imgPath) or $imgPath = '';


$popupElement = '';
$popupElement .= 
"<div id='popup' class='popup'>
    <div class='popup-background'></div>
    <div class='card popup flex column center'>
        <p class='popup-close' onclick=document.querySelector('#popup').remove();>x</p>

        <div class='card-element w10 h3' style='$imgStyle'>
            <img id='popup-img' src='$imgPath'>
        </div>

        <div class='card-element w10 h5'>
            <h2 id='popup-title'>$title</h2>
            <p id='popup-content'>$content</p>
        </div>
        
        <div class='card-element w10 h2 flex row' style='$buttonStyle'>
            <div id='popup-buttons'>

            </div>
        </div>
    </div>
</div>";

echo $popupElement;