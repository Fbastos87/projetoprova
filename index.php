<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>Página de consulta</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    
    <script type="text/javascript" charset="utf8" 
        src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <script type="text/javascript" charset="utf8" 
      src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	  
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        } );
    </script>

</head>
<body>
<br><br>
<button type="button"  class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>


			<!-- Inicio Modal -->
			<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Adicionar Pessoas</h4>
							<form action=salvar.php>
							<p>Nome</p>
							<input type=text name=nome1>
							<p>Data de Nascimento</p>
							<input type=text name=data_nasc>
							<p>Salario</p>
							<input type=number name=salario>
							<br><br>
							<input type=submit value=Salvar>
							</form> 
							<br><br>
							<a href=index.php>Voltar</a>  
							
						</div>

					</div>
				</div>
			</div>
			<!-- Fim Modal -->

<br><br>




<table id="table_id" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th> Nome</th>
            <th>Data de Nascimento</th>
			<th>Salário</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
$dsn = 'mysql:dbname=projeto;host=127.0.0.1';
$user = 'root'; //mysql usuario=root
$password = '';//sem senha
try {
$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
        $sql = 'SELECT * FROM cadastro';
        foreach ($dbh->query($sql) as $row) {
        echo "<tr>";
        echo "<td align=left>". $row['id'] . "</td>";
        echo "<td align=left>". $row['nome'] . "</td>";
        echo "<td align=left>". $row['data_nasc'] . "</td>";
		echo "<td align=left>". $row['salario'] . "</td>";?>
		<td> <a class="btn btn-primary btn-xs" href=editar.php?id="<?php echo $row['id']?>">Editar</a> </td>
		<td> <a class="btn btn-danger btn-xs" href=excluir.php?id="<?php echo $row['id']?>">Excluir</a> </td>
		<?php
        echo "</tr>";
        }
?>
    </tbody>
</table>


</body>
</html>
