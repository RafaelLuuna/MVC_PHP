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
    <div id="main-popup"></div>
    <div id="main-card">
        <div class="card large" id="card">
            <div class="card-section">
                <div class="card-section">

                    <h2 class="title">DASHBOARD</h2>
                    
                    <hr color="gainsboro" size="1px">
                    
                </div>

                <div class="card-header">

                </div>

                
                <div class="card-section">
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
                <div class="card-section">
                    <br>
                    <a href="http://localhost/admin/login">Sair</a>

                </div>
            </div>
        </div>
    </div>
    
    
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="http://localhost/assets/scripts/htmlFunctions.js"></script>
    <script src="http://localhost/admin/scripts/script.js"></script>
</body>
</html>