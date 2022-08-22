<?php 

include('connection.php');

$id = $_POST['id'];
$Matricula = $_POST['Matricula'];
$MCI = $_POST['MCI'];
$Pref_Reg = $_POST['Pref_Reg'];
$Dia = $_POST['Dia'];
$Hora = $_POST['Hora'];
$Cargo_Sol = $_POST['Cargo_Sol'];
$Inf_Compl = $_POST['Inf_Compl'];

$sql = "UPDATE `rel_visita` SET `Matricula`='$Matricula', `MCI`='$MCI', `Pref_Reg`='$Pref_Reg', `Dia`='$Dia', `Hora`='$Hora', `Cargo_Sol`='$Cargo_Sol', `Inf_Compl`='$Inf_Compl' WHERE id='$id'";

$query = mysqli_query($con,$sql);

if($query==true)
{
    $data = array (
        'status' => 'true',
    );
    echo json_encode($data);
}
else
{

    $data = array (
        'status' => 'false',
    );
    echo json_encode($data);

}


?>