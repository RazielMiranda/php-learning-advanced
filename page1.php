<h1> PHP APIS </H1><hr>
<?php

//? Defininindo formatos de datas
$formatoData1 = 'D, d \d\e M \d\e Y';
$formatoData2 = '%A, %d de %B de %Y';
$formatoDataHora = '%A, %d de %B de %Y - %H;%M;%S';

//! instanciando objeto DateTime
$agora = new DateTime();

//! Formatando a data atual com a função format
echo $agora->format($formatoData1) . '<hr>' ; 

//! Setando o locale, a diferença esta em passar o timestamp a função strftime()
setlocale(LC_TIME, 'pt_BR');
echo strftime($formatoData2, $agora->getTimestamp()) . '<hr>' ; 

//! Passando uma string para o contrutor do objeto dessa forma ja soma duas semanas na data atual
$amanha = new DateTime("+2 week");
echo strftime($formatoData2, $amanha->getTimestamp()) . '<hr>' ; 

$datafixa = new DateTime('1975-01-25 15:30:32');
echo strftime($formatoDataHora, $datafixa->getTimestamp()) . '<hr>' ; 

//! Adicionando/removendo datas de um objeto time, passando apenas uma string de interpretação
$amanha->modify('+87 years');
echo strftime($formatoDataHora, $amanha->getTimestamp()) . '<hr>' ; 

//! setando uma nova data ao objeto
$amanha->setDate(2000, 5, 20);
echo strftime($formatoDataHora, $amanha->getTimestamp()) . '<hr>' ; 

//! Dados de teste
$dataPassada = new DateTime('2000-05-17');
$dataFutura = new DateTime('2000-05-17');
$outraData = new DateTime('2000-05-17');

//! Operações ternarias
echo ($amanha > $dataPassada ? 'Maior' : 'Menor') . '<hr>';
echo ($amanha > $dataFutura ? 'Maior' : 'Menor') . '<hr>';

//? Retornando com verificação apenas do valor no caso retorna truw
echo $outraData == $dataFutura ? 'Igual' : 'Diferente' . '<hr>';

//? verificação restrita verifica ate o endereço de memoria retorna false
echo $outraData === $dataFutura ? 'Igual' : 'Diferente' . '<hr>';

//? Defininindo time zone da data. util para salvar em timezones especificos
$tz = new DateTimeZone('America/Sao_Paulo');
$agora = new DateTime(null, $tz);
echo $agora->format('d/M/Y H:i:s') . '<hr>';