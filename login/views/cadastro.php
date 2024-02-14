<div class="card" id="card">
    <div>
        <div class="card-section">
            <h1>Cadastro</h1>
            <p>Preencha os campos abaixo para se cadastrar no sistema</p>

            <hr color="gainsboro" size="1px">
        </div>
        <div class="card-section">
            <form action="scripts/cadastrar.php" method="POST">
                <div class="input-group">
                    <label for="nome">nome</label>
                    <input type="text" name="nome" required>
                </div>

                <div class="input-group">
                    <label for="email">e-mail</label>
                    <input type="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="senha">senha</label>
                    <input type="password" name="senha" required>
                </div>

                <div class="input-group">
                    <label for="confirmar senha">confirmar senha</label>
                    <input type="password" name="confirmarSenha" required>
                </div>
                <input class="btn verde" type="submit" value="Cadastrar">
            </form>
        </div>

        <div class="card-section">
            <hr color="gainsboro" size="2px">
            <div style="font-size: 10px;">
                <p>já possui cadastro?</p>
                <a href="">Clique aqui para voltar a tela de login</a>
            </div>
        </div>
    </div>
</div>