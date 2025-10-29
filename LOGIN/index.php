<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuário</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h1>Cadastro de Usuário</h1>

  <form action="cadastrar.php" method="POST">
    <label>Email</label>
    <input type="email" name="email" placeholder="Digite aqui seu email" required>

    <label>Usuário</label>
    <input type="text" name="usuario" placeholder="Digite seu nome de usuário" minlength="6" maxlength="20" required>

    <label>Primeiro nome</label>
    <input type="text" name="primeiro_nome" placeholder="Digite seu primeiro nome" minlength="2" maxlength="30" required>

    <label>Sobrenome</label>
    <input type="text" name="sobrenome" placeholder="Digite seu sobrenome" minlength="2" maxlength="40" required>

    <label>Aniversário</label>
    <div style="display: flex; gap: 5px;">
      <select name="dia" required>
        <option value="">Dia</option>
        <!-- Dias 1 a 31 -->
        <?php for ($i=1; $i<=31; $i++) echo "<option value='$i'>$i</option>"; ?>
      </select>

      <select name="mes" required>
        <option value="">Mês</option>
        <!-- Meses 1 a 12 -->
        <?php for ($i=1; $i<=12; $i++) echo "<option value='$i'>$i</option>"; ?>
      </select>

      <select name="ano" required>
        <option value="">Ano</option>
        <!-- Anos 1980 a 2010 -->
        <?php for ($i=1980; $i<=2010; $i++) echo "<option value='$i'>$i</option>"; ?>
      </select>
    </div>

    <label>Sexo</label>
    <select name="sexo" required>
      <option value="">Selecione</option>
      <option value="Masculino">Masculino</option>
      <option value="Feminino">Feminino</option>
      <option value="Outro">Outro</option>
    </select>

    <button type="submit">Cadastrar</button>
	<a href="consultar.php" class="button-link">Consultar</a>
  </form>

</body>
</html>