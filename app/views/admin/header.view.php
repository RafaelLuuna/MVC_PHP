<div class="header">
    <div class="flex row nowrap header-margin">
        <div class="header-info">
            <h2>ÁREA ADMINISTRATIVA</h2>
            <p>USUÁRIO: <?=$_SESSION["userData"]["nome"]?></p>
            <b>Admin</b>
        </div>
        <img src="<?=ROOT?>assets/img/logos/logo_white_transparent.png" alt="logotipo" class="header-logo">
        
    </div>
    <div class="flex row nowrap header-menu header-margin">
            <a class="fit-content" href="<?=ROOT?>admin/logout">
                <div class="item-menu">
                    <img src="<?=ROOT?>assets/img/icons/exit.png" alt="ícone de usuário">
                    <p>Logout</p>
                </div>
            </a>
            <div class="flex row nowrap">
                <a class="fit-content" href="<?=ROOT?>admin/usuario">
                    <div class="item-menu">
                        <img src="<?=ROOT?>assets/img/icons/users.png" alt="ícone de usuário">
                        <p>Usuários</p>
                    </div>
                </a>


                <a class="fit-content" href="<?=ROOT?>admin/produto">
                    <div class="item-menu">
                        <img src="<?=ROOT?>assets\img\icons\search.png" alt="ícone de usuário">
                        <p>Produtos</p>
                    </div>
                </a>


                <a class="fit-content" href="<?=ROOT?>admin/config">
                    <div class="item-menu">
                        <img src="<?=ROOT?>assets/img/icons/config.png" alt="ícone de usuário">
                        <p>Config</p>
                    </div>
                </a>
            </div>
        </div>
</div>