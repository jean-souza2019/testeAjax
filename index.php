<?php
session_start();
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
    <div>
        <h1 class="titulo">
            Carrinho de Compras
        </h1>
    </div>



    <div class="menu">
        <span>Qtd</span>
        <span>Produto</span>
        <span>Valor Un.</span>
        <span>Config</span>
    </div>

    <div class="menu-itens">
        <?php
        if ($_SESSION) {
            foreach ($_SESSION['carrinho']['produtos'] as $produto) {
        ?>
                <span><?= $produto['quantidade'] ?></span>
                <span><?= $produto['nome'] ?></span>
                <span><?= $produto['preco_unit'] ?></span>
                <span><button>Edit</button></span>
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
            <input type="number" name="qtd_produto" placeholder="Qtd" id="qtd_produto">
            <input type="text" name="nom_produto" placeholder="Produto" id="nom_produto">
            <input type="number" name="valor_produto" placeholder="R$" id="valor_produto">

            <!-- <span class="btn-add"> <a href="/Carrinho" id="addss"> add</a></span> -->
            <span class="btn-add"> <a id="addss"> add</a></span>
        </div>
    <?php
    } else { ?>

        <div class="components">
            <span class="btn-add"> <a href="?add=item"> Adicionar</a></span>
        </div>
    <?php } ?>


</body>


<script>
    $("#addss").click(function() {
        var qtd_produto = document.getElementById("qtd_produto").value;
        var nom_produto = document.getElementById("nom_produto").value;
        var valor_produto = document.getElementById("valor_produto").value;



        // $(".menu").append("<div>teste</div>");



        $.ajax({
                method: "POST",
                url: "session.php",
                data: {
                    qtd_produto: qtd_produto,
                    nom_produto: nom_produto,
                    valor_produto: valor_produto
                },
                beforeSend: function() {
                    $("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(msg) {
                $("#resultado").html(msg);
            })
            .fail(function(jqXHR, textStatus, msg) {
                alert(msg);
            });
    });
</script>

</html>

<!-- https://www.youtube.com/watch?v=wVl_iK4Dmo4 -->