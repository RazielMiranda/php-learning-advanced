<h1> Erros personalizados </H1><hr>
<?php
 
 /*
    - No tratamento de erros personalizados é criado uma classe que extende de exception
    - dentro dessa classe haverá alguns parametros que serão passsados a exception
    - a logica:
        - criar a função que deseja
        - dentro da função tratar os erros de acordo com as regras de negocio
    - Basicamente serve pra denifir um nome diferente de Exception na hora de instanciar o catch
    deixando assim mais limpo o codigo

 */

 class FaixaEtariaException extends Exception{
    public function __construct($message, $code = 0, $previous = null){
        //? O parametro preview dentro de Excpetion serve 
        //? por exemplo para identificar a ordem do catch que deu problema se foi o 1,2,3 etc..
        parent::__construct($message, $code, $previous);
    }
 }

 function calculaAposentadoria($idade){
     if($idade < 18){
         //? Jogando uma nova execesão caso caia nesse if, passou apenas o parametro $message
         //? É possivel usar pois aqui ocorreu polimorfismo e FaixaEtariaException adiquiriu
         //? as habilidades de Excepetion e agora se tornou um throwable
         throw new FaixaEtariaException('Ainda esta longe!<hr>');
     }
     if($idade > 70){
        throw new FaixaEtariaException('Ja deveria estar aposentado<hr>');
     }
     return 70 - $idade;
 }

 $idadeAvaliadas = [15,30,60,80];

 foreach($idadeAvaliadas as $idade){
     try{
         //? Chamando a função que possui os tratamentos de erro
         $tempoRestante = calculaAposentadoria($idade);
         echo "Idade: $idade , $tempoRestante anos restante <hr>";
     }catch(FaixaEtariaException $e){
         //? Pegando a mensagem que vem do construtor personalizado
         echo "nao foi possivel calcular para $idade anos<hr>";
         echo "Motivo:  $e-getMessage()  <hr>";
     }
 }

 echo 'fim <hr>';