<h1> PHP APIS </H1><hr>
<?php
session_start();

$arquivos = $_SESSION['arquivos'] ?? [];

$pastaUploads = __DIR__ . '/files/';
$nomedoArquivo = $_FILES['arquivo']['name'];

$arquivo = $pastaUploads . $nomedoArquivo;
$tmp = $_FILES['arquivo']['tmp_name'];
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

<ul>
    <?php foreach($arquivos as $arquivo): ?>
        <li>
            <a href="./files/<?=$arquivo?>" download>
                <?=$arquivo?></a>
            </a>
        </li>
    <?php endforeach ?>
</ul>