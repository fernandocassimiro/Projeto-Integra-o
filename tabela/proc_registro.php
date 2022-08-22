<?php include('connection.php');

$sql = "SELECT * FROM rel_visita";
$query = mysqli_query($con,$sql);
$cont_all_rows = mysqli_num_rows($query);

if(isset($_POST['search']['value']))
{

    $search_value = $_POST['search']['value'];
    $sql .= " WHERE MCI like '%" .$search_value."%' ";
    $sql .= " OR  Matricula like '%" .$search_value."%' ";
    $sql .= " OR  Prefixo like '%" .$search_value."%' ";
    $sql .= " OR  Data like '%" .$search_value."%' ";
    $sql .= " OR  Hora like '%" .$search_value."%' ";
    $sql .= " OR  Cargo_Sol like '%" .$search_value."%' ";
    
}

if(isset($_POST['ORDER']))

{
    $column = $_POST['order'][0]['column'];
    $order = $_POST['ORDER'][0]['dir'];
    $sql .= " ORDER BY '".$column."' ".$order;

}
else
{
    $sql .= "ORDER BY MCI ASC";
}

if($_POST['length'] != -1)
{
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .="LIMIT ".$start.", ".$length;

}

$data = array();

$run_query = mysqli_query($con,$sql);
$filtered_rows = mysqli_num_rows($run_query);
while($row = mysqli_fetch_assoc($run_query))

{

    $sub_arry = array();
    $sub_arry[] = $row['MCI'];
    $sub_arry[] = $row['Matricula'];
    $sub_arry[] = $row['Prefixo'];
    $sub_arry[] = $row['Data'];
    $sub_arry[] = $row['Hora'];
    $sub_arry[] = $row['Cargo_Sol'];
    $sub_arry[] = $row['Inf_Compl'];
    $sub_arry[] = '<a href="javascript:void();" class="btn-sm btn-info">Editar</a> <a href="javascrpit:void();" class="btn btn-sm btn-danger">Limpar</a>';
    $data[] = $sub_array;
    
}

$output = array(
    'data' => $data,
    'draw' => intval($_POST['draw']),
    'recordsTotal' =>$count_all_rows,
    'recordsFiltered'=>$filtered_rows,
);

echo json_encode($output);
