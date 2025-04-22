<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Login Cliente </title>
<link rel="stylesheet" href="style2.css">
        </head>
        <body>


    <form action='verificaLoginCliente.php' method='POST'>


    <div class="wrapper fadeInDown">
    <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="inactive underlineHover"> Login </h2>


    <!-- Imagem -->
     
    <div class="fadeIn first">
      <img src="boneco.png" id="icon" alt="User Icon" />
    </div>


    <!-- claculo  Form -->

    
        <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="Nome">  
        <input type="password" id="senha" class="fadeIn second" name="senha" placeholder="Senha">        
        <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>


    <!-- Voltar para o inicio -->
    <div id="formFooter">
      <a class="underlineHover" href="index.php">Deseja voltar para o inicio?</a>
    </div>
  

    </div>
    </div>
   
        </header>
        </body>
</html>
