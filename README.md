# PHP APIS

## DATAS

    - funções:

    //! definir localem so no arquiv atual
    echo strftime("%A DE %d %B %Y" , time());
    setlocale(LC_TIME, 'pt_BR');

    //! para voltar
    setlocale(LC_TIME, null);
    echo strftime("%A DE %d %B %Y" , time());

    //? Demonstraçãod e datas
    $amanha = time() * (24 * 60 * 60);
    echo strftime("%A DE %d %B %Y" , $amanha );

    $anos = strtotime("+6 year");
    echo strftime("%A DE %d %B %Y" , $anos );

    $datafixa = mktime(15,39,32, 43, 1);
    echo strftime("%A DE %d %B %Y" , $datafixa );

    - com o objeto datetime:
        - formata
        - seta o timezone
        - pode passa strings ao contrutor

## ARQUIVOS

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

    - pode se ler uma arquivo linha por linha
    - da para ler por bytes
    - da para se ler com while
    - tem de tomar cuidado pois as vezes o servidor nao suporta a leitura