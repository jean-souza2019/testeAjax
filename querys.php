<?php
class querys
{
  public function getProdutos()
  {
    $query = "SELECT ID, DESCRICAO 
                FROM PRODUTOS 
                ORDER BY ID";

    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    $objetos = $stmt->fetchALL(PDO::FETCH_OBJ);
    $array = array();
    foreach ($objetos as $objeto) {
      $array[] = $objeto;
    }

    return $array;
  }
}
