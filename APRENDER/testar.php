<?php
$host = "localhost";
$port = "5432";
$dbname = "imobiliaria";
$user = "admin";
$password = "1234";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if ($conn) {
    echo "Conectado com sucesso ao PostgreSQL!";
} else {
    echo "Erro na conexão.";
}
?>