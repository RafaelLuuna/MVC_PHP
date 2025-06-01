<div class="main-container">
    
    <div class="flex row">
        <div class="title-box">
            <div class="title-box-margin"></div>
            <h2 class="title">Produtos</h2>    
        </div>
    <!-- <div class="flex row">
        <a href="admin/usuarios/cadastro" class="btn">Novo usuário</a>
    </div> -->


    </div>
    <div class="flex row">
        <?=Controller::loadTable('produtos',['descricao', 'categoria', 'valor_venda'])?>

    </div>
</div>