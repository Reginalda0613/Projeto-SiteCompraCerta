<?php


Class Usuario
{
    private $pdo;
    public $msgErro="";
    public function conectar($nome, $host, $usuario, $senha)
    {
      global $pdo;
       
      try{
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,
        $usuario,$senha);
      }catch (PDOException $e){
          $msgErro= $e->getMessage();
    }
  }
public function cadastrar($nome, $telefone, $email, $senha){

    global $pdo;
    //verificar se já tem o email cadastrado
    $sql =$pdo->prepare("SELECT id_usuario, FROM usuarios WHERE
    email= :email");
    $sql->bindValue(":email",$email);
    $sql->execute();
    if($sql->rowCount() > 0)
    {
        return false; //já tem cadastro
    }
    else
    {
         //se nao, Cadastrar
         $sql =$pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha)
          VALUES (:nome, :telefone, :email, :senha)");
         $sql->bindValue(":nome",$nome);
         $sql->bindValue(":telefone",$telefone);
         $sql->bindValue(":email",$email);
         $sql->bindValue(":senha",md5($senha));
         $sql->execute();
         return true;
    }
}
public function logar($email, $senha)
{
    global $pdo;
    //verifica se já tem email e senha estam cadastrado, se sim
    $sql = $pdo->prepare("SELECT id_usuario FROM usuarios
    WHERE email= :email AND senha=:senha");
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", md5($senha));
    $sql->execute();
    if($sql->rowCount() > 0)
    {
          //acessa o sistema (sessão)
           $dado = $sql->fetch();
           session_start();
           $_SESSION['id_usuario']=$dado['id_usuario'];
           return true; //logado com sucesso
    }
    else
    {
      return false; //não foi possivel logar
    }
  }
}

?>