<div id="popup" class="popup">
    <div class="popup-background"></div>
    <div class="card popup flex column center">
        <p class="popup-close" onclick="document.querySelector('#popup').remove();">x</p>

        <div class="card-element w10 h3" style="<?=$_POST['popup-img-style']?>">
            <img id="popup-img" src="<?=$_POST['popup-img-path']?>">
        </div>

        <div class="card-element w10 h5">
            <h2 id="popup-title"><?=$_POST['popup-title']?></h2>
            <p id="popup-content"><?=$_POST['popup-content']?></p>
        </div>
        
        <div class="card-element w10 h2 flex row" style="<?=$_POST['popup-button-style']?>">
            <div id="popup-buttons">

            </div>
        </div>
    </div>
</div>
