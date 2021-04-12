# Conceitos Include

    - se usa a função include()
    - nao se pode incluir duas vezes o mesmo arquivo com as mesmas funções gera erro
        - obs: é usando function_exists() no arquivo de include para evitar isso.
    - a ideia é acessar funções e variaveis do arquivo que foi incluido

    - Quando voce inclui um arquivo dentro de uma função o arquivo estará disponivel apenas dentro do espoco dela
    - ou seja esse arquivo so será incluido quando a função for chamada e 
    - também so será possivel acessar as funções do arquivo, variaveis não.
    - as funções estarão disponiveis nas linhas abaixo do metodo que contem o include as variaveis não.

##### Included vs Require

    Included:
        - caso tente incluir um arquivo que não existe apenas gera um warning

    Require:
        - caso tente incluir um arquivo que não existe gera um erro fatal

    obs: é mais usado o require por questões de regras de inclusões.


#### Returns em included

    - as variaveis de um arquivo estao disponiveis globalmente (caso seja incluido fora do escopo de uma função)
    - variaveis de retorno tambmém estão disponiveis (caso seja incluido fora do escopo de uma função)
    - é possivel incluir com caminhos absolutos require(../pasta1/arquivo.php)
        - pode ser usada a constante __DIR__ que representa o diretorio atual

#### include_once e require_once

    - Sempre que voce chama um arquivo as variaveis dele são reinicializadas isso usando include() ou require()
    - usando o include_once() ou require_once() voce consegue amarrar apenas para uma chamada do arquivo ou seja
    as variaveis e metodos não serão redefinidos assim como na outra chamada mesmo que seja incluido denovo o arquivo
    - também não é necessario usar o function_exists() pois o PHP vai tratar disso

# Conceitos NameSpace

...