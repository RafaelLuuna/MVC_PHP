<div class="main-container">
    <div class="main-container-row">
        <div class="title-box">
            <div class="title-box-margin"></div>
            <h2 class="title">NOVO USUÁRIO</h2>    
        </div>
    </div>
    <div class="main-container-row">
    <div class="card">
        <div class="card-section">
            <form action="<?=ROOT?>admin/usuario/cadastrar" method="POST">
                <div class="flex-container-column">
                    <div class="input-group">
                        <label for="nome">nome</label>
                        <input type="text" name="nome" required>
                    </div>
                
                    <div class="input-group">
                        <label for="email">e-mail</label>
                        <input id="email" type="email" name="email" required>
                    </div>
                
                    <div class="input-group">
                        <label for="senha">senha</label>
                        <input id="senha" type="password" name="senha" required>
                    </div>
                
                    <div class="input-group">
                        <label for="status">status</label>
                        <input id="status" name="status" required>
                    </div>

                </div>
                
                <input class="btn" type="submit" value="Cadastrar">
            </form>

        </div>

    </div>

    </div>
</div>