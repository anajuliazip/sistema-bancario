<html>
    <body>
		
		<?php
			// iniciar uma sessão
			session_start();
			
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "root";
			$database = "anellie";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres epsciais (SQL Inject)
				$nomegerente = $conexao -> real_escape_string($_POST['Nome']);
				$senha = $conexao -> real_escape_string($_POST['Senha']);

				$sql="SELECT `Nome`, `Senha` FROM `anellie`.`clientes`
					WHERE `Nome` = '".$nomecliente."'
					AND `Senha` = '".$senha."';";

				$resultado = $conexao->query($sql);
				
				if($resultado->num_rows != 0)
				{
					$row = $resultado -> fetch_array();
					$_SESSION['id'] = $row[0];
					$_SESSION['Nome'] = $row[1];
					$conexao -> close();
					
					header('Location: pageclient.php', true, 301);
					exit();
				} else {
					
					$conexao -> close();
					header('Location: index.php', true, 301);
				}
			}
		?>
	</body>
</html>