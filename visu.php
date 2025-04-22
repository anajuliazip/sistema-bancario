<html>

    <head>
        <title>Visualizar</title>
        <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
        <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'><link rel="stylesheet" href="./style.css">
  
    </head>
<body>
    
            <h2>Visualizar Usuário</h2>
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

        if($_SERVER["REQUEST_METHOD"] == 'GET'){
            if(isset($_GET['id_visu'])){
           
            $clientes = $_GET['id_visu'];
    
            $query = "SELECT`id`,`nome`, `e-mail`, `telefone`, `estado civil`, `cpf`, `datadenascimento`, `idGerente`
                FROM   `anellie`.`clientes` WHERE `id` = $clientes;";
 
                $resultado = $conexao -> query($query);
                while($row = mysqli_fetch_array($resultado)){
              echo "<table>";
              echo "<thead>";
              echo "<tr>";
              echo "<th> ID</th>
                    <th> Nome</th>
                    <th>CPF</th>
                    <th>Estado Civil</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Data de Nascimento</th>
                    <th>Id do Gerente</th>
                    <th></th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              echo "<td>".$row['id']."</strong>"."</td>";
              echo "<td>".$row[1]."</strong>"."</td>";
              echo "<td>".$row[2]."</strong>"."</td>";
              echo "<td>".$row[3]."</strong>"."</td>";
              echo "<td>".$row[4]."</strong>"."</td>";
              echo "<td>".$row[5]."</strong>"."</td>";
              echo "<td>".$row[6]."</strong>"."</td>";
              echo "<td>".$row[7]."</strong>"."</td>";
              echo "<form method='POST' action='delete.php'>";
              echo "<input type='hidden' name='idCliente' value='". $row['id'] . "'>";
              echo "<button type='submit' class=''>Excluir</button>";
              echo "</form>";
              echo "<td> <a href='infocliente.php'> Voltar</a></td>";
              echo "<td> <a href='cartao.php'>Cadastrar Cartao</a></td>";
              echo "</thead>";
              echo "</table>";
            }if($resultado->num_rows < 1){
                echo "Usuario não encontrado" . $conexao->error;
            }
        }
    
            $conexao->close();
    
    }
        

    ?>

</body>