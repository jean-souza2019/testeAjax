<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Carrinho</title>
</head>

<body>

    <div class="recebeDados">
    </div>


    <div class="table">
        <table border="1">
            <tr>
                <td>id Sessao</td>
                <td>Quantidade</td>
                <td>Produto</td>
                <td>Valor</td>
                <td>Opções</td>
            </tr>
            <?php

            if (isset($_SESSION['carrinho'])) {

                foreach ($_SESSION['carrinho'] as $item) {
                    // var_dump($item);
            ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['qtdItem'] ?></td>
                        <td><?= $item['nomeItem'] ?></td>
                        <td><?= $item['valorItem'] ?></td>
                    </tr>



            <?php }
            } ?>

        </table>
    </div>




    <div>
        <form class="form" action="" method="post">
            <label> Quantidade: </label>
            <input type="number" name="qtdItem" id="qtdItem">
            <br>
            <label> Item: </label>
            <input type="text" name="nomeItem" id="nomeItem">
            <br>
            <label> Valor: </label>
            <input type="number" name="valorItem" id="valorItem">
            <br>

            <button type="submit">Adicionar</button>
        </form>

    </div>



</body>

</html>

<script>
    $(function() {
        $('.form').submit(function() {
            $.ajax({
                url: 'add_session.php',
                type: 'POST',
                data: $('.form').serialize(),
                success: function(data) {
                    // $('.recebeDados').html(data);
                    window.location.reload();
                }
            });
            return false;
        })
    });



    function DeletarItem() {
        window.location.reload();
    }
</script>