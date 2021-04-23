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
    - ler por bytes nao é tão didatico
    - se usa mais filesize
    - normalmente nao se le e altera uma linha ou seja r+


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

    - para escrever arquivos basta ter permissão na pasta de escrita

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