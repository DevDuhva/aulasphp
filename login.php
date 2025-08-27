
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    

$bd = mysqli_connect("localhost", "root", "", "empresa") or die("Erro de conexão com o banco!");


    $login = mysqli_query($bd, "select * from usuarios where email = '$email' AND senha = '$senha'");

    $reg = mysqli_fetch_array($login);
   
if (!$reg) {
    
    echo "Não existem registros para a pesquisa!";
    exit;
}


$nome = $reg["nome"];
$email = $reg["email"];
$fone = $reg["fone"];
$senha = $reg["senha"];
$foto = $_FILES['foto']['name'];
$destino = 'c:/xampp/htdocs/imagens/img/' . $foto;
$arquivo_tmp = $_FILES['foto']['tmp_name'];
move_uploaded_file( $arquivo_tmp, $destino);


echo "
    Nome: $nome<br>
    Email: $email<br>
    Telefone: $fone<br>
    foto: $foto<br>

";
    

if ($foto) {
    echo "Arquivo <b><i>$foto</i></b> movido para a pasta <b>img/</b><br>";
    echo "<img src='img/$foto' width='25%' height='25%'><br>";
}

}

?>

