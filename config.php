<?php
// Configurações de conexão com o banco de dados
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'upload_image_db';

// Estabelece a conexão com o banco de dados
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conexao->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
} 
?>