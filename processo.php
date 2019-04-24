
<?php
$ipserver = "localhost";
$user = "root";
$pass = "";
$dbase = "prova";

$conn = mysqli_connect($ipserver, $user, $pass, $dbase);

$requestData= $_REQUEST;

$columns = array( 
	0 => 'Nome',
	1=> 'Data_Nasc',
	2=> 'Salario');

$result_user = "SELECT Nome, Data_Nasc, Salario FROM usuario";
$resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);


$result_usuario = "SELECT Nome, Data_Nasc, Salario FROM usuario WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   
	$result_usuario.=" AND ( Nome LIKE '".$requestData['search']['value']."%' ";    
	$result_usuario.=" OR Data_Nasc LIKE '".$requestData['search']['value']."%' ";
	$result_usuario.=" OR Salario LIKE '".$requestData['search']['value']."%' )";
}

$resultado_usuario=mysqli_query($conn, $result_usuario);
$totalFiltered = mysqli_num_rows($resultado_usuario);

$result_usuario.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuario=mysqli_query($conn, $result_usuario);

$dados = array();
while( $row_usuario =mysqli_fetch_array($resultado_usuario) ) {  
	$dado = array(); 
	$dado[] = $row_usuario["Nome"];
	$dado[] = $row_usuario["Data_Nasc"];
	$dado[] = $row_usuario["Salario"];	
	$dados[] = $dado;
}

$json_data = array(
	"draw" => intval( $requestData['draw'] ),
	"recordsTotal" => intval( $qnt_linhas ), 
	"recordsFiltered" => intval( $totalFiltered ),
	"data" => $dados   
);

echo json_encode($json_data); 
