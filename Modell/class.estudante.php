<?php
class Estud{
    private $id_estud;
    private $nome_estud;
    private $fone_estud;
    private $fone_resp;
    private $email_estud;
    private $endereco_estud;
    private $foto_estud;

    public function __construct(
        $id_estud=0, 
        $nome_estud="", 
        $fone_estud="", 
        $fone_resp="", 
        $email_estud="", 
        $endereco_estud="",
        $foto_estud=""){

        $this->id_estud = $id_estud;
        $this->nome_estud = $nome_estud;
        $this->fone_estud = $fone_estud;
        $this->fone_resp = $fone_resp;
        $this->email_estud = $email_estud;
        $this->endereco_estud = $endereco_estud;
        $this->foto_estud = $foto_estud;
    }
    public function getId_estud(){
        return $this->id_estud;
    }
    public function setId_estud($id_estud){
        $this->id_estud = $id_estud;
    }
     public function getNome_estud(){
        return $this->nome_estud;
    }
    public function setNome_estud($nome_estud){
        $this->nome_estud = $nome_estud;
    }
    public function getFone_estud(){
       return $this->fone_estud;
   }
   public function setFone_estud($fone_estud){
       $this->fone_estud = $fone_estud;
   }
   public function getFone_resp(){
    return $this->fone_resp;
    }
    public function setFone_resp($fone_resp){
        $this->fone_resp = $fone_resp;
    }
     public function getEmail_estud(){
        return $this->email_estud;
    }
    public function setEmail_estud($email_estud){
        $this->email_estud = $email_estud;
    }
    public function getEndereco_estud(){
        return $this->endereco_estud;
    }
    public function setEndereco_estud($endereco_estud){
        $this->endereco_estud = $endereco_estud;
    }
    public function getFoto_estud(){
        return $this->foto_estud;
    }
    public function setFoto_estud($foto_estud){
        $this->foto_estud = $foto_estud;
    }
}
?>