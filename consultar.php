<HTML>
<BODY>
<?php
$id=		$_POST["id"];
$bd=mysqli_connect("localhost","root","","repertorio") or die ("erro!");


if (isset($_POST ["op"]))
{
	$op = $_POST ["op"];
	echo $op;
	if ($op=="titulo")
		$consulta=mysqli_query($bd,"select * from musicas where titulo='$id'");
	if ($op=="artista")
		$consulta=mysqli_query($bd,"select * from musicas where artista='$id'");
	if ($op=="album")
		$consulta=mysqli_query($bd,"select * from musicas where album='$id'");
	if ($op=="genero")
		$consulta=mysqli_query($bd,"select * from musicas where genero='$id'");
	if ($op=="ano_lancamento")
		$consulta=mysqli_query($bd,"select * from musicas where ano_lancamento='$id'");
	if ($op=="duracao_segundos")
		$consulta=mysqli_query($bd,"select * from musicas where duracao_segundos='$id'");
	if ($op=="gravadora")
		$consulta=mysqli_query($bd,"select * from musicas where gravadora='$id'");
	if ($op=="compositor")
		$consulta=mysqli_query($bd,"select * from musicas where compositor = '$id'");
	if ($op=="letra")
		$consulta=mysqli_query($bd,"select * from musicas where letra = '$id'");	
	if ($op=="caminho_arquivo")
		$consulta=mysqli_query($bd,"select * from musicas where caminho_arquivo = '$id'");	
	if ($op=="data_cadastro")
		$consulta=mysqli_query($bd,"select * from musicas where data_cadastro = '$id'");	
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