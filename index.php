<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

spl_autoload_register(function($class) {
    if(file_exists("$class.php")) {
        require_once "$class.php";
        return true;
    }
});
?>

<!DOCTYPE html>
<html lang="pt-br">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agenda de contatos</title>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB' crossorigin='anonymous' />
    
    <link href='https://use.fontawesome.com/releases/v5.1.0/css/all.css' rel='stylesheet' integrity='sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt' crossorigin='anonymous' />

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js' integrity='sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T' crossorigin='anonymous'></script>

</header>
<body>
<style>
   h1 {
        margin-top: 20px;
        margin-left: 48px;
    }     
    
</style>

<?php
    if($_GET) {
        $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
        $method     = isset($_GET['method']) ? $_GET['method'] : null;
        if($controller && $method) {
            if(method_exists($controller, $method)) {
                $parameters = $_GET;
                unset($parameters['controller']);
                unset($parameters['method']);
                call_user_func(array($controller, $method), $parameters);

            } else {
                echo "Método não encontrado!";
            }
        } else {
            echo "Controller não encontrado!";
        }
    } else {
        echo '<h1>Contatos</h1><hr><div class="container">';
        echo 'Bem-vindo ao aplicativo MVC Contatos!<br /><br />'; 
        echo '<a href="?controller=ContatosController&method=listar" class="btn btn-success">Vamos Começar!</a></div>';
    }
?>
</body>
</html>