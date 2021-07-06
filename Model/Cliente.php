<?php

require "Conexao.php";

class Cliente{
    private $id;
    private $nome;
    private $cpf;
    private $enderecoEntrega;
    private $telefone; 
    private $listaPedido = array();

    public function __construct($id, $nome, $cpf, $endereco,
    $telefone){    
    }

    public function addPedido($ped){
        $this->listaPedido[count($this->listaPedido)] = $ped;
    }

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCpf(){
        return  $this->cpf;
    }

    public function  getEndereco(){
        return $this->enderecoEntrega;
    }

    public function  getTelefone(){
        return $this->telefone;
    }

    public function setId($id){
         $this->id= $id;
    }

    public function setNome($nome){
        $this->nome= $nome;
    }

    public function setCpf($cpf){
         $this->cpf= $cpf;
    }

    public function  setEnderecoEntrega($endereco){
        $this->enderecoEntrega= $endereco;
    }
    
    public function setTelefone($telefone){
        $this->telefone= $telefone;
    }
 
    public function incluirCliente(){
        $CadCliente = new Cliente();  
        $CadCliente->incluirCliente($this);
   }
   public function listarTodos(){
       $CadCliente = new Cliente();
       return $CadCliente->listarTodos();
   }
   public function pesquisarCliente(){
       $CadCliente = new Cliente();
       $CadCliente->pesquisarCliente($this);
   }
}
?>