<div class="card" id="card">
    <div>
        <div class="card-section">

            <img class="login-img" src="./img/user.png" alt="ícone de login"><br>

            <h2 class="title">LOGIN</h2>
            
            <hr color="gainsboro" size="1px">
            
        </div>

        
        <div class="card-section">
                <form action="scripts/logar.php" method="POST">
                
                <div class="input-group">
                    <label class="label" for="email">E-mail</label>
                    <input class="input" name="email" type="email" id="email" placeholder="E-mail" required>
                </div>
                
                <div class="input-group">
                    <label class="label" for="senha">Senha</label>
                    <input class="input" name="senha" minlength="3" type="password" id="password" placeholder="Senha" required>
                </div>
                
                <input class="btn verde" type="submit" value="Acessar">
            </form>
        </div>
            
        <div class="card-section">
            <hr color="gainsboro" size="1px">
            <p>Primeiro acesso?</p>
            <input class="btn branco verde" type="button" value="Cadastre-se aqui" onclick="insertInto('main-card','http://localhost/login/views/cadastro.php');">
            
        </div>
    </div>

</div>