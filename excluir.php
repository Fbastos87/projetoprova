<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php
$id=$_GET['id'];
$dsn = 'mysql:dbname=projeto;host=127.0.0.1';
$user = 'root'; //mysql usuario=root
$password = '';//sem senha
try {
$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
$count = $dbh->exec("delete from cadastro 
                   where id=$id ");
echo "<p>$count registro foi excluído</p>";
echo "<br><br>"?>
<a class="btn btn-danger btn-xs" href=index.php>Voltar</a>
