<?php
session_start();
require('querys.php');
if (isset($_SESSION['carrinho'])) {

    // var_dump($_SESSION['carrinho']);
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
    <!-- Importando Stilos -->
    <link rel="stylesheet" href="./assets/js/fontawesome-free-5.7.1/css/all.min.css">
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

            foreach ($_SESSION['carrinho'] as $item) { ?>
                <input type="number" class="imp" name="nomeItem" value="<?= $item['qtdItem'] ?>" readonly="true">
                <input type="text" class="imp" name="valorItem" value="<?= $item['nomeItem'] ?>" readonly="true">
                <input type="number" class="imp" name="valorItem" value="<?= $item['valorItem'] ?>" readonly="true">
                <?php
                if (!isset($_GET['add']) && !isset($_GET['edit'])) { ?>
                    <span>
                        <a class="btn btn-outline-danger btn-sm" href="removeItem?id=<?= $item['id'] ?>" role="button"><i class="fa fa-trash"></i></a>
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
                    $it = $item['valorItem'] * $item['qtdItem'];
                    $total = $total + $it;
                }
                echo $total;
            } ?>

        </span>
    </div>



    <div class="components">
        <br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Adicionar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="limpar()">limpar</button>

    </div>
    <?php
    require_once("./teste.php");
    ?>

    <?php
    if (isset($_SESSION['carrinho'])) {
    ?>
        <div class="enviar">
            <hr>
            <button type="button" class="btn btn-success" onclick="finalizar()">Finalizar</button>

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
                    window.location.href = "/Carrinho";
                }
            });
            return false;
        });




    });

    function limpar() {
        window.location.href = "/carrinho/limparItens";
    }

    function finalizar() {
        window.location.href = "/carrinho/model_ins_carrinho";
    }

    function addCli(x) {
        if (x === 1) {
            x = document.getElementById('cli').value;
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</html>

<!-- Link Youtube onde ajuda sobre tema de Sessões 
    https://www.youtube.com/watch?v=wVl_iK4Dmo4 -->