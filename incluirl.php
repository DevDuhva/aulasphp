<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $fone = $_POST['fone'];
    $senha = $_POST['senha'];


    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
        $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
        $nome_arquivo = $_FILES['arquivo']['name'];


        $diretorio = "uploads/";

   
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

      
        $arquivo_destino = $diretorio . basename($nome_arquivo);
        if (move_uploaded_file($arquivo_tmp, $arquivo_destino)) {
            echo "Arquivo enviado com sucesso. <br>";
            echo "Nome do arquivo: " . $nome_arquivo . "<br>";
        } else {
            echo "Erro ao enviar o arquivo. <br>";
        }
    } else {
        echo "Nenhum arquivo enviado ou houve um erro no envio. <br>";
    }


    echo "<h3>Dados recebidos:</h3>";
    echo "Nome: " . htmlspecialchars($nome) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Fone: " . htmlspecialchars($fone) . "<br>";
    echo "Senha: " . htmlspecialchars($senha) . "<br>";
} else {
    echo "Erro ao processar o formulário.";
}
?>
