<?php
// if ($_POST) {
//     var_dump($_POST);

//     // $_SESSION['carrinho']['produtos'][44]['quantidade'] = $_POST['campo1'];
//     // $_SESSION['carrinho']['produtos'][44]['nome'] = $_POST['campo2'];
//     // $_SESSION['carrinho']['produtos'][44]['preco_unit'] = $_POST['campo3'];
// }



if (isset($_POST) && !empty($_POST)) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}
?>