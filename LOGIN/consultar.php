<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "cadastro_usuarios"; 
$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$pesquisa = "";
if (isset($_GET['busca'])) {
    $pesquisa = $conn->real_escape_string($_GET['busca']);
    $sql = "SELECT * FROM usuarios 
            WHERE primeiro_nome LIKE '%$pesquisa%' 
            OR sobrenome LIKE '%$pesquisa%'
            OR email LIKE '%$pesquisa%'
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <title>Consultar Usuários</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Consulta de Usuários</h1>

    <form method="get" action="">
        <input type="text" name="busca" placeholder="Pesquisar por nome, e-mail..." value="<?= htmlspecialchars($pesquisa) ?>">
        <button type="submit">Pesquisar</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Primeiro Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Usuário</th>
            <th>Sexo</th>
            <th>Aniversário</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['primeiro_nome']) ?></td>
                    <td><?= htmlspecialchars($row['sobrenome']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['usuario']) ?></td>
                    <td><?= htmlspecialchars($row['sexo']) ?></td>
                    <td><?= $row['aniversario'] ?></td>
                    <td><?= $row['criado_em'] ?></td>
                    <td>
                        <a class="editar" href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
                        <a class="excluir" href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja realmente excluir este usuário?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="9">Nenhum usuário encontrado.</td></tr>
        <?php endif; ?>

    </table>
	<a href="index.php">← Voltar</a>
</body>
</html>

<?php $conn->close(); ?>