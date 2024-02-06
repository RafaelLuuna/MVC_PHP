<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/style.css">


</head>
<body>
                    <div class="error-box" id="main-box">
                        <input onclick="this.parentNode.remove(); return false;" type="button" class="close-btn" value="X">
                        <p id="main-box-text"></p>
                    </div>


    <form class="form" action="scripts/logar.php", method="POST">
        <div class="card">
            <div class="card-section">
                <div class="card-section">

                    <img class="login-img" src="./img/user.png" alt="ícone de login"><br>
        
                    <h2 class="title">LOGIN</h2>
        
                    <hr color="gainsboro" size="1px">

                </div>

                <div class="card-section">

                    <div class="input-group">
                        <label class="label" for="email">E-mail</label>
                        <input class="input" name="email" type="email" id="email" placeholder="E-mail" required>
                    </div>

                    <div class="input-group">
                        <label class="label" for="senha">Senha</label>
                        <input class="input" name="senha" minlength="3" type="password" id="password" placeholder="Senha" required>
                    </div>

                    <input class="btn-type btn-verde" type="submit" value="Acessar">
                </div>

                <div class="card-section">
                    <hr color="gainsboro" size="1px">
                    <p>Primeiro acesso?</p>
                    <input class="btn-type btn-branco-verde" type="button" value="Cadastre-se aqui" onclick="JavaScript:location='singup_page.php'" >

                </div>
            </div>
        </div>

        </div>
    </form>

    

    <!-- <script src="scripts/notifications.js"></script> -->

</body>
</html>