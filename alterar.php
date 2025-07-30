<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Alteração</TITLE>
</HEAD>
<?php

$titulo=trim($_GET["titulo"]);

$bd=mysqli_connect("localhost","root","","repertorio") or die ("erro!");


$sql="select * from musicas where titulo = '$titulo'"; //consulta sql

$consulta=mysqli_query($bd, $sql); //faz a consulta de todos os registros
$reg=mysqli_fetch_array($consulta); // cria uma matriz com todos os campos e registros

if ($reg==0)
{
	 echo "ERRO - Registro não Existe.  ";
	 exit;
}
else
{
	$titulo = $reg["titulo"];
	$artista = $reg["artista"];
	$album = $reg["album"];
	$genero = $reg["genero"];
	$ano_lancamento = $reg["ano_lancamento"];
	$duracao_segundos = $reg["duracao_segundos"];
	$gravadora = $reg["gravadora"];
	$compositor = $reg["compositor"];
	$letra = $reg["letra"];
	$caminho_arquivo = $reg["caminho_arquivo"];
	$data_cadastro = $reg["data_cadastro"];
}
?>
<center><h2>Alterar Registros</center>
	<?php echo "Placa: $placa<br><br>" ?>
	<form method="POST" action="regrava.php">
		<p> titulo:			<input type="hidden" size="10" name="titulo" 		value ='<?php echo "$titulo"; ?>'>
		<p>artista: 	<input type="text" size="40"   name="artista" 		value ='<?php echo "$artista"; ?>'></p>
		<p>album: 		<input type="text" size="50"   name="album" 		value ='<?php echo "$album"; ?>'></p>
		<p>genero: 		<input type="text" size="20"   name="genero" 			value ='<?php echo "$genero"; ?>'></p>
		<p>ano_lancamento: 		<input type="text" size="20"   name="ano_lancamento" 			value ='<?php echo "$ano_lancamento"; ?>'></p>
		<p>duracao_segundos: 		<input type="text" size="20"   name="duracao_segundos" 			value ='<?php echo "$duracao_segundos"; ?>'></p>
		<p>gravadora: 		<input type="text" size="20"   name="gravadora" 			value ='<?php echo "$gravadora"; ?>'></p>
		<p>compositor: 		<input type="text" size="20"   name="compositor" 			value ='<?php echo "$compositor"; ?>'></p>
		<p>letra: 		<input type="text" size="20"   name="letra" 			value ='<?php echo "$letra"; ?>'></p>
		<p>caminho_arquivo: 		<input type="text" size="20"   name="caminho_arquivo" 			value ='<?php echo "$caminho_arquivo"; ?>'></p>
		<p>data_cadastro:<input type="text" size="20"   name="data_cadastro" 	value ='<?php echo "$data_cadastro"; ?>'></p>
		<input type="submit" name="B1" value="Alterar"></p>
 	</form>	
	
</body>
</html>
