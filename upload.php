<?php 


require_once 'config.php';

// Diretório onde as fotos serão armazenadas
$diretorio = 'fotos/';

// Verifica se o diretório existe, caso contrário, cria-o
if (!file_exists($diretorio)) {
    mkdir($diretorio, 0777, true);
}

// Verifica se o arquivo foi enviado sem erros
if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $nomeArquivo = $_FILES['foto']['name'];
    $caminhoArquivo = $diretorio . $nomeArquivo;

    // Move o arquivo enviado para o diretório de destino
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoArquivo)) {
        // Prepara a declaração SQL para inserir os dados da foto no banco
        $sql = "INSERT INTO fotos (nome, caminho, data_upload) VALUES (?, ?, NOW())";
        $stmt = $conexao->prepare($sql);

        // Verifica se ocorreu algum erro na preparação da declaração SQL
        if (!$stmt) {
            echo 'Erro na preparação da declaração SQL: ' . $conexao->error;
        } else {
            // Vincula os parâmetros e seus tipos de dados à declaração SQL
            $stmt->bind_param('ss', $nomeArquivo, $caminhoArquivo);

            // Executa a declaração SQL
            if ($stmt->execute()) {
                header('Location: pos_envio.php');
                exit();
            } else {
                echo 'Ocorreu um erro ao salvar os dados no banco de dados.';
            }

            // Fecha a declaração SQL
            $stmt->close();
        }
    } else {
        echo 'Ocorreu um erro ao enviar a foto.';
    }
} else {
    echo 'Erro no upload da foto: ' . $_FILES['foto']['error'];
}

// Fecha a conexão com o banco de dados
$conexao->close();

  

?>