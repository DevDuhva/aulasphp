<HTML>
<BODY>
<?php
$id=		$_GET["id"];
$bd=mysqli_connect("localhost","root","","repertorio") or die ("erro!");
//mysql_select_db("detran");

$excluiu=mysqli_query($bd,"delete from musicas where id = '$id'");

if ($excluiu == 1)
		echo "O registro foi excluído!!!";
	else
		echo "O registro NÃO foi excluído!!!";

?>
<br><a href="consultar.html">Voltar para nova Consulta</a><br>
</body>
</html>