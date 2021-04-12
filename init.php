<?php


// conexão com base de dados
define( 'BD_SERVIDOR', '192.168.3.56' );
define( 'BD_USUARIO', 'PAINEL_TI' );
define( 'BD_SENHA', 'painelticomunderline' );
define( 'BD_NOME', 'senior' );

date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', false);
if(DEBUG_ERROR){
  ini_set('display_errors', true);
  error_reporting(E_ALL);
}


if(!isset($_SESSION)){
    session_start();
}

 ?>
