<?php

if(!defined('BASE')){
    header('location: http://localhost/admin/');
}
blocker('http://localhost/admin/login', 'admin_users');

// Define a var 'redirect' da session para 'admin'. 
// Dessa forma a próxima vez que a requisição bater no index principal do site o usuário será redirecionado para a página de admin.
if(session_status() === PHP_SESSION_NONE) session_start();
$_SESSION['redirect'] = 'admin';

?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu site</title>

    <link rel="stylesheet" href="http://localhost/assets/css/style.css">
    <script src="https://kit.fontawesome.com/8d8f4ee15f.js" crossorigin="anonymous"></script>
    
</head>
<body>
    
    <div class="main-container">
        <div id="main-popup"></div>
        <div>
            <div class="title-box">
                <div class="title-box-margin"></div>
                <h2 class="title">INFORMAÇÕES DO PEDIDO</h2>    
            </div>

        </div>
        <div class="tabela">
            <table>
                <thead>
                    <tr>
                        <th style="width: 40%;">nome</th>
                        <th style="width: 40%;">e-mail</th>
                        <th style="width: 20%;">ação</th>
                    </tr>
                    
                </thead>
                <tbody id= "tBodyUsuarios">
                    
                </tbody>
                    
            </table>  

        </div>
            
        <a href="http://localhost/admin/login">Sair</a>
    </div>
        
    <script src="http://localhost/assets/scripts/htmlFunctions.js"></script>
    <script src="http://localhost/admin/dashboard/scripts/script.js"></script>
</body>
</html>