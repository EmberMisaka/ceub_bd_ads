# 1.0 Consultas Aninhadas

**Tabela**

| id_cliente | nome_cliente |
| ---------- | ------------ |
|     1      |     João     |
|     2      |    Cesimar   |
|     3      |    Gustavo   |

    select nome_cliente
    from cliente
    where id_cliente
        in (select id_cliente from dependente)

**Retorno**

| id_cliente |
| ---------- |
|     1      |
|     2      |
|     3      |

# 2.0 Junção Interna


**Tabela Cliente**

| id | nome       | idade |
|----|------------|-------|
| 1  | João Silva | 25    |
| 2  | Maria Santos| 31    |
| 3  | Pedro Costa | 42    |

**Tabela Pedidos**

| id | cliente_id | produto    |
|----|------------|------------|
| 1  |      1     | TV         |
| 2  | 1          | Computador |
| 3  | 2          | Celular    |

    SELECT clientes.nome, pedidos.produto
    FROM clientes
        INNER JOIN pedidos
        ON clientes.id = pedidos.cliente_id;


**Retorno**

| nome         | produto    |
|------------- |------------|
| João Silva   | TV         |
| João Silva   | Computador |
| Maria Santos | Celular    |

# 3.0 Left Join

**Tabela Clientes**
| id | nome       |
|----|------------|
| 1  | João Silva |
| 2  | Maria Santos|
| 3  | Pedro Costa |

**Tabela Pedidos**
| id | cliente_id | produto |
|----|------------|---------|
| 1  | 1          | TV      |
| 2  | 1          | Computador |
| 3  | 2          | Celular  |

**Comando**

    SELECT clientes.nome, pedidos.produto
    FROM clientes
        LEFT JOIN pedidos
        ON clientes.id = pedidos.cliente_id;


**Retorno**
| nome       | produto    |
|------------|------------|
| João Silva | TV         |
| João Silva | Computador |
| Maria Santos| Celular    |
| Pedro Costa | NULL       |

### 3.1 Right Join

    SELECT clientes.nome, pedidos.produto
    FROM clientes
        RIGHT JOIN pedidos
        ON clientes.id = pedidos.cliente_id;


**Retorno**
| nome       | produto    |
|------------|------------|
| João Silva | TV         |
| João Silva | Computador |
| Maria Santos| Celular    |