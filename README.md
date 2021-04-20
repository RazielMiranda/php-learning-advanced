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

    - ...

