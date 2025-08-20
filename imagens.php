<html>
<body>

<?php

$nome=			$_POST["nome"];
$email=		$_POST["email"];
$fone= 		   $_POST["fone"];
$senha=			   $_POST["senha"];
$arquivo = $_FILES['arquivo']['name'];
$destino = 'c:/xampp/htdocs/imagens/img/' . $arquivo;
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
move_uploaded_file( $arquivo_tmp, $destino);


$con=mysqli_connect("localhost","root","","empresa") or die ("erro!"); //faz a conexão com o banco de dados detran


$in = "insert into usuarios values (null,
                                    '$nome',
									'$email',
									'$fone',
									 '$senha',
                                    '$arquivo')";
$incluir=mysqli_query($con,$in);


if ($incluir==1)
{
   echo "
   nome:		$nome<BR>
   email:		$email<BR>
   fone:		$fone<BR>
   senha:			$senha<BR>
   arquivo:		$arquivo<BR>";
    echo "arquivo <b><i>$arquivo</i></b> movido para a pasta <b>img/</b><br>";
echo "<img src = img/$arquivo width=25% heigth=25%>";

   echo "Registro incluído com sucesso!<BR>";
}
else
{
   echo "Registro NÃO incluído!<BR>";
}
echo "<a href='imagens.html'>Voltar</a><BR>";



?>

</body>
</html>