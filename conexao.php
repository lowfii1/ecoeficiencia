<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="eco";

// criando conexão
$conn = new mysqli($servername,$username,$password,$database);
echo '';
// verificando conexão
if($conn->connect_error){
    die("Falha na conexão:" .$conn->connect_error);
}
?>