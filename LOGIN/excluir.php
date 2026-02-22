
<link rel="stylesheet" href="style.css">

<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "cadastro_usuarios"; 

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}


if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = intval($_GET['id']);


$sql = "DELETE FROM usuarios WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Usuário excluído com sucesso!'); window.location='consultar.php';</script>";
} else {
    echo "Erro ao excluir: " . $conn->error;
}

$conn->close();
?>
