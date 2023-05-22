<?php 

require_once 'config.php';

// Verifica se o formulario de busca foi enviado
if (isset($_POST['buscar'])) {
    // Obtém o valor digitado pelo usuário
    $nomeFoto = $_POST['nome_foto'];

    // Realiza a consulta no banco de dados para buscar a foto com base no nome
    $sql = "SELECT * FROM fotos WHERE nome LIKE '%$nomeFoto%'";
    $resultado = $conexao->query($sql);
}


?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Foto</title>

    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<style>
body {
    height: 100vh;
        background: rgb(2,58,116);
        background: linear-gradient(299deg, rgba(2,58,116,1) 0%, rgba(10,91,76,1) 48%, rgba(0,255,192,1) 100%);
    }

    div {
        width: 300px;
        margin: 2% 35%;
        border: 10px solid #0a5b4b;
        border-style: double;
        padding: 40px 40px;
        border-radius: 20px;
        background-color: white;
    }

    


    h3 {
        align-items: center;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        color: #010c34;
        margin-left: 550px;
        font-size: 40px;
    
    }


    button {
        background-color: #94f2ad;
      
        margin: auto;
       
        padding: 12px;
        font-weight: bold;
        border: 2px blue;
        border-radius: 15px;
        color: #01145c;
    }

    button:hover {
        background: rgb(174,210,247);
        background: linear-gradient(299deg, rgba(174,210,247,1) 0%, rgba(169,249,234,1) 0%, rgba(143,205,240,1) 58%);
    }


    h4 {
        margin: auto;
        text-align: center;
    }



   


</style>




<body>
    
<div>

    <h1>Buscar foto</h1>
        
        <form action="" method="POST">
            <label for="nome_foto">Digite o nome da foto:</label>
            <input type="text" name="nome_foto" id="nome_foto">
            <br>
            <br>
            <button type="submite" name="buscar">Buscar</button>
        </form>

      
        <p><a href="index.php">Voltar</a></p>
</div>



    

    <?php 
   
   if (isset($resultado) && $resultado->num_rows > 0) {


    echo "<br>";
    echo "<br>";
   echo "<h3>Resultado</h3>";

   
    echo "<br>";

    while ($row = $resultado->fetch_assoc()) {
        $nomeFoto = $row['nome'];
        $caminhoFoto = $row['caminho'];
        $dataUpload = $row['data_upload'];
        

        echo '<div><img src="' . $caminhoFoto . '" alt="' . $nomeFoto . '" style="width: 300px"></div>'; // Exibe a foto
        echo '<h4>Nome: ' . $nomeFoto . '</h4>';
        // echo '<p>Caminho: ' . $caminhoFoto . '</p>';
        echo '<h4>Data de Upload: ' . $dataUpload . '</h4>';
        echo '<hr>';
    }
    } elseif (isset($resultado) && $resultado->num_rows === 0) {
    echo '<p>Nenhuma foto encontrada com o nome informado.</p>';
    }

    
    
    ?>



</body>
</html>