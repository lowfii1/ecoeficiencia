<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $numero = trim($_POST['numero']);
    $sexo = trim($_POST['sexo']);
 
 
    if (empty($nome) || empty($email) || empty($telefone) || empty($sexo)) {
        echo "<script>alert('Por favor, preencha todos os campos!');</script>";
    } else {
   
        $checkEmail = $conn->prepare("SELECT id FROM usuario WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $checkEmail->store_result();
 
        if ($checkEmail->num_rows > 0) {
            echo "<script>alert('Erro: Este e-mail já está cadastrado!');</script>";
        } else {
           
            $stmt = $conn->prepare("INSERT INTO usuario (nome, email, telefone_celular, sexo) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nome, $email, $telefone_celular, $sexo);
 
            if ($stmt->execute()) {
                echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "');</script>";
            }
        }
    }
}
    ?>