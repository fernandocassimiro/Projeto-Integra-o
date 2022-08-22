<?php include('connection.php');

$output= array();
$sql = "SELECT * FROM rel_visita ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE id like '%".$search_value."%'";
	$sql .= " OR Matricula like '%".$search_value."%'";
	$sql .= " OR MCI like '%".$search_value."%'";
	$sql .= " OR Pref_Reg  like '%".$search_value."%'";
	$sql .= " OR Dia like '%".$search_value."%'";
	$sql .= " OR Hora like '%".$search_value."%'";
	$sql .= " OR Cargo_Sol like '%".$search_value."%'";
	$sql .= " OR Inf_Compl like '%".$search_value."%'";

}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$column_name." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;


}	

$data = array();

$run_query =mysqli_query($con,$sql);
$filtered_rows = mysqli_num_rows($run_query);

while($row = mysqli_fetch_assoc($run_query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['Matricula'];
	$sub_array[] = $row['MCI'];
	$sub_array[] = $row['Pref_Reg'];
	$sub_array[] = $row['Dia'];
	$sub_array[] = $row['Hora'];
	$sub_array[] = $row['Cargo_Sol'];
	$sub_array[] = $row['Inf_Compl'];
	
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-sm btn-info editBtn" >Editar</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm btnDelete" >Limpar</a>';
	                   
	$data[] = $sub_array;
}

$output = array(
	'data'=>$data,
	'draw'=> intval($_POST['draw']),
	'recordsTotal'=> $total_all_rows ,
	'recordsFiltered'=>$filtered_rows,
	
);
echo  json_encode($output);





  