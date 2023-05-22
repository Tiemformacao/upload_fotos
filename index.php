<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Fotos</title>
    
<style>

    body {
        background: rgb(2,58,116);
        background: linear-gradient(299deg, rgba(2,58,116,1) 0%, rgba(10,91,76,1) 48%, rgba(0,255,192,1) 100%);
    }

    div {
        width: 300px;
        margin: 15% 35%;
        border: 10px solid #0a5b4b;
        border-style: double;
        padding: 40px 40px;
        border-radius: 20px;
        background-color: white;

    }

    h1 {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        color: green;
    }

    
    #btt_enviar {
        background-color: rgba(red, green, blue, 0.7);
    }


</style>

</head>
<body>

<div>
<h1>Upload de Fotos</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="foto">
        <br>
        <br>
        <input id="btt_enviar" type="submit" value="Enviar">
    </form>
</div>


    
</body>
</html>