<?php

include_once("conexao.php");

$mat = filter_input(INPUT_POST, 'tMat', FILTER_SANITIZE_STRING);
$mci = filter_input(INPUT_POST, 'tMci', FILTER_SANITIZE_STRING);
$ageste = filter_input(INPUT_POST, 'tAgeSte', FILTER_SANITIZE_STRING);
$dia = filter_input(INPUT_POST, 'tDia', FILTER_SANITIZE_STRING);
$hora = filter_input(INPUT_POST, 'tHora', FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST, 'tCargo', FILTER_SANITIZE_STRING);
$visr= filter_input(INPUT_POST, 'tVisr', FILTER_SANITIZE_STRING);


$result_visita = "INSERT INTO `rel_visita` (`Matricula`, `MCI`, `Pref_Reg`, `Dia`, `Hora`, `Cargo_Sol`, `Inf_Compl`) VALUES ('$mat', '$mci', '$ageste', '$dia', '$hora', '$cargo', '$visr')";
$resultado_visita = mysqli_query($conn, $result_visita);

if(mysqli_insert_id($conn)){

    header("Location: index.php");

} else {
    header("Location: index.php");

}