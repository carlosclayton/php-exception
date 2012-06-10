<?php
class ConexaoMysql{
	private $url	=	"mysql:host=localhost;port=3306;dbname=editora";
	private $user = "root";
	private $pass = "";
	private $conn;
	
	function conectar(){
		try{
			$this->conn	=	new PDO($this->url, $this->user, $this->pass);
		}catch (PDOException $ex){
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	function execSql($sql){
		$this->conn->exec($sql);
	}
	
	function conSql($sql){
		return $this->conn->query($sql);
	}
}

$con	=	new ConexaoMysql();
$con->conectar();

$categorias	=	$con->conSql("select * FROM categorias");

foreach ($categorias as $dados){
	echo $dados["nomecat"];
}


