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
    die("ID do usuário não fornecido.");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows === 0) {
    die("Usuário não encontrado.");
}

$usuario = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $primeiro_nome = $conn->real_escape_string($_POST['primeiro_nome']);
    $sobrenome = $conn->real_escape_string($_POST['sobrenome']);
    $email = $conn->real_escape_string($_POST['email']);
    $usuario_nome = $conn->real_escape_string($_POST['usuario']);
    $sexo = $conn->real_escape_string($_POST['sexo']);
    $aniversario = $conn->real_escape_string($_POST['aniversario']);

    $update = "UPDATE usuarios SET 
                primeiro_nome='$primeiro_nome', 
                sobrenome='$sobrenome',
                email='$email',
                usuario='$usuario_nome',
                sexo='$sexo',
                aniversario='$aniversario'
               WHERE id=$id";

    if ($conn->query($update) === TRUE) {
        echo "<script>alert('Usuário atualizado com sucesso!'); window.location='consultar.php';</script>";
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>


    <meta charset="UTF-8">
    <title>Editar Usuário</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Editar Usuário</h1>

<form method="post">
    <label>Primeiro Nome:</label>
    <input type="text" name="primeiro_nome" value="<?= htmlspecialchars($usuario['primeiro_nome']) ?>" required>

    <label>Sobrenome:</label>
    <input type="text" name="sobrenome" value="<?= htmlspecialchars($usuario['sobrenome']) ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

    <label>Usuário:</label>
    <input type="text" name="usuario" value="<?= htmlspecialchars($usuario['usuario']) ?>" required>

    <label>Sexo:</label>
    <select name="sexo">
        <option value="Masculino" <?= $usuario['sexo'] == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
        <option value="Feminino" <?= $usuario['sexo'] == 'Feminino' ? 'selected' : '' ?>>Feminino</option>
        <option value="Outro" <?= $usuario['sexo'] == 'Outro' ? 'selected' : '' ?>>Outro</option>
    </select>

    <label>Aniversário:</label>
    <input type="date" name="aniversario" value="<?= htmlspecialchars($usuario['aniversario']) ?>">

    <button type="submit">Salvar Alterações</button>
</form>

<a href="consultar.php">← Voltar</a>

</body>
</html>

<?php $conn->close(); ?>