<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
$id=			$_POST["id"];
$titulo=			$_POST["titulo"];
$artista=			$_POST["artista"];
$album=			$_POST["album"];
$genero=			$_POST["genero"];
$ano_lancamento=			$_POST["ano_lancamento"];
$duracao_segundos=			$_POST["duracao_segundos"];
$gravadora=		$_POST["gravadora"];
$compositor= 		$_POST["compositor"];
$letra=			$_POST["letra"];
$caminho_arquivo=			$_POST["caminho_arquivo"];
$data_cadastro=	$_POST["data_cadastro"];


$bd = mysqli_connect("localhost","root","","repertorio") OR DIE ("Erro ao conectar!");
//conecta com o servidor mysql

$es=mysqli_query($bd,"update musicas set titulo='$titulo', 
										  artista='$artista', 
										  album='$album', 
										  genero='$genero', 
										  ano_lancamento='$ano_lancamento', 
										  duracao_segundos='$duracao_segundos', 
										  gravadora='$gravadora', 
										  compositor='$compositor', 
										  letra='$letra',
										   caminho_arquivo='$caminho_arquivo',
										    data_cadastro='$data_cadastro',
										  where id ='$id '");
if ($es==1)
{
    echo "	id: $id <br>
			titulo: $titulo<br>
		  artista: $artista<br>
		   album: $album<br>
		    genero: $genero<br>
			 ano_lancamento: $ano_lancamento<br>
			  duracao_segundos: $duracao_segundos<br>
		  gravadora: $gravadora<br>
		  compositor: $compositor<br>
		  letra: $letra<br>
		  Valor: $Valor<br>
		  Valor: $caminho_arquivo<br>
		  Valor: $data_cadastro<br>
		  
		  <hr>";
	echo "Obrigado por participar - Registro Alterado. <br><br>  ";
}
else
{
    echo "ERRO - Registro não Alterado. <br><br> ";
}
	echo "<a href=consultar.html>Voltar para nova Consulta";
?>
</body>
</html>
