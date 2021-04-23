<h1> PHP APIS </H1><hr>
<?php

//? nome do arquivo, flag do metodo essa flag é pra abrir 
//? no modo de escrita dessa forma ele escreve tudo denovo no arquivo
$arquivo = fopen('teste.txt', 'w');

//? metodo que escreve algo no arquivo
fwrite($arquivo, "valor Inicial\n");

//? adicionando uma string por variavel
$str = "Segunda Linha\n";
fwrite($arquivo, $str );

//? encerrando o contato com o arquivo
fclose($arquivo);


$arquivo = fopen("teste.txt", "w");
fwrite($arquivo, "novo conteudo\n");
fclose($arquivo);

//? usando a tag append para adicionar conteudo no arquivo sem apagar o que ja tem
$arquivo = fopen("teste.txt", "a");
fwrite($arquivo, "adicionando conteudo");
fwrite($arquivo, "adicionando conteudo denovo!");
fclose($arquivo);

//? a flag x obriga que o arquivo nao existe antes de abrir ele em modo write
ini_set('display_errors', 1);
$arquivo = fopen('teste.txt', 'x');
fwrite($arquivo, "adicionando conteudo denovo!");
fclose($arquivo);