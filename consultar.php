<HTML>
<BODY>
<?php
$expressao=		$_POST["expressao"];
$bd=mysqli_connect("localhost","root","","repertorio") or die ("erro!");


if (isset($_POST ["op"]))
{
	$op = $_POST ["op"];
	echo $op;
	if ($op=="titulo")
		$consulta=mysqli_query($bd,"select * from musicas where titulo='$expressao'");
	if ($op=="artista")
		$consulta=mysqli_query($bd,"select * from musicas where artista='$expressao'");
	if ($op=="album")
		$consulta=mysqli_query($bd,"select * from musicas where album='$expressao'");
	if ($op=="genero")
		$consulta=mysqli_query($bd,"select * from musicas where genero='$expressao'");
	if ($op=="ano_lancamento")
		$consulta=mysqli_query($bd,"select * from musicas where ano_lancamento='$expressao'");
	if ($op=="duracao_segundos")
		$consulta=mysqli_query($bd,"select * from musicas where duracao_segundos='$expressao'");
	if ($op=="gravadora")
		$consulta=mysqli_query($bd,"select * from musicas where gravadora='$expressao'");
	if ($op=="compositor")
		$consulta=mysqli_query($bd,"select * from musicas where compositor = '%$expressao%'");
	if ($op=="letra")
		$consulta=mysqli_query($bd,"select * from musicas where letra = '$expressao'");	
	if ($op=="caminho_arquivo")
		$consulta=mysqli_query($bd,"select * from musicas where caminho_arquivo = '$expressao'");	
	if ($op=="data_cadastro")
		$consulta=mysqli_query($bd,"select * from musicas where data_cadastro = '$expressao'");	
	} else
{
	echo "volte a página e escolha o campo que fará a pesquisa";
	exit;
}
$reg = mysqli_fetch_array($consulta);
if ($reg==0)
{
	echo "Não existem registros para a pesquisa!";
	exit;
}
while ($reg!=0)
{	$id = $reg["id"];
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

	echo   "id: $id<br>
			titulo: $titulo<br>
			artista: $artista<br>
			album: $album<br>
			genero: $genero<br>
			cano_lancamentopf: $ano_lancamento<br>
			duracao_segundos: $duracao_segundos<br>
			gravadora: $gravadora<br>
			compositor: $compositor<br>
			letra: $letra<br>
			caminho_arquivo: $caminho_arquivo<br>
			data_cadastro: $data_cadastro<br>";
			
			
	?>
	<a href="excluir.php?id=<?php echo $id;?>" onclick = "return confirm ('Exclui o registro?');">Excluir</a>
	
	<a href="alterar.php?id=<?php echo $id;?>">Alterar</a><hr>
	
	<?php
	$reg = mysqli_fetch_array($consulta);		
} 
?>
<br><a href="consultar.html">Voltar</a><br>
</body>
</html>