<HTML>
<HEAD>
<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML" CHARSET="UTF-8">
</HEAD>
<BODY>

<?php
$HOSTNAME = "localhost";
	$USERNAME = "root";
	$PASSWORD = "";

	// ESTABELECENDO A CONEXÃO COM O BANCO DE DADOS
	$DBCONNECT= mysql_connect($HOSTNAME, $USERNAME,$PASSWORD);

	IF(!$DBCONNECT){
		
		ECHO "<SCRIPT LANGUAGE=\"JAVASCRIPT\"> alert(\"NAO FOI POSSÍVEL CONECTAR-SE AO BANCO DE DADOS\");</SCRIPT>";
		ECHO "MENSAGEM DE ERROR: ". mysql_error();
		ECHO "<A HREF=\"javascript:window.history.go(-1)\">Voltar</A>";

	}ELSE{

		ECHO "<SCRIPT LANGUAGE=\"JAVASCRIPT\"> alert(\"CONEXÃO REALIZADA COM SUCESSO\");</SCRIPT>";

		$DBSELECT=mysql_select_db("bigwaves",$DBCONNECT);

		IF(!$DBSELECT){

			ECHO "<SCRIPT LANGUAGE=\"JAVASCRIPT\"> alert(\"ERROR AO ABRIR O ARQUIVO DE DADOS!!!\");</SCRIPT>";
		    ECHO "MENSAGEM DE ERROR: ". mysql_error();
		    ECHO "<BR> <A HREF=\"javascript:window.history.go(-1)\">Voltar</A>";

		}ELSE{
						
		$Nome       =utf8_decode( $_POST['fldNome']);
		$CPF		=utf8_decode( $_POST['fldCpf']);
		$Email	 	=utf8_decode( $_POST['fldEmail']);
		$Senha		=utf8_decode( $_POST['fldSenha']);
		$Endereco	=utf8_decode( $_POST['fldEndereco']);
		$Bairro		=utf8_decode( $_POST['fldBairro']);
		$Cidade		=utf8_decode( $_POST['fldCidade']);
		$Estado		=utf8_decode( $_POST['fldEstado']);
		$Sexo		=utf8_decode( $_POST['fldSexo']);
		$dia		=substr($_POST['fldDataNasc'],0,2);
		$mes		=substr($_POST['fldDataNasc'],3,2);
		$ano		=substr($_POST['fldDataNasc'],6,4);
		
		$DataNasc	=$ano.'/'.$mes.'/'.$dia;

		
		$SQL_INSERIR="INSERT INTO clientes(Nome,CPF,Email,Senha,Endereco,Bairro,Cidade,Estado,Sexo,DataNasc)
        VALUES('$Nome','$CPF','$Email','$Senha','$Endereco','$Bairro','$Cidade','$Estado','$Sexo','$DataNasc')";

		mysql_query($SQL_INSERIR); 	
		
		ECHO "<SCRIPT LANGUAGE=\"JAVASCRIPT\"> alert(\"CADASTRO EFETUADO COM SUCESSO\");</SCRIPT>";
		ECHO "<BR> <A HREF=\"javascript:window.history.go(-1)\">Voltar</A>";
		
		}
	}

?>

</BODY>
</HTML>
