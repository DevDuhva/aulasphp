<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}


require_once 'conexao.php';


$filtro_tipo = "";
if (isset($_GET['tipo']) && $_GET['tipo'] != "") {
    $filtro_tipo = mysqli_real_escape_string($conexao, $_GET['tipo']);
    $sql = "SELECT * FROM produtos WHERE tipo = '$filtro_tipo'";
} else {
    $sql = "SELECT * FROM produtos";
}

$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Menu de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .welcome { font-size: 22px; margin-bottom: 15px; }
        .menu a {
            margin-right: 10px;
            padding: 6px 12px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .menu a:hover { background-color: #0056b3; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .logout {
            display: inline-block;
            margin-top: 15px;
            background-color: #dc3545;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1 class="welcome">Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h1>

    <div class="menu">
        <a href="dashboard.php">Todos</a>
        <a href="dashboard.php?tipo=Moda">Moda</a>
        <a href="dashboard.php?tipo=Acessorios">Acessórios</a>
        <a href="dashboard.php?tipo=Informatica">Informática</a>
        <a href="dashboard.php?tipo=Esporte">Artigos Esportivos</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Tipo</th>
        </tr>
        <?php while ($produto = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $produto['id_produto']; ?></td>
                <td><?php echo htmlspecialchars($produto['produto']); ?></td>
                <td><?php echo $produto['quantidade']; ?></td>
                <td>R$ <?php echo number_format($produto['preco_unitario'], 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($produto['tipo']); ?></td>
            </tr>
        <?php } ?>
    </table>

    <a href="logout.php" class="logout">Sair</a>
</body>
</html>
