<?php 
 include("PosicaoGPS.php");
 include("Conexao.php");

   class Cliente{
     private $id;
     private $nome;
     private $origem;
     private $destino;
     private $atual;
     private $estacionamentos;
     private $placa;
     private $caminho;
     private $bonus;

//      function __construct(){
//      	$this->id = 123;
//      	$this->nome = "João Caminhão";
//      	$this->origem = new PosicaoGPS(12.23423233, 45.34212342);
//      	$this->destino = new PosicaoGPS(11.12314123, 46.1234123);
//      	$this->atual = new PosicaoGPS(11.12314123, 46.5345123);
//      	$this->estacionamentos = "Teste de Estacionamento";
//      	$this->placa = "ABC1234";
//      	$this->caminho = "Rua quqe sobe e desce";
//      	$this->bonus = 12555;
//      }
     
     function Cliente($id, $nome, $origem, $destino, $atual, $estacionamentos, $placa, $caminho, $bonus){

       $this->id = $id;
       $this->nome = $nome;
       $this->origem = $origem;//new PosicaoGPS(12.23423233, 45.34212342);
       $this->destino = $destino;//new PosicaoGPS(11.12314123, 46.1234123);
       $this->atual = $atual;//new PosicaoGPS(11.12314123, 46.5345123);
       $this->estacionamentos = $estacionamentos;//"Teste de Estacionamento";
       $this->placa = $placa;//"ABC1234";
       $this->caminho = $caminho;//"Rua quqe sobe e desce";
       $this->bonus = $bonus;
       

     }
     
     static function getCliente($id){
     	$result = Conexao::defaultQuery("tb_cliente", $id);
     	$cli = null;
     	if($result->num_rows > 0){
     		$row = $result->fetch_assoc();
     		$cli = new Cliente($row["id"], $row["name"], null, null, null, null, null, null, $row["bonus"]);
     		
     	}
     	return $cli;
     }
     
     function getID(){
       return $this->id;
     }
     
     function getNome(){
     	return $this->nome;
     }

     function getOrigem(){
       return $this->origem;
     }

   }
//      $obj = new Cliente(456, "Zé da Roça", new PosicaoGPS(12.44435214, 45.5453452), new PosicaoGPS(33.43234234234, 45.656643453456),
//      		new PosicaoGPS(21.1234123, 55.12341234), "3 estacionamentos selecionados", "GPS 1234", "Rua que sobe e desce, 5", 44533);
     
//      echo "<br>id:";
//      echo $obj->getID();
//      echo "<br>";
//      echo "nome: ".$obj->getNome();
//      echo "<br>";
//      echo $obj->getOrigem()->toString();
//      echo "<br>";
//      echo "teste";
       
     
     $cliente = Cliente::getCliente(1);
     var_dump($cliente);
     

 ?>
