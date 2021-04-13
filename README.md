# Conceitos Tratamento de erros em PHP´

    - Tratamento de erros são recorrentes em linguagens de programação
    no PHP não é diferente, por isso usamos o try/catch.

#### TRY/CATCH

    - Um bloco try sempre terá um ou mais catchs ou um bloco finally
    - dentro do co catch é obrigatorio passar um tipo

    - Error é pra quando o erro é fatal
    - Expetions são quando regras podem ser violadas (range de idade)
        - em excpetions se usa o thorw junto

    - Os erros respeitam uma hierarquia:
        1 - Error = erros especificos, para a aplicação.
        2 - Expetions = erros genericos
    - de forma que os blocos quando moldados devem seguir essa ordem

    - o bloco finally sempre será executado independete do que acontecer se antes
    tiver caido no catch ou no try