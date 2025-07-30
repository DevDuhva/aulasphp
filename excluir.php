<HTML>
<BODY>
<?php
$titulo=		$_GET["titulo"];
$bd=mysqli_connect("localhost","root","","repertorio") or die ("erro!");
//mysql_select_db("detran");

$excluiu=mysqli_query($bd,"delete from veiculos where musicas = '$titulo'");

if ($excluiu == 1)
		echo "O registro foi excluído!!!";
	else
		echo "O registro NÃO foi excluído!!!";

?>
<br><a href="consultar.html">Voltar para nova Consulta</a><br>
</body>
</html>