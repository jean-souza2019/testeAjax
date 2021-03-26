<?php
// Configuração do Sistema
define('SIS_URL', "http://192.168.3.42:82/Gestao_Documentos/");

define( 'SIS_URL_CADTIPDOC', "http://192.168.3.42:82/Gestao_Documentos/cadastro_tipo_documento");

define('SIS_ATUALIZACAO', true);
define('SIS_TITULO', 'Gestão Documentos de Fornecedores');
define('SIS_AUTOR', 'Agrodanieli');


$pagina_titulo = SIS_TITULO;

// diretório base da aplicação
define('BASE_PATH', dirname(__FILE__));
define('DEBUG_ERROR', FALSE);

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
