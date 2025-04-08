# 1.0 Funções Agregadas

- ```max()```
- ```min()```
- ```sum()```
- ```avg()```

**Tabela**

| id | nome | salario |
| -- | ---- | ------- |
| 1  | Mark | 1500.65 |
| 2  | Niki | 2360.96 |
| 3  | Ghil | 1000.00 |

**Comando MAX()**

    SELECT max(salario)
    FROM funcionario as f;

**Retorno**

| salario |
| ------- |
| 1500.65 |

**Comando MIN()**

    SELECT min(salario)
    FROM funcionario as f;

**Retorno**

| salario |
| ------- |
| 1000.00 |

**Comando SUM()**

    SELECT min(salario)
    FROM funcionario as f;

# 2.0 Cláusula Having

A cláusula HAVING restringe os resultados do GROUP BY.

    select nome_cliente, sum(valor)
    from saque group by nome_cliente
        having sum(valor)>200;

**Retorno**

| nome_cliente | sum |
| ------------ | --- |
| José de Melo | 450 |
| Waldick Sora | 250 |

Relembrando: valores nulos são aqueles em que não 	se  aplica  um  valor  para  aquele  atributo  naquela 	entidade;

Testamos  se  um  valor  é  nulo  ou  não  através  da 	construção ```is null``` ou ```is not null```, dependendo do 	caso.

    select nome_cliente
    from cliente
    where numero_apto is null
