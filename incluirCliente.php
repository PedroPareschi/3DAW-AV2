<?php
    $nome = $_GET["Nome"];
    $endereco = $_GET["Endereco"];
    $postalCode = $_GET["PostalCode"];
    $CPF = $_GET["CPF"];
    $pais = $_GET["Pais"];
    $passaporte = $_GET["Passaporte"];
    $email = $_GET["Email"];
    $dataNascimento = $_GET["DataNascimento"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "faeterj3daw";
    $conn = new mysqli($servidor,$username,$senha, $database);
    if ($conn->connect_error) {
        die("Conexao Falhou, avise o administrador do sistema");
    }
    $comandoSQL = "INSERT INTO `clientes`(`nome`, `endereco`, `postalCode`,
    `cpf`, `passaporte`, `pais`, `email`, `dataNascimento`) VALUES ('$nome','$endereco','$postalCode', '$pais', '$CPF', '$passaporte', '$email', '$dataNascimento')";
    $result = $conn->query($comandoSQL);
    if($result)
    {
        echo "Success!";
    }
    else
    {
        die(mysqli_error($conn));
    }
    $sucesso = "Cliente Inserido com sucesso!";

    $comandoSQL = "SELECT * from `clientes` where nome = '$nome'";
    $result = $conn->query($comandoSQL);
    $jCliente = json_encode($result->fetch_assoc(), JSON_UNESCAPED_UNICODE);

    $resposta = "{\"nome\":\"" . $nome . "\",\"endereco\":\"" . $endereco . "\",\"postalCode\":\"" . $postalCode . 
        "\",\"CPF\":\"" . $CPF .
        "\",\"passaporte\":\"" . $passaporte .
        "\",\"email\":\"" . $email .
        "\",\"dataNascimento\":\"" . $dataNascimento .
        "\"}";

    echo $jCliente;
?>