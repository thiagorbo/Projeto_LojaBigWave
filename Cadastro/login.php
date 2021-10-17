<html>
	<head>
		<meta charset='utf-8">
	</head>
	<body>

<?php
//include_once('conexao.inc');

$conexao = mysql_connect("localhost","root","")

$login= $_post['Email'];
$senha= $_post['Senha'];

if(!$conexao){
	echo "<script language='javascript'>";
	echo "alert(\"não foi possivel conectar o servidor");'';
	echo "location.href='login.html';";
	echo "</script>";
	
	}
	else{
	$banco=mysql_select_db("bigwaves",$conexao);
	if(!$banco){
	echo"<script language='javascript'>";
	echo "alert(\"nao foi possivel abrir o banco de dados\");"
	echo "localtion.href='login.html';";
	echo "</script>";
	
	}
	else{
	$consulta ="select* from cadastro where email='$Email' and senha='$Senha'";
	$resultado=mysql_query($consulta);
	$num_reg=mysql_num_rows($resultado);
	
	if($num_reg>0){
	session_start();
	
	$_SESSION["login_usuario"]=$Email;
	$_SESSION["senha_usuario"]=$Senha;
	
	header("Location:home2.php");
	}
	else{
	echo"<script language='javascript'>";
	echo"alert(\"usuario nao cadastrado efetue o cadastro!\");";
	echo"location.href='login.html';";
	echo}"</script>";
	}
	mysql_close();
	
	?>
	</body>
	</html>
	
	
	
	
	
	}