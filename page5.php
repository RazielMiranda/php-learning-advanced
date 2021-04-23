<h1> PHP APIS </H1><hr>
<?php
session_start();

//? Gravando arquivos na sessão para ser usado posteriormente
$arquivos = $_SESSION['arquivos'] ?? [];

//? Pegando o caminho do diretorio
$pastaUploads = __DIR__ . '/files/';
$nomedoArquivo = $_FILES['arquivo']['name'];

//? nome do arquivo
$arquivo = $pastaUploads . $nomedoArquivo;

//? Pegando dir temp
$tmp = $_FILES['arquivo']['tmp_name'];

//? Checando upload e salvando na sessão o nome do arquivo
if(move_uploaded_file($tmp, $arquivo)){
    echo "upload ok!";
    $arquivos[] = $nomedoArquivo;
    $_SESSION['arquivos'] = $arquivos;
}else{
    echo 'erro upload!';
}


?>

<form action="#" method="post" enctype="multipart/form-data">
    <input name="arquivo" type="file">
    <button>enviar</button>
</form>

//? foreach para mostrar os arquivos
<ul>
    <?php foreach($arquivos as $arquivo): ?>
        <li>
            <a href="./files/<?=$arquivo?>" download>
                <?=$arquivo?></a>
            </a>
        </li>
    <?php endforeach ?>
</ul>