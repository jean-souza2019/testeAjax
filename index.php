<?php
session_start();

var_dump($_SESSION['id']);
?>

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
    </div>



    <div class="menu">

        <span>ID</span>
        <span>Qtd</span>
        <span>Produto</span>
        <span>Valor Un.</span>
        <?php if (!isset($_GET['add'])) { ?>
            <span>Config</span>
        <?php } ?>
    </div>

    <div class="menu-itens">
        <?php
        if (isset($_SESSION['carrinho'])) {

            foreach ($_SESSION['carrinho'] as $item) {
                // var_dump($item);
        ?>
                <!-- <span><?= $item['id'] ?></span>
                <span><?= $item['qtdItem'] ?></span>
                <span><?= $item['nomeItem'] ?></span>
                <span><?= $item['valorItem'] ?></span> -->
                <input type="number" class="imp" name="qtdItem" value="<?= $item['id'] ?>" readonly="true">
                <input type="number" class="imp" name="nomeItem" value="<?= $item['qtdItem'] ?>" readonly="true">
                <input type="text" class="imp" name="valorItem" value="<?= $item['nomeItem'] ?>" readonly="true">
                <input type="number" class="imp" name="valorItem" value="<?= $item['valorItem'] ?>" readonly="true">
                <?php
                if (!isset($_GET['add']) && !isset($_GET['edit'])) { ?>

                    <span>
                        <a class="btn btn-outline-danger btn-sm" href="removeItem?id=<?= $item['id'] ?>" role="button"><i class="far fa-trash-alt">del</i></a>
                        <a class="btn btn-outline-danger btn-sm" href="?edit=<?= $item['id'] ?>" role="button"><i class="far fa-trash-alt">edit</i></a>
                    </span>
                <?php } ?>

                <br>
        <?php
            }
        }
        ?>
    </div>

    <?php
    if (isset($_GET['add'])) {
    ?>
        <div class="add-item">
            <form class="form" method="post" action="">
                <input type="number" class="imp" name="qtdItem" placeholder="Qtd" id="qtdItem">
                <input type="text" class="imp" name="nomeItem" placeholder="Produto" id="nomeItem">
                <input type="number" class="imp" name="valorItem" placeholder="R$" id="valorItem">

                <!-- <span class="btn-add"> <a href="/Carrinho" id="addss"> add</a></span> -->
                <button type="submit"> add</button>
            </form>
        </div>
    <?php
    } else { ?>

        <div class="components">
            <span class="btn-add"> <a href="?add=item"> Adicionar</a></span>
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
</script>

</html>

<!-- https://www.youtube.com/watch?v=wVl_iK4Dmo4 -->