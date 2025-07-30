<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Incluir</TITLE>
</HEAD>
<BODY>
<?php
$titulo=			$_POST["titulo"];
$artista=		$_POST["artista"];
$album= 		   $_POST["album"];
$genero=			   $_POST["genero"];
$ano_lancamento=			   $_POST["ano_lancamento"];
$duracao_segundos=	$_POST["duracao_segundos"];
$gravadora=			$_POST["gravadora"];
$compositor=		$_POST["compositor"];
$letra=		$_POST["letra"];
$caminho_arquivo=		$_POST["caminho_arquivo"];
$data_cadastro=		$_POST["data_cadastro"];

$con=mysqli_connect("localhost","root","","repertorio") or die ("erro!"); //faz a conexão com o banco de dados detran

$in = "insert into musicas values (null,
                                    '$titulo',
									         '$artista',
									         '$album',
									         '$genero',
									         '$ano_lancamento',
									         '$duracao_segundos', 
									         '$gravadora', 
                                    '$compositor', 
                                    '$letra', 
                                    '$caminho_arquivo', 
									         '$data_cadastro')";
$incluir=mysqli_query($con,$in);
if ($incluir==1)
{
   echo "
   titulo:		$titulo<BR>
   artista:		$artista<BR>
   album:		$album<BR>
   genero:			$genero<BR>
   ano_lancamento:			$ano_lancamento<BR>;
   duracao_segundos:			$duracao_segundos<BR>
   gravadora:			$gravadora<BR>
   compositor:			$compositor<BR>
   letra:			$letra<BR>
   caminho_arquivo:		$caminho_arquivo<BR>
   data_cadastro: 	$data_cadastro<hr>";
   
   echo "Registro incluído com sucesso!<BR>";
}
else
{
   echo "Registro NÃO incluído!<BR>";
}
echo "<a href='incluir.html'>Voltar</a><BR>";
?>
</BODY>
</HTML>

