<?php

$nome = $_POST["Nome"];
$cpf = $_POST["cpf"];
$telefone = $_POST["Telefone"];
$email = $_POST["Email"];

// Conexão correta PostgreSQL
$conn = pg_connect("host=localhost port=5432 dbname=imobiliaria user=admin password=1234");

if (!$conn) {
    die("Erro na conexão com o banco!");
}

// INSERT especificando schema e campos
$sql = "INSERT INTO imobi.usuarios (nome, cpf, email, telefone)
        VALUES ('$nome', '$cpf', '$email', '$telefone')";

$result = pg_query($conn, $sql);

if ($result) {
    echo "
    Nome: $nome <br>
    CPF: $cpf <br>
    Telefone: $telefone <br>
    Email: $email <br><br>
    Registro incluído com sucesso!
    ";
} else {
    echo "Erro ao inserir registro!";
}

echo "<br><a href='incluir.html'>Voltar</a>";

?>










?>