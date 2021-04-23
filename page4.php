<h1> PHP APIS </H1><hr>
<?php
//? Array que guarda as informações dos arquivos assim como get e post a chave do Array
//? é criada com o parametro name do form
print_r($_FILES);

//? Verificação se existe o arquivo no files
if($_FILES && $_FILES['arquivo']){

    //? Caminho da pasta de uploads
    $pastaUploads = "C:\wamp64\www\php-learning-path-advanced\uploads";

    //? Nome do arquivo vindo do array files
    $nomeArquivo = $_FILES['arquivo']['name'];

    //? Pegando a pasta temporaria do arquivo
    $arquivo = $pastaUploads . $nomeArquivo;
    $tmp = $_FILES['arquivo']['tmp_name'];

    //? Pegando o caminho da pasta temp e movendo o arquivo para a pasta criada
    if(move_uploaded_file($tmp, $arquivo)){
        echo "arquivo valido e ok";
    }else{
        echo "erro no upload";
    }
}
// print_r($_POST);
// print_r($_GET);
?>

//? Para submeter arquivos se usa o enctype="multipart/form-data"
<form action="#" method="POST"
      enctype="multipart/form-data">
      <input name="arquivo" type="file">
      <button>Enviar</button>
<form>