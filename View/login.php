<?php

require_once '../Model/Usuario.php';
require_once "../Model/Conexao.php";

$usuario = new Usuario;

?>

<!DOCTYPE html>
<html PT="BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/7c890cd723.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="top-nav-bar">
      <a href="https://www.google.com.br/"><div class="search-box"></a>
            <i class="fas fa-bars" id="menu-btn" onclick="openmenu()"></i>
            <i class="fas fa-times" id="close-btn" ondblclick="closemenu()"></i>
            <a href="index.php"><img src="imagem/logo.png" class="logo"></a>
            <input type="text" class="form-control">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
        <div class="menu-bar">
            <ul>
                <li><a href="MeuCarrinho.php"><i class="fas fa-shopping-cart"></i>Meu Carrinho</a></li>
                <li><a href="historico.php">Histórico</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="compra.php">Compra</a></li>
            </ul>
        </div>    
    </div>

  <div id="form">
   <h1>Entrar</h1>
   <form method="POST">
    <input type="email" placeholder="Usuario" name="email">
    <input type="password" placeholder="Senha" name="senha" >
    <input type="submit" value="ACESSAR">
    <a href="cadastrar.php">Ainda não é cadastrado?<strong>Cadastre-se!</strong></a>
   </form>
   </div>

   <?php

if(isset($_POST['email']))
{
    $email= addslashes($_POST['email']); //dando erro
    $senha= addslashes($_POST['senha']);// dando erro

    if(!empty($email) && !empty($senha))
     //o verifica se não está vazio através do empty
    {
      $usuario->conectar("compracerta", "localhost", "root", ""); 
        if($usuario->msgErro == "")
        {
          if($usuario->logar($email, $senha))
         {
            header("location:index.php");
         }
        else
         {
          //echo "Email e/ou senha incorretos!";
          ?>
          <div class="msg-erro">
           Email e/ou senha incorretos!
         </div>
          <?php
         }
        }
        else
        {
          //echo "Erro:" .$usuario->msgErro;
          ?>
          <div class="mesg-erro">
            <?php echo "erro:" .$usuario->msgErro;?>
          </div>
          <?php
        }
    }else
    {
      //echo "Preencha todos os campos";
      ?>
      <div class="msg-erro">
      Preencha todos os campos
     </div>
      <?php
    }
      
  }
?>
</body>
</html>