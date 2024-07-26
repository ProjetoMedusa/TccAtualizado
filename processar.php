<?php
// Configurações do banco de dados
$servername = "localhost";  // Ou o endereço do seu servidor de banco de dados
$username = "root";         // Seu usuário do banco de dados
$password = "";             // Sua senha do banco de dados
$dbname = "cadastro_db";    // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber dados do formulário
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha
$name = $_POST['name'];
$surname = $_POST['surname'];
$birthdate = $_POST['birthdate'];
$location = $_POST['location'];

// Preparar e executar a consulta SQL
$sql = $conn->prepare("INSERT INTO usuarios (email, password, name, surname, birthdate, location) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssss", $email, $password, $name, $surname, $birthdate, $location);

if ($sql->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $sql->error;
}

// Fechar conexão
$sql->close();
$conn->close();
?>
