<h1> PHP APIS </H1><hr>
<?php

//? Abrindo arquivo no modo de leitura
$arquivo = fopen('teste.txt', 'r');

//? Lendo apenas 10 bytes por vez
echo fread($arquivo, 10);
echo "<hr>";
echo fread($arquivo, 10);
fclose($arquivo);

echo "<hr>";

//? Passando o filesize dessa forma le o arquivo inteiro, passando por variavel
$arquivo = fopen('teste.txt', 'r');
$tamanhoArquivo = filesize('teste.txt');
echo $tamanhoArquivo;
echo fread($arquivo, $tamanhoArquivo);
fclose($arquivo);

echo '<hr>';

//? Lendo arquivo linha por linha, casp map tenha mais linhas a função fgets retorna false,
$arquivo = fopen('teste.txt', 'r');
echo fgets($arquivo), '<hr>';
echo fgets($arquivo), '<hr>';
var_dump(fgets($arquivo));
fclose($arquivo);
echo '<hr>';

//? Lendo cada linha do arquivo utilzando laço while com a função feof que significa end of file
//? De forma que vai ler ate o final do arquivo automatizando o fgets
$arquivo = fopen('teste.txt', 'r');
while(!feof($arquivo)){
    echo fgets($arquivo), '<hr>';
}
fclose($arquivo);

//? Lendo caracter oir caracter
$arquivo = fopen('teste.txt', 'r');
while(!feof($arquivo)){
    echo fgetc($arquivo), '<hr>';
}
fclose($arquivo);

//? lendo e alterando ao mesmo tempo, nao é muito usado.
$arquivo = fopen('teste.txt', 'r+');
echo fgets($arquivo), '<hr>';
echo fgets($arquivo), '<hr>';
fwrite($arquivo, 'adicionado durante a leitura');
fclose($arquivo);

echo 'fim';