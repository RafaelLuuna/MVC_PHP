<div class="header">
    <div class="flex row nowrap header-margin">
        <div class="header-info">
            <h2>Sistema ERP</h2>
            <p>USUÁRIO: <?=Session::get('userData')['nome'];?></p>
        </div>
        <img src="http://localhost/promotendas/public/assets/img/logos/logo_white_transparent.png" alt="logotipo" class="header-logo">
        
    </div>
    <div class="flex row nowrap header-menu header-margin">
            <a class="fit-content" href="http://localhost/promotendas/public/logout">
                <div class="item-menu">
                    <img src="http://localhost/promotendas/public/assets/img/icons/exit.png" alt="ícone de usuário">
                    <p>Logout</p>
                </div>
            </a>
            <div class="flex row nowrap">
                <a class="fit-content" href="<?=ROOT?>pedido">
                    <div class="item-menu">
                        <img src="<?=ROOT?>assets/img/icons/info_pedido.png" alt="ícone de usuário">
                        <p>Novo pedido</p>
                    </div>
                </a>

                <a class="fit-content" href="<?=ROOT?>consulta">
                    <div class="item-menu">
                        <img src="<?=ROOT?>assets/img/icons/search.png" alt="ícone de usuário">
                        <p>Consulta</p>
                    </div>
                </a>
            </div>
        </div>
</div>