<!DOCTYPE html>
<html lang="pt-br
">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySql ( Básico curso em vídeo )</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        span{
            color: red;
        }
        .opcional{
            color: blue;
        }
    </style>
</head>
<body>
    <main>
        <fieldset>
            <h1>MySql ( Básico curso em vídeo )</h1>
            <h3>Criar banco de dados</h3>
            <p>CREATE DATABASE <span>Nome do banco de Dados</span>;</p>
            <h3>Criar tabela </h3>
            <pre> 
CREATE TABLE <span>nome tabela</span>(
    <span>Campo</span> <span>Tipo</span>,
);
            </pre>
            <h2>Descrição da tabela</h2>
            <a href="descricao.php" target="_blank">DESCRIBE pessoas;</a>
            <h3>Excluir banco de dados</h3>
            <p>DROP DATABASES <span>Nome do banco de Dados</span>;</p>
            <h3>Criar banco de dados com utf8 e coleção</h3>
            <pre>
CREATE DATABASE <span>Nome do banco de Dados</span>
DEFAULT CHARACTER SET utf8
DEFAULT collete utf8_general_ci;
            </pre>
            <h3>Criar tabela com utf8 e chave primaria</h3>
            <pre> 
CREATE TABLE <span>nome tabela</span>(
    <span>Campo</span> <span>Tipo</span> <span class="opcional">Not</span> <span class="opcional">Null</span> <span class="opcional">AUTO_INCREMENT</span>,
    PRIMARY KEY (<span>campo</span>)
)DEFAULT charset = utf8;
            </pre>
            <h3>Inserindo Dados</h3>
            <p >INSERT INTO pessoas(<span>campo</span>) VALUES (<span>'dados'</span>);</p>
            <h3>Alterando Estrutura da tabela - adicionando coluna</h3>
            <p>ALTER TABLE <span>nome tabela</span> add COLUMN <span>campo</span> <span>tipo</span>;</p>
            <h3>Alterando Estrutura da tabela - deletando coluna</h3>
            <p>ALTER TABLE <span>nome tabela</span> drop COLUMN <span>campo</span> <span>tipo</span>;</p>
            <h3>Alterando Estrutura da tabela - adicionando coluna depois de uma coluna especifica</h3>
            <p>ALTER TABLE <span>nome tabela</span> add COLUMN <span>campo</span> <span>tipo</span> after <span>nome da coluna</span>;</p>
            <h3>Alterando Estrutura da tabela - adicionando coluna no inicio</h3>
            <p>ALTER TABLE <span>nome tabela</span> add COLUMN <span>campo</span> <span>tipo</span> first;</p>
            <h3>Alterando Estrutura da tabela - modificar tipo</h3>
            <p>ALTER TABLE <span>nome tabela</span> modify COLUMN <span>campo</span> <span>tipo</span>;</p>
            <h3>Alterando Estrutura da tabela - mudando o nome da coluna</h3>
            <p>ALTER TABLE <span>nome tabela</span> change COLUMN <span>campo velho</span> <span>campo novo</span> <span>tipo</span>;</p>
            <h3>Alterando Estrutura da tabela - mudando o nome da tabela</h3>
            <p>ALTER TABLE <span>nome tabela</span> rename to <span>nome de nova tabela</span>;</p>
            <h3>Criar tabela só se ela não existe</h3>
            <pre> 
CREATE TABLE if not EXISTS <span>nome tabela</span>(
    <span>Campo</span> <span>Tipo</span>,
);
            </pre>
            <h3>Adicionando primary key</h3>
            <p>ALTER TABLE <span>tabela</span> add PRIMARY key (<span>campo</span>);</p>
            <h3>Excluir tabela</h3>
            <p>DROP TABLE <span>nome tabela</span>;</p>
            <h3>Excluir tabela se existe</h3>
            <p>DROP TABLE if EXISTS <span>nome tabela</span>;</p>
            <h3>Modificar dados</h3>
            <p>UPDATE <span>nome tabela</span> set <span>campo</span> = '<span>dados modificado</span>' WHERE <span>chave primaria</span> <span>condição</span> '<span>codigo da chave primaria</span>';</p>
            <h3>Deletar dados</h3>
            <p>DELETE FROM <span>nome tabela</span> WHERE <span>chave primary</span> = '<span>codigo chave primaria</span>';</p>
            <h3>Apagar todos dados da tabela</h3>
            <p>TRUNCATE TABLE <span>nome tabela</span>;</p>
            <h3>Pesquisar em tabelas</h3>
            <a href="select.php" target="_blank">SELECT * FROM <span>nome tabela</span>;</a>
            <h3>Pesquisar por ordem</h3>
            <a href="pesquisarordem.php" target="_blank">SELECT * FROM <span>nome tabela</span> ORDER BY <span>coluna para ordenar</span> <span class="opcional">ordem</span>;</a>
            <h3>Filtrar colunas</h3>
            <a href="filtrarcolunas.php" target="_blank">SELECT <span>colunas a ser mostrada</span> FROM <span>nome tabela</span> </a>
            <h3>Pesquisar por condição</h3>
            <a href="pesquisarcondicao.php" target="_blank">SELECT <span>colunas a ser mostrada</span> FROM <span>nome tabela</span> where <span class="opcional">coluna</span> <span class="opcional">condição</span> <span class="opcional">codigo</span></a>
            <h3>Listar de distinguir na tabela</h3>
            <a href="distinct.php" target="_blank">SELECT DISTINCT <span>campo</span> FROM <span>nome tabela</span>;</a>
            <h3>Função de agregação contar</h3>
            <a href="count.php" target="_blank">SELECT COUNT(*) FROM <span>nome tabela</span>;</a>
            <h3>Função de agregação maximo</h3>
            <a href="max.php" target="_blank">SELECT Max(<span>campo</span>) FROM <span>nome tabela</span>;</a>
            <h3>Função de agregação minimo</h3>
            <a href="min.php" target="_blank">SELECT Min(<span>campo</span>) FROM <span>nome tabela</span>;</a>
            <h3>Função de agregação somar</h3>
            <a href="sum.php" target="_blank">SELECT SUM(<span>campo</span>) FROM <span>nome tabela</span>;</a>
            <h3>Função de agregação media</h3>
            <a href="avg.php" target="_blank">SELECT AVG(<span>campo</span>) FROM <span>nome tabela</span>;</a>
            <h3>Listar por grupos</h3>
            <a href="group.php" target="_blank">SELECT <span>campo</span> FROM <span>nome tabela</span> GROUP by <span>campo</span>;</a>
            <h3>Listar por grupos com condições</h3>
            <a href="having.php" target="_blank">SELECT <span>campo</span>, <span>agrecação</span>(<span>campo</span>) FROM <span>nome tabela</span> GROUP by <span>campo</span> HAVING(<span>campo</span>) <span>condição</span> <span>valor da condiçãp</span>;</a>            
            <h3>Ligação de chave estrageira</h3>
            <p>ALTER TABLE <span>nome Tabela</span> ADD FOREIGN key (<span>campo</span>) REFERENCES <span>tabela que vai pagar a primary key</span>(<span>primarykey</span>);</p>
            <h3>Juntar tabelas</h3>
            <a href="innerjoin.php" target="_blank">SELECT <span>nome Tabela</span>.<span>campo</span>, <span>nome Tabela</span>.<span>campo</span> FROM <span>nome Tabela</span> inner join <span>nome Tabela</span> on <span>nome Tabela</span>.<span>campo</span> = <span>nome Tabela</span>.<span>campo</span>;</a>
            <h3>Juntar tabelas com preferencia a direita</h3>
            <a href="leftjoin.php" target="_blank">SELECT <span>nome Tabela</span>.<span>campo</span>, <span>nome Tabela</span>.<span>campo</span> FROM <span>nome Tabela</span> LEFT join <span>nome Tabela</span> on <span>nome Tabela</span>.<span>campo</span> = <span>nome Tabela</span>.<span>campo</span>;</a>
            <h3>Juntar tabelas com preferencia a esquerda</h3>
            <a href="rightjoin.php" target="_blank">SELECT <span>nome Tabela</span>.<span>campo</span>, <span>nome Tabela</span>.<span>campo</span> FROM <span>nome Tabela</span> RIGHT join <span>nome Tabela</span> on <span>nome Tabela</span>.<span>campo</span> = <span>nome Tabela</span>.<span>campo</span>;</a>
            <h2>Desafios</h2>
            <p><a href="desafio01.php" target="_blank">Uma lista com o nome de todos as pessoas femininas</a></p>  
            <p><a href="desafio02.php" target="_blank">Uma lista com os dados de todos aqueles que nasceram de entre 1/jan/2000 a 31/dez/2015</a></p> 
            <p><a href="desafio03.php" target="_blank">Uma lista com o nome de todos os homens que trabalham como programadores</a></p> 
            <p><a href="desafio04.php" target="_blank">Uma lista com os dados de todas as mulheres que nasceram no brasil e que tem seu nome iniciado com a letra j</a></p>
            <p><a href="desafio05.php" target="_blank">Uma lista com o nome e nascionalidade de todos os homens que tem silva no nome, não nasceram no brasil e pesam menos de 100kg</a></p> 
            <p><a href="desafio06.php" target="_blank">Qual a maior altura entra pessoas que moram no brasil</a></p> 
            <p><a href="desafio07.php" target="_blank">Qual a media de peso das pessoas cadastradas</a></p> 
            <p><a href="desafio08.php" target="_blank">Qual é o menor peso entre as pessoas mulheres que nasceram fora do brasil e entre 01/jan/1990 e 31/dez/2000</a></p>
            <p><a href="desafio09.php" target="_blank">Quantas pessoas mulheres tem mais de 1,90m de altura</a></p>
            <p><a href="desafio10.php" target="_blank">Uma lista com as profissões das pessoas e seus respetivos quantitativos</a></p> 
            <p><a href="desafio11.php" target="_blank">Quantas pessoas homens e quantas mulheres nasceram após 01/jan/2005</a></p> 
            <p><a href="desafio12.php" target="_blank">Uma lista com as pessoas que nasceram fora do brasil, mostrando o país de origem e o total de pessoas nascidas lá. só nos interessam os países que tiverem mais de 3 pessoas com essa nascionalidade.</a></p> 
            <p><a href="desafio13.php" target="_blank">Uma lista agrupada pela altura das pessoas, mostrando quantas pessoas pesam mais de 100kg e que estão acima da média de altura de todos os cadastrados</a></p>                         
        </fieldset>
    </main>
</body>
</html>