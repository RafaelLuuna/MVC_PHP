<div class="main-container">
    
    <div class="flex row">
        <div class="title-box">
            <div class="title-box-margin"></div>
            <h2 class="title">Usuarios</h2>    
        </div>
        <div class="flex row">
            <a href="http://localhost/promotendas/public/admin/usuario/cadastro" class="btn">Novo usuário</a>
        </div>
    </div>


    <div class="flex row">
        <div class="flex column w10">
            <?=Controller::loadTable('usuarios',['id','nome','email','status'])?>
            <div class="flex row w10">
                <div></div>
                <div>
                    <a href="<?=ROOT.$_GET['url']?>&page=1">1</a>
                </div>
            </div>
            
        </div>
    </div>
</div>