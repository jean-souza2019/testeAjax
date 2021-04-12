<?php
class querys
{
  private $hostname;
  private $username;
  private $password;
  private $dbname;

  public function __construct()
  {
    $this->hostname = 'localhost';
    $this->username = 'root';
    $this->password = '';
    $this->dbname =  'carrinho';
  }

  public function getProdutos()
  {
    $mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

    $query = "SELECT ID, DESCRICAO 
                FROM PRODUTOS 
                ORDER BY ID";




    $res = $mysqli->query($query);
    $itens = $res->fetch_all(MYSQLI_ASSOC);





    foreach ($itens as $objeto) {
      $array[] = $objeto;
    }
    return $array;
  }
}
