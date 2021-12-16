<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3daw";
$conn = new mysqli($servidor,$username,$senha, $database);
if ($conn->connect_error) {
    die("Conexao Falhou, avise o administrador do sistema");
}
$comandoSQL = "SELECT * from `clientes`";
$result = $conn->query($comandoSQL);

$arrClientes = array();
$x = 0;
while ($linha = $result->fetch_assoc()) {
    $arrClientes[$x] = $linha;
    $x++;
}

$jCliente = json_encode($arrClientes, JSON_UNESCAPED_UNICODE);
echo $jCliente;