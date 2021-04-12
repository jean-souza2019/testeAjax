<?php
session_start();
?>
<a href="/carrinho">Carrinho</a>

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

    <title>Compras Efetuadas</title>
</head>

<body>

    <div class="recebeDados">
    </div>

    <div>
        <h1 class="titulo">
            Compras Efetuadas
        </h1>
    </div>



  

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