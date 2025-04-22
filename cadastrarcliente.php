<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastramento do Cliente </title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon"  href="favicon.ico" type="image/x-icon">
</head>

<body>
<?php
    $hostname = "127.0.0.1";
    $user = "root";
    $password = "root";
    $database = "anellie";

    $conexao = new mysqli($hostname, $user, $password, $database);

      session_start();

    if($conexao -> connect_errno){
        echo "Failed to connect to MySQL:" . $conexao -> connect_error;
        exit();
    }else{

        $nome = $conexao -> real_escape_string($_POST["nome"]);
        $email = $conexao -> real_escape_string($_POST["email"]);
        $datanascimento = $conexao -> real_escape_string($_POST["datanascimento"]);
        $estadocivil = $conexao -> real_escape_string($_POST["estadocivil"]);
        $cpf = $conexao -> real_escape_string($_POST["cpf"]);
        $telefone = $conexao -> real_escape_string($_POST["telefone"]);
        $senha = $conexao -> real_escape_string($_POST["senha"]);
        

        $sql = "INSERT INTO `anellie`.`clientes`
                (`nome`, `senha`, `e-mail`, `telefone`, `estado civil`,
                `cpf`, `datadenascimento`,`idGerente`)

                VALUES
                ('".$nome."','".$senha."','".$email."','".$telefone."','".$estadocivil."','".$cpf."','".$datanascimento."','".$_SESSION['id']."');";
 


        $resultado = $conexao -> query($sql);

        $conexao -> close();
      header('Location: infocliente.php', true, 301);

  }
  echo $sql;
    
    ?>

</body>
</html>