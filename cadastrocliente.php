
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Cadastro do Cliente </title>
<link rel="stylesheet" href="style2.css">
        </head>
        <style>
        .container_form {

width: 700px;
margin: auto;
display: flex;
flex-direction: column;
background:#ffffff; 
box-shadow: 1px 0px 1.2px 0px #e3e3e3; 
border-radius:3px; 
padding:1em;

}

.container_form h1 {

font-family:'open_sansregular';
font-size: 2.3em;
color: #00dae0;
border-bottom: 1px #f0eded solid;
margin-bottom: 10px;
padding-bottom: 10px;

}

.form_grupo {
width: 90%;
margin: 0 auto;
margin-bottom: 30px;
position: relative;
}

.form_grupo .legenda { 

width: 100%;
float: left;
margin-top: 15px;
margin-bottom: 15px;
font-weight: bold;
}

/* SUBMIT */

.submit { width:100%; float:left; }

.submit_btn {

float: left;
display: block;
padding: 5px 30px;
border: none;
outline: none;
background-color: #6fcffb;
color: #fff;
text-shadow: 0 0 5px rgb(0, 0, 0);
font-family: inherit;
font-size: 25px;
font-family:'open_sansregular';
border-radius: 6px;
margin: 20px auto;
cursor: pointer;
transition: all 0.3s;
}

.submit_btn:hover {

background-color: #444444;
transform: scale(1.03);

}

.dropdown {
display: block;
margin: 0 auto;
font-size: 16px;
font-family: inherit;
color: #222222;
border-radius: 4px;
border: 1px #f2f2f2 solid;
background: #fdfdfd;
outline: none;
padding-left: 10px;
width: 100%;
}

.form_new_input {
display: none;
}

.radio_label,
.check_label {

float: left;
width: 100%;
padding-left: 30px;
cursor: pointer;
margin-bottom: 8px;

}


.radio_new_btn {

position: absolute;
left: 0;
transform: translateY(3px);
height: 20px;
width: 20px;
border-radius: 50%;
border: 0.2em solid #4c4c4c;

}

.radio_new_btn::after {

content: "";
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
width: 8px;
height: 8px;
border-radius: 50%;
background-color: #6fcffb;
visibility: hidden;

}

.check_new_btn {

position: absolute;
left: 0;
height: 20px;
width: 20px;
border: 0.2em solid #4c4c4c;

}

.check_new_btn::after {

content: "";
height: 8px;
width: 8px;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
background-color: #6fcffb;
visibility: hidden;

}

.form_new_input:checked ~ .radio_label .radio_new_btn::after,
.form_new_input:checked ~ .check_label .check_new_btn::after {

visibility: visible;
}

.form_new_input:checked ~ .radio_label,
.form_new_input:checked ~ .check_label {
color: #6fcffb;
}


.form_grupo {

width: 100%;
margin-bottom: 20px;
position: relative;

}

.form_input {

font-size: 16px;
font-family: inherit;
padding: 8px 15px;
border-radius: 4px;
border: 1px #f2f2f2 solid;
background: #fdfdfd;
outline: none;
width: 100%;
transition: all 0.3s;

}

.form_message,
.form_message .message_input {

width: 100%;
float:left;

}

.form_message_label {

width: 100%;
float: left;
margin-top: 15px;
margin-bottom: 15px;
font-weight: bold;

}

</style>
<body>
<div class="container_form">
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
 
echo "<center>";
echo '<table>
    <td width=50%>
              <center>
              <span class="corBranca">Bem vindo, '.$_SESSION['Nome'].','.$_SESSION['id'].' </span>
              
              <br>
            <!--<a href="perfil.php">Perfil</a>-->
              </center>
          </td>
</table>';


echo '<h1>Formulário de Cadastro</h1>
    

<form class="form" action="cadastrarcliente.php" method="post">
    
    <div class="form_grupo">
        <label for="nome" class="form_label">Nome</label>
        <input type="text" name="nome" class="form_input" id="nome" placeholder="Nome" required>
    </div>
    
    <div class="form_grupo">
        <label for="e-mail" class="form_label">Email</label>
        <input type="email" name="email" class="form_input" id="email" placeholder="seuemail@email.com" required>
    </div>
    
    <div class="form_grupo">
        <label for="datanascimento" class="form_label">Data de Nascimento</label>
        <input type="date" name="datanascimento" class="form_input" id="datanascimento" placeholder="Data de Nascimento" required>
    </div>        

    <div class="form_grupo">
        
        <label for="estadocivil" class="text">Estado civil</label>
        <select name="estadocivil" id="estadocivil" class="dropdown" required>
            
            <option selected disabled class="form_select_option" value="">Selecione</option>
            <option value="Solteiro" class="form_select_option">Solteiro(a)</option>
            <option value="Casado" class="form_select_option">Casado(a) </option>
            <option value="Divorciado" class="form_select_option">Divorciado(a)</option>                    
            <option value="Viúvo" class="form_select_option">Viúvo(a)</option>                    
        
        </select>

    </div>

    
    <div class="form_grupo">
        <label for="cpf" class="form_label">CPF</label>
        <input type="text" class="ls-mask-cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"  name="cpf" class="form_input" id="cpf" placeholder="000.000.000-00" required>
    </div>
    <div class="form_grupo">
        <label for="Telefone" class="form_label">Telefone</label>
        <input type="tel" name="telefone" class="form_input" id="telefone" placeholder="Telefone" required>
    </div>
    
    <div class="form_grupo">
        <label for="senha" class="form_label">Senha</label>
        <input type="text" name="senha" class="form_input" id="senha" placeholder="Senha" required>
    </div>
    </div>
    
        <div class="submit">

          
          <button type="submit" name="Submit" class="submit_btn" >Cadastrar</button>
        
        </div>
        
</form>';
}
?>
</div><!--container_form-->
</body>
</html>