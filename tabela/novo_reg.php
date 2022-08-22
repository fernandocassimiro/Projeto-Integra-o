<?php include('connection.php');

$Matricula = $_POST['Matricula'];
$MCI = $_POST['MCI'];
$Pref_Reg = $_POST['Pref_Reg'];
$Dia = $_POST['Dia'];
$Hora = $_POST['Hora'];
$Cargo_Sol = $_POST['Cargo_Sol'];
$Inf_Compl = $_POST['Inf_Compl'];

$sql = "INSERT INTO `rel_visita` (`Matricula`, `MCI`, `Pref_Reg`, `Dia`, `Hora`, `Cargo_Sol`, `Inf_Compl`) VALUES ('$Matricula', '$MCI', '$Pref_Reg', '$Dia', '$Hora', '$Cargo_Sol', '$Inf_Compl')";

$query = mysqli_query($con,$sql);

if($query==true)
{
    $data = array (
        'status' => 'true',
    );
    echo json_encode($data);
}
else{

    $data = array (
        'status' => 'false',
    );
    echo json_encode($data);

}


?>