<?php
try {
    // a variavel $pdo éuma nova instancia de PDO
    $pdo = new PDO("mysql:dbname=eco;host=localhost", "root", "");
 
} catch (Exception $e) {
    echo "Erro no BD" . $e->getMessage();
}
?>