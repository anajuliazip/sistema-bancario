<html>

    <head>
        <title>Informações dos clientes</title>
        <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
        <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'><link rel="stylesheet" href="./style.css">

        <style>
          @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #3e94ec;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 16px;
  font-weight: 400;
  text-rendering: optimizeLegibility;
}

div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  --border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}


        </style>

<script>
            function Desejaexcluir(){
                if (confirm("Tem certeza que deseja DELETAR?")){
                    document.getElementById('excluirForm').submit();
                }

            }

        </script>
    </head>
   
    <body>
      <?php
      $tabela = "clientes";
      
      if(isset($_GET['id'])){
        echo "<h2>"."Você quer deletar o usuário: ". $_GET['nome']. "?"."</h2>";
        echo "<form action= '' method='POST'>
              <input type='hidden' name='id' value='$_GET[id]'>
              <input type='submit' name='delete' value='Deletar'>
        ";
      }
      ?>

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
  

        echo "<a href='cadastrocliente.php'>vamoquerer</a>;";
           $sql = "SELECT `id`,`nome`, `e-mail`, `telefone`, `estado civil`, `cpf`, `datadenascimento`, `idGerente`
               FROM   `anellie`.`clientes`
               WHERE `idGerente` = $_SESSION[id];";
        
        
          $resultado = $conexao -> query($sql);   
      echo "<center>";
      echo '<table>
      <tr>
          <td width=50%>
              <center>
              <span class="corBranca">Bem vindo, '.$_SESSION['Nome'].','.$_SESSION['id'].'</span>
              <br>
            <!--<a href="perfil.php">Perfil</a>-->
              </center>
          </td>
          <td width=50%>
              <center>
              <form method="post" action="buscaCliente.php" id="formBusca" name="formBusca" >
                  <span style="font-size:20px;">BUSCAR:</span><br>
                  <input type="text" name="Nome" id="Nome">
                  <input type="hidden" name="$row[1]" id="$row[1]">
                  <br>
                  
                  <input type="submit" value="BUSCAR"/>
              </form>
              </center>
          </td>
          </tr>
          <tr>
              <td colspan=2>
                  <center>
                   
                  </center>
              </td>
      </tr>
  </table>';
        if($resultado->num_rows < 1){
          echo "<p>Nenhum cliente cadastrado</p>";
        }else{
          while($row = mysqli_fetch_array($resultado)){
              echo "<br>";

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
              echo "<form method='get' action='visu.php'>";
              echo "<input type='hidden' name='id_visu' value='". $row['id'] . "'>";
              echo "<button type='submit' class=''>Visualizar</button>";
              echo "</form>";
              
        
            echo "</thead>";
            echo "</table>";
          }
          echo "</center>";
          $conexao -> close();
    
      }
    }

  
   ?>
    
        
        <a href="sair.php">Sair</a>
    </body>
</html>
