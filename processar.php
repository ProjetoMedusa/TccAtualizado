<?php
// Configuração da conexão com o banco de dados
$servername = "localhost";
$username = "medusa"; // Usuário padrão do MySQL no XAMPP
$password = "poseidonbabaca"; // Senha padrão do MySQL no XAMPP
$dbname = "site_profissional";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Coletar dados do formulário
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$name = $_POST['name'];
$surname = $_POST['surname'];
$birthdate = $_POST['birthdate'];
$location = $_POST['location'];

// Inserir dados no banco de dados
$sql = "INSERT INTO usuarios (email, password, name, surname, birthdate, location) 
        VALUES ('$email', '$password', '$name', '$surname', '$birthdate', '$location')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechar conexão
$conn->close();
?>
