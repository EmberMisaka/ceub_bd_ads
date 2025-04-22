# 1.0 Operações Com String
Nessa parte iremos trabalhar apenas com strings, campos de texto que são diferentes de data, hora e caractere.

### Exemplo de Uso

**Tabela**

| id |    nome     |         email          |
|----|-------------|------------------------|
| 1  | João Silva  |  joao.silva@email.com  |
| 2  | Maria Santos| maria.santos@email.com |
| 3  | Pedro Costa | pedro.costa@email.com  |

**Comando**

    SELECT *
    FROM clientes
    WHERE nome LIKE '%Silva%'
    ;

- ```SELECT *``` - Seleciona tudo
- ```FROM clientes``` - da tabela clientes
- ```WHERE nome LIKE '%Silva%'``` - Com nomes que possuam 'Silva'
- ```LIKE``` - Esse comando é usado para procurar padrões em Strings.

**Retorno**

| id |    nome     |         email          |
|----|-------------|------------------------|
| 1  | João Silva  |  joao.silva@email.com  |

> Existem alguns usos para o comando ```LIKE``` e também para ```%```, que é exatamente o que irei explicar a seguir:

# 1.1 - Trabalhando com ```%```

O caractere ```%``` representa "zero ou mais caracteres", de forma resumida, existem alguns exemplos de como utilizálo:

### Exemplo Letra Inicial

    SELECT *
    FROM clientes
    WHERE nome LIKE 'J%'
    ;

**Retorno**

| id |    nome     |         email          |
|----|-------------|------------------------|
| 1  | João Silva  |  joao.silva@email.com  |

A linha de código ```WERE nome LIKE 'J%'```, está aplicando uma condição na pesquisa em que o nome do cliente precisa COMEÇAR com a letra J, em resumo, o código quer dizer, em palavras humanas:

> "Selecione tudo da tabela clientes onde o nome inicie com J e tenha qualquer coisa depois disso."

Portanto, o caractere ```%``` pode também ser utilizado no final e também no meio de uma pesquisa de tabelas, siga os exemplos:

### Exemplo Letra no Meio:

    SELECT *
    FROM clientes
    WHERE nome LIKE '%N%'
    ;

**Retorno**

| id |    nome     |         email          |
|----|-------------|------------------------|
| 2  | Maria Santos| maria.santos@email.com |

Nesse caso, a condição:

    Where nome LIKE '%N%'

Vai falar especificamente de nomes que possuam qualquer coisa antes, a letra N no meio e qualquer coisa depois disso, em outras palavras, procuram pelo nome que possuam a letra N no corpo deles.

Lembrando que não importa se vai começar ou finalizar com essa letra, pois o caractere também representa 0 caracteres, portanto, o comando também iria mostrar se existisse uma pessoa com o nome ```Nádio```, por exemplo.

### Exemplo Letra no Final

    SELECT *
    FROM clientes
    WHERE nome LIKE '%A'
    ;

**Retorno**

| id |    nome     |         email          |
|----|-------------|------------------------|
| 1  | João Silva  |  joao.silva@email.com  |
| 3  | Pedro Costa | pedro.costa@email.com  |

Como explicando anteriormente, o caractere ```%``` vai encontrar nomes que possuam qualquer coisa antes, mas que obrigatoriamente irão terminar com a ```Letra A```.

# 1.2 Trabalhando com ```_```

**Tabela**

| id |    nome     |         email          |
|----|-------------|------------------------|
| 1  | João Silva  |  joao.silva@email.com  |
| 2  | Maria Santos| maria.santos@email.com |
| 3  | Pedro Costa | pedro.costa@email.com  |

**Comando**

    SELECT *
    FROM clientes
    WHERE email LIKE '%@_mail%'

- ```SELECT *``` - Seleciona tudo
- ```FROM clientes``` - da tabela clientes
- ```WHERE email LIKE '%@_mail%'``` - vai procurar pelo email que possua um caractere entre ```@``` e ```mail``` dentro da String de Email
- ```LIKE``` - Esse comando é usado para procurar padrões em Strings.

**Retorno**

| id |    nome     |         email          |
|----|-------------|------------------------|
| 1  | João Silva  |  joao.silva@email.com  |
| 2  | Maria Santos| maria.santos@email.com |
| 3  | Pedro Costa | pedro.costa@email.com  |

> Existem outras maneiras de utiluzar este caracetere nos comandos SQL, mas não irei demonstrar por ser um pouco "óbvio de mais", por assim dizer.

# 2.0 Distinct

O SQL, em diversos comandos de pesquisa pode gerar muitas repetições e, incluindo, um retorno que comumente é chamado de ```Cross Join```, existem maneiras de contornar esse problema e, uma delas, é utilizando o comando ```distinct```.

> Cross Join é um erro de comando que acaba mostrando ```Atributos da Tabela A``` x ```Atributos da Tabela B```, por exemplo, se em um Banco de Dados possuimos 10 atributos na ```Tabela A```, e 10 atributos na ```Tabela B```, caso você tente utilizar algum comando que una as duas tabelas sem dar parâmetros, o SQL vai te retornar uma tabela com 10 x 10 valores repetidos, resultando em 100 linhas em uma única tabela. Mas isso será abordado em outro tópico.

**Tabela**

| id | nome |   bairro   |
| -- | ---- | ---------- |
| 01 | José |  Mandrake  |
| 02 | Mark | São Morais |

**Comando**

    SELECT distinct(bairro)
    FROM cliente

**Retorno**

|   bairro   |
| ---------- |
|  Mandrake  |
| São Morais |

### Exemplo com Múltipas Colunas
O comando ```DISTINCT``` pode ser utilizado sem as barras, e, também, para selecionar múltiplas colunas.

**Comando**

    SELECT distinct bairro, nome
    FROM cliente

**Retorno**

| nome |   bairro   |
| ---- | ---------- |
| José |  Mandrake  |
| Mark | São Morais |

# 3.0 Order By

O comando ```ORDER BY``` vai organizar a tabela de acordo com uma especificação, por exemplo:
**Tabela**

| id |      nome      | idade |      cidade    |
|----|----------------|-------|----------------|
| 1  |   João Silva   | 25    | São Paulo      |
| 2  |  Maria Santos  | 31    | Rio de Janeiro |
| 3  |   Pedro Costa  | 42    | Belo Horizonte |
| 4  |    Ana Luiza   | 28    | Brasília       |
| 5  | Carlos Oliveira| 35    | Salvador       |

**Comando**

    SELECT *
    FROM clientes
    ORDER BY idade DESC;

- ```SELECT *``` - Seleciona tudo.
- ```FROM clientes``` - Da tabela clientes.
- ```ORDER BY idade DESC``` - Ordenado por idade decrescente.

> Observaões:

- ```DESC``` - Prioriza a forma decrescente.
- ```ASC``` - Prioriza a forma crescente.


