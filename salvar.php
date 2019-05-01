<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
$nome = $_GET['nome1'];
$data_nasc = $_GET['data_nasc'];
$salario = $_GET['salario'];
$dsn = 'mysql:dbname=projeto;host=127.0.0.1';
$user = 'root'; 
$password = '';
try {
$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
$count = $dbh->exec("insert into cadastro(nome,data_nasc,salario) 
                values('$nome', '$data_nasc' , '$salario') ");
echo "<p>$count registro foi incluído</p>";?>
<a class="btn btn-danger btn-xs" href=index.php>Voltar</a> 

