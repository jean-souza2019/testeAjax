<?php

require('querys.php');

$query = new querys();

$insert = $query->addItem();

unset($_SESSION['carrinho']);
unset($_SESSION['id']);
unset($_SESSION['cliente']);
unset($_SESSION['os']);
unset($_SESSION['mensagem']);

// if (!$insert['status_cod']) {
//   echo "<script>alert('" . $insert['status_message'] . "')</script>";
//   echo "<script>javascript:history.back()</script>";
//   die();
// } else {
//     echo "<script>alert('" . $insert['status_message'] . "')</script>";
//     //   echo "<script>window.top.location.href='" . SIS_URL_EDITDOCFUN . "'</script>";
//     die();
// }
echo "<script>javascript:history.back()</script>";
