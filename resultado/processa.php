<?php

include_once("conexao.php");

$mat = filter_input(INPUT_POST, 'tMat', FILTER_SANITIZE_STRING);
$mci = filter_input(INPUT_POST, 'tMci', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'tNome', FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST, 'tCargo', FILTER_SANITIZE_STRING);
$quant = filter_input(INPUT_POST, 'tQuant', FILTER_SANITIZE_STRING);
$prod = filter_input(INPUT_POST, 'tProduto', FILTER_SANITIZE_STRING);
$inf= filter_input(INPUT_POST, 'tInf', FILTER_SANITIZE_STRING);


$result_visita = "INSERT INTO `resultado` (`matricula`, `mci`, `nome`, `cargo`, `quantidade`, `produto`, `info`) VALUES ('$mat', '$mci', '$nome', '$cargo', '$quant','$prod', '$inf')";
$resultado_visita = mysqli_query($conn, $result_visita);

if(mysqli_insert_id($conn)){

    header("Location: index.php");

} else {
    header("Location: index.php");

}