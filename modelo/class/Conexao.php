<?php

class Conexao{
	
	
	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $con;
	
	function Conexao($servername, $username, $password, $dbname){
		$this->dbname = $dbname;
		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;
		
	}
	
	public function conectar(){
		$this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if($this->con->connect_error){
			die("Conexão falhou: ".$this->con->connect_errno);
		}
		return $this->con;
	}
	
	public static function defaultQuery($table, $id){
		$conexao = new Conexao("localhost", "root", "root123", "db_estacionamento");
		$con = $conexao->conectar();
		$result = $con->query("SELECT * FROM ".$table." WHERE ID=".$id);
		return result;
	}
	
	public function queryTest(){
		
			$sql = "SELECT * FROM tb_cliente";
			$result = $this->con->query($sql);
			//var_dump($result);
			if($result->num_rows > 0){
				echo "<table border=1 style=width:80> 
						<tr><th>ID</th><th>Nome</th><th>Bonus</th></tr>";
				while($row = $result->fetch_assoc()){
					echo "<tr><td>".$row["id"]."</td><td>".$row["nome"]."</td><td>".$row["bonus"]."</td></tr>";
				}
				echo "</table>";
				$result->close();
			}
			
		}
	
	
}

$conexao = new Conexao("localhost", "root", "root123", "db_estacionamento");
     $conexao->conectar();
     $conexao->queryTest();
     

?>
