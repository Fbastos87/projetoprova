<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
$id=$_GET['id'];
$dsn = 'mysql:dbname=projeto;host=127.0.0.1';
$user = 'root'; 
$password = '';
try {
$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
$sql = "SELECT * FROM cadastro where id=$id";
foreach ($dbh->query($sql) as $row) {
    echo "<form action=salvar_editar.php>";
    echo "<p>Nome</p>";
    echo "<p><input type=text name=nome value='".
            $row['nome'] . "'>";
    echo "<p>Data de Nascimento</p>";
    echo "<p><input type=text name=data_nasc value=".
            $row['data_nasc'] . ">";
	echo "<p><input type=number name=salario value=".
			$row['salario'] . ">";
    echo "<input type=hidden name=id value=". 
            $row['id'] . " >";
    echo "<br><br>"?>
	
	<input class="btn btn-primary btn-xs" type=submit value=Salvar>
	<a class="btn btn-danger btn-xs" href=index.php>Voltar</a>
	<?php
echo "</form>";

}
?>
