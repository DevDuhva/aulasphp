<?php
$senha_para_cadastrar = 'eu123'; // <-- COLOQUE A SENHA DESEJADA AQUI

$hash = password_hash($senha_para_cadastrar, PASSWORD_DEFAULT);

echo "A senha é: " . $senha_para_cadastrar . "<br>";
echo "O hash para salvar no banco é: " . $hash;


/*INSERT INTO usuarios (nome, email, fone, senha) VALUES
('Usuário de Teste', 'teste@empresa.com', '11987654321', '$hash'); -- Substitua pelo hash gerado
*/
?>