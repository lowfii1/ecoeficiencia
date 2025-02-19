<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    //try
    try {
        //define a consulta sql para atualizar os dados do usuário com base no id
        //utiliza parâmetros nomeados para prevenir injeção de sql
        $sql = "INSERT INTO  usuario (nome,telefone,email,sexo) VALUES(:nome,:telefone,:email,:sexo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':sexo', $sexo);
        if ($stmt->execute()) {
            echo "Cadastro efetuado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    } catch (PDOException $e) {
        echo "Erro:" . $e->getMessage();
    }
} else {
    echo "Metodo de requisição inválido";
}
?>