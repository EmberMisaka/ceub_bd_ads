# Comandos Básicos do SQL
Caminho padrão para consultar tabelas:

- ```SELECT```: Seleciona alguma coisa
- ```FROM```: De alguma tabela
- ```Where```: Com alguma condição (nem sempre é usado)

**Tabela**

| id |  Nome  | idade |
| -  | ------ | ----- |
| 1  | Marcos |  19   |
| 2  | Miguel |  20   |
| 3  | Arthur |  16   |

### Exemplo de uso

    SELECT *
    FROM cliente
    Where idade >= 18

- ```SELECT *``` - Seleciona tudo
- ```FROM cliente``` - Da tabela cliente
- ```Where idade >= 18``` - Onde a idade é maior ou igual a 18

**Retorno**

| id |  Nome  | idade |
| -  | ------ | ----- |
| 1  | Marcos |  19   |
| 2  | Miguel |  20   |

> Note que existe uma pessoa que não foi selecionada no comando.
