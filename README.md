# GUZZLE HTTP CLIENT

1 - instalar guzzle composer require 
    - guzzlehttp/guzzle
    - é necessario estar configurado o certificado ssl no php

2 - Precisar inserir a URL que quer fazer o request pode ser via form ou uma variavel com ela passando

3 - codigo:

<?php
    // phpinfo();
    // exit;
    if(isset($_REQUEST['feed_url'])){

        //? Incluit o autoload do PHP
        require 'vendor/autoload.php';

        //? Instanciar um novo client guzzle
        $myClient = new GuzzleHttp\Client([
            'headers' => ['User-Agent' => 'MyReader']
        ]);

        //? fazer o request: 1 parametro é o tipo de requisição, segundo parametro a URL que quer fazer a requisição
        $feedResponse = $myClient->request('GET', $_REQUEST['feed_url']);
        
        //? Verificando o status do request
        if($feedResponse->getStatusCode() === 200){

            //? Pegando valores do header
            if($feedResponse->hasHeader('content-length')){
                $content = $feedResponse->getHeader('content-length')[0];
                echo "<p> Download of $content bytes </p><hr>";
            }

            //? Salvando o corpo da requisição em uma variavel
            $body = $feedResponse->getBody();

            //? Por ser XML pode ser usado essa função do PHP para "Serializar" o XML
            $xml = new SimpleXMLElement($body);

            //? Acessando os nós do XML e exibindo eles
            foreach($xml->channel->item as $item){
                echo '<h3>' . $item->title . "</h3>";
                echo '<p>' . $item->description . "</p>";
            }

        }
    }
?>

#### TUTORIAL 1 : https://www.youtube.com/watch?v=kKppYrHbO3Y