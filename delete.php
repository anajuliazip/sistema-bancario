<!DOCTYPE html>

<html lang="pt">


    <head>
        <title>Delete</title>
        <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
        <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'><link rel="stylesheet" href="./style.css">
  
    
    </head>
<body>
    
            <h2>TEM CERTEZA QUE DESEJA DELETAR O USUÁRIO?</h2>
    <?php
    
    

      session_start();


      
    $hostname = "127.0.0.1";
    $user = "root";
    $password = "root";
    $database = "anellie";

    $conexao = new mysqli($hostname, $user, $password, $database);

      if($conexao -> connect_errno){
        echo "Failed to connect to MySQL:" . $conexao -> connect_error;
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if(isset($_POST['idCliente']))
       
        $clientes = $_POST['idCliente'];

        $query = "DELETE FROM `clientes` WHERE `id` = $clientes";
    
        if($conexao->query($query) === TRUE){
            echo "Usuário deletado com sucesso";
            header('Location: infocliente.php', true, 301);
        }else{
            echo "Erro ao deletar usuário" . $conexao->error;
        }
    }

        $conexao->close();

    ?>

    
  
</body>