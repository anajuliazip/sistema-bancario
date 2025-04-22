<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastramento do Gerente </title>
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

    if($conexao -> connect_errno){
        echo "Failed to connect to MySQL:" . $conexao -> connect_error;
        exit();
    }else{

        $nome = $conexao -> real_escape_string($_POST["nome"]);
        $email = $conexao -> real_escape_string($_POST["email"]);
        $cpf = $conexao -> real_escape_string($_POST["cpf"]);
        $cargo = $conexao -> real_escape_string($_POST["cargo"]);
        $senha = $conexao -> real_escape_string($_POST["senha"]);

        $sql = "INSERT INTO `anellie`.`gerentes`
                (`Nome`, `Senha`, `E-mail`, `Cargo`,
                `cpf`)

                VALUES
                ('".$nome."','".$senha."','".$email."','".$cargo."','".$cpf."');";
 


        $resultado = $conexao -> query($sql);

        $conexao -> close();
       header('Location: index.php', true, 301);

  }
  echo $sql;
    
    ?>

</body>
</html>