<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>GUZZLE HTTP CLIENT</h1>
<hr>

<form method="post">
    <input type="text" name="feed_url"></input>
    <button type="submit">FETCH</button>
</form>
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
</form>
</body>
</html>