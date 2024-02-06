<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form class="form" action="scripts/cadastrar.php" method="POST">
        <div class="card">
            <div class="card-section">
                <div class="card-section">
                    <h1>Cadastro</h1>
                    <p>Preencha os campos abaixo para se cadastrar no sistema</p>

                    <hr color="gainsboro" size="1px">
                </div>
                <div class="card-section">
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
                        <input type="password" name="confirmar senha" required>
                    </div>
                    <input class="btn-type btn-verde" type="submit" value="Cadastrar">
                </div>
                <div class="card-section">
                    <hr color="gainsboro" size="2px">
                    <div style="font-size: 10px;">
                        <p>já possui cadastro?</p>
                        <a href="login_page.php">Clique aqui para voltar a tela de login</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>