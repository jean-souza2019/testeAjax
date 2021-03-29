<?php
session_start();

try {
  unset($_SESSION['carrinho']);
  unset($_SESSION['id']);

  echo "<script>window.top.location.href='/Carrinho'</script>";
} catch (Exception $e) {
  echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}
