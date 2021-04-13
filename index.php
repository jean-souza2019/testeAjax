<?php
session_start();
require('querys.php');
if (isset($_SESSION['mensagem'])) {

    var_dump($_SESSION['mensagem']);
}


$query = new querys();


$produtos = $query->getProdutos();


?>
<a href="./compras_efetuadas">Compras efetuadas</a>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/js/bootstrap-4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/js/Datatables/datatables.min.css">
    <link rel="stylesheet" href="./assets/css/select2/select2.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Carrinho</title>
</head>

<body>
    <div class="recebeDados">
    </div>

    <div>
        <h1 class="titulo">
            Carrinho de Compras
        </h1>

        <h5>Cliente: <input type="text" class="imp" name="cli" onchange="addCli(1)" id="cli" value="<?= !empty($_SESSION['cliente']) ? $_SESSION['cliente'] : '' ?>"></h5>
        <h5>OS: <input type="number" class="imp" name="os" onchange="addCli(2)" id="os" value="<?= !empty($_SESSION['os']) ? $_SESSION['os'] : '' ?>"></h5>
    </div>



    <div class="menu">
        <!-- <?php if (!isset($_GET['add'])) { ?> -->
            <!-- <span>ID</span> -->
        <!-- <?php } ?> -->
        <span>Qtd</span>
        <span>Produto</span>
        <span>Valor Un.</span>
        <?php if (!isset($_GET['add'])) { ?>
            <span>Opções</span>
        <?php } ?>
    </div>

    <div class="menu-itens">
        <?php
        if (isset($_SESSION['carrinho'])) {

            foreach ($_SESSION['carrinho'] as $item) {
                // var_dump($item);
        ?>
                <!-- <?php if (!isset($_GET['add'])) { ?> -->
                    <!-- <input type="number" class="imp" name="qtdItem" value="<?= $item['id'] ?>" readonly="true"> -->
                <!-- <?php } ?> -->
                <input type="number" class="imp" name="nomeItem" value="<?= $item['qtdItem'] ?>" readonly="true">
                <input type="text" class="imp" name="valorItem" value="<?= $item['nomeItem'] ?>" readonly="true">
                <input type="number" class="imp" name="valorItem" value="<?= $item['valorItem'] ?>" readonly="true">
                <?php
                if (!isset($_GET['add']) && !isset($_GET['edit'])) { ?>

                    <span>
                        <a class="btn btn-outline-danger btn-sm" href="removeItem?id=<?= $item['id'] ?>" role="button"><i class="far fa-trash-alt">del</i></a>
                        <!-- <a class="btn btn-outline-danger btn-sm" href="?edit=<?= $item['id'] ?>" role="button"><i class="far fa-trash-alt">edit</i></a> -->
                    </span>
                <?php } ?>

                <br>
        <?php
            }
        }
        ?>
        <br>
        <span>Total: </span>
        <span>
            <?php
            if (isset($_SESSION['carrinho'])) {
                $total = 0;
                foreach ($_SESSION['carrinho'] as $item) {
                    //    $total = $total + ($item['qtdItem']*$item['valorItem']);
                    // echo "</br>";
                    $it = $item['valorItem'] * $item['qtdItem'];
                    // echo $it;
                    // echo "</br>";

                    $total = $total + $it;
                }
                echo $total;
            } ?>

        </span>
    </div>

    <?php
    if (isset($_GET['add'])) {
    ?>
        <div class="add-item">
            <form class="form" method="post" action="">
                <input type="number" class="imp" name="qtdItem" placeholder="Qtd" id="qtdItem">
                <!-- <input type="text" class="imp" name="nomeItem" placeholder="Produto" id="nomeItem"> -->
                <select class="imp" id="nomeItem" name="nomeItem">
                    <?php foreach ($produtos as $produto) { ?>
                        <option value="<?= $produto['DESCRICAO'] ?>"><?= $produto['DESCRICAO'] ?></option>
                    <?php   } ?>
                </select>
                <input type="number" class="imp" name="valorItem" placeholder="R$" id="valorItem">

                <button type="submit"> add</button>
            </form>
            <button><a href="/Carrinho"> Cancelar</a></button>
        </div>
    <?php
    } else { ?>

        <div class="components">
            <span class="btn-add"> <a href="?add=item"> Adicionar</a></span>
            <span class="btn-add"> <a href="limparItens"> limpar</a></span>
        </div>
    <?php } ?>


    <?php
    if (!isset($_GET['add']) && isset($_SESSION['carrinho'])) {
    ?>
        <div class="enviar">
            <!-- <a class="btnEnviar" onclick=""> Finalizar</a> -->
            <button><a class="btnEnviar" href="/carrinho/model_ins_carrinho"> Finalizar</a></button>

        </div>
    <?php } ?>
</body>


<script>
    $(function() {
        $('.form').submit(function() {
            $.ajax({
                url: 'session.php',
                type: 'POST',
                data: $('.form').serialize(),
                success: function(data) {
                    // $('.recebeDados').html(data);
                    window.location.href = "/Carrinho";
                }
            });
            return false;
        });




    });



    function addCli(x) {
        if (x === 1) {
            x = document.getElementById('cli').value;
            // console.log(x);

            $.ajax({
                url: 'addCliOs.php',
                type: 'POST',
                data: {
                    cliente: $('#cli').val()
                },
                success: function(data) {
                    window.location.href = "/Carrinho";
                }
            });
        }
        if (x === 2) {
            x = document.getElementById('os').value;
            $.ajax({
                url: 'addCliOs.php',
                type: 'POST',
                data: {
                    os: $('#os').val()
                },
                success: function(data) {
                    window.location.href = "/Carrinho";
                }
            });
        }
    }
</script>

</html>

<!-- https://www.youtube.com/watch?v=wVl_iK4Dmo4 -->