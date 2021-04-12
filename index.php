<h1>Includes</h1>
<?php

// include('includes/include_arquivo.php');
// include('includes/include_arquivo.php'); //! chamando duas vezes para ver o comportamento
// echo 'soma =' . soma(1,2);
// echo '<hr>';

/*
    ? Quando voce inclui um arquivo dentro de uma função o arquivo estará disponivel apenas dentro do espoco dela
    ? ou seja esse arquivo so será incluido quando a função for chamada e 
    ? também so será possivel acessar as funções do arquivo, variaveis não.
    ? as funções estarão disponiveis nas linhas abaixo do metodo que contem o include.
*/


// echo "var = {$variavel}"; //! causa erro pq o arquivo nao foi incluido ainda

function carregarInclude(){
    include('includes/include_arquivo.php');
    // echo $variavel; //! causa erro nao da pra acessar
    echo soma(10,45);
}
carregarInclude();
// echo "var = {$variavel}"; //! causa erro nao da pra acessar
echo soma(12,21); //! função dispponivel porque ja foi chamado o metodo do include