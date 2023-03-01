-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28-Fev-2023 às 04:02
-- Versão do servidor: 10.5.16-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id18578468_bd_games`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `idcurso` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` text DEFAULT NULL,
  `carga` int(10) UNSIGNED DEFAULT NULL,
  `totaulas` int(10) UNSIGNED DEFAULT NULL,
  `ano` year(4) DEFAULT 2016
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`idcurso`, `nome`, `descricao`, `carga`, `totaulas`, `ano`) VALUES
(1, 'HTML5', 'Curso de HTML5', 40, 37, 2014),
(2, 'Algoritmos', 'Lógica de Programação', 20, 15, 2014),
(3, 'Photoshop5', 'Dicas de Photoshop CC', 10, 8, 2014),
(4, 'PHP', 'Curso de PHP para iniciantes', 40, 20, 2015),
(5, 'Java', 'Introdução à Linguagem Java', 40, 29, 2015),
(6, 'MySQL', 'Bancos de Dados MySQL', 30, 15, 2016),
(7, 'Word', 'Curso completo de Word', 40, 30, 2016),
(8, 'Python', 'Curso de Python', 40, 18, 2017),
(9, 'POO', 'Curso de Programação Orientada a Objetos', 60, 35, 2016),
(10, 'Excel', 'Curso completo de Excel', 40, 30, 2017),
(11, 'Responsividade', 'Curso de Responsividade', 30, 15, 2018),
(12, 'C++', 'Curso de C++ com Orientação a Objetos', 40, 25, 2017),
(13, 'C#', 'Curso de C#', 30, 12, 2017),
(14, 'Android', 'Curso de Desenvolvimento de Aplicativos para Android', 60, 30, 2018),
(15, 'JavaScript', 'Curso de JavaScript', 35, 18, 2017),
(16, 'PowerPoint', 'Curso completo de PowerPoint', 30, 12, 2018),
(17, 'Swift', 'Curso de Desenvolvimento de Aplicativos para iOS', 60, 30, 2019),
(18, 'Hardware', 'Curso de Montagem e Manutenção de PCs', 30, 12, 2017),
(19, 'Redes', 'Curso de Redes para Iniciantes', 40, 15, 2016),
(20, 'Segurança', 'Curso de Segurança', 15, 8, 2018),
(21, 'SEO', 'Curso de Otimização de Sites', 30, 12, 2017),
(22, 'Premiere', 'Curso de Edição de Vídeos com Premiere', 20, 10, 2017),
(23, 'After Effects', 'Curso de Efeitos em Vídeos com After Effects', 20, 10, 2018),
(24, 'WordPress', 'Curso de Criação de Sites com WordPress', 60, 30, 2019),
(25, 'Joomla', 'Curso de Criação de Sites com Joomla', 60, 30, 2019),
(26, 'Magento', 'Curso de Criação de Lojas Virtuais com Magento', 50, 25, 2019),
(27, 'Modelagem de Dados', 'Curso de Modelagem de Dados', 30, 12, 2020),
(28, 'HTML4', 'Curso Básico de HTML, versão 4.0', 20, 9, 2010),
(29, 'PHP7', 'Curso de PHP, versão 7.0', 40, 20, 2020),
(30, 'PHP4', 'Curso de PHP, versão 4.0', 30, 11, 2010);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `cod` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`cod`, `genero`) VALUES
(1, 'Ação'),
(2, 'Aventura'),
(3, 'Terror'),
(4, 'Plataforma'),
(5, 'Estrategia'),
(6, 'RPG'),
(7, 'Esporte'),
(8, 'Corrida'),
(9, 'Tabuleiro'),
(10, 'Puzzle'),
(11, 'Luta'),
(12, 'Musical');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `cod` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `genero` int(11) NOT NULL,
  `produtora` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `nota` decimal(4,2) NOT NULL,
  `capa` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`cod`, `nome`, `genero`, `produtora`, `descricao`, `nota`, `capa`) VALUES
(1, 'Mario Odissey', 2, 3, 'Em Super Mario Odyssey, o jogador joga como Mario em suas aventuras por terras além do Reino dos Cogumelos com o auxílio de um novo personagem introduzido no jogo, o Cappy. Esse \"chapéu vivo\" garante um novo acréscimo à dificuldade e a dinâmica já vista nos jogos anteriores, pois além de ser uma forma de ataque além do seu tradicional pulo, ele dá também a habilidade de \"capturar\" os carismáticos inimigos da série e alguns objetos. A nova mecânica funciona da seguinte maneira: ao chacoalhar os Joy-Cons ou apertar um simples botão, Cappy é arremessado e volta para a cabeça de Mario automaticamente, apenas se não encostar em algo que ele possa interagir. Há também vários outros simples movimentos com os Joy-Cons que fazem o chapéu rodear o cenário de maneiras diferentes, sendo útil de várias maneiras, como por exemplo a possibilidade de coletar moedas eliminar inimigos ao seu redor com mais rapidez. As mecânicas já vistas anteriormente como o \"Ground Pound\" e o \"Wall Jump\" também estão presentes no game.', 9.50, 'mario.png'),
(2, 'Call of Dutty: Black Ops', 1, 5, 'Call of Duty: Black Ops é um jogo eletrônico de tiro em primeira pessoa desenvolvido pela Treyarch, publicado pela Activision e lançado mundialmente em 9 de novembro de 2010 para as plataformas Microsoft Windows, Xbox 360, PlayStation 3, Wii e Nintendo DS. Anunciado em 30 de abril de 2010, o jogo é o sétimo capítulo da série Call of Duty, e o primeiro situado durante a Guerra Fria. É o terceiro da série a ser desenvolvido pela Treyarch, sendo uma sequência direta de Call of Duty: World at War.\r\n\r\nNas primeiras 24 horas de lançamento, o jogo vendeu mais de 5,6 milhões de unidades, sendo 4,2 milhões nos Estados Unidos e 1,4 milhão no Reino Unido, batendo o recorde alcançado por seu antecessor, Modern Warfare 2, em aproximadamente 2,3 milhões de cópias. A 1 de maio de 2012 foi revelado a sequência Call of Duty: Black Ops II com lançamento para novembro de 2012.', 3.50, 'cod.png'),
(3, 'League of Legends', 1, 2, 'League of Legends abreviado como LoL é um jogo eletrônico do gênero multiplayer online battle arena, desenvolvido e publicado pela Riot Games para Microsoft Windows e Mac OS X. É um jogo gratuito para jogar e inspirado no modo Defense of the Ancients de Warcraft III: The Frozen Throne.\r\n\r\nEm League of Legends, os jogadores assumem o papel de \"invocadores\", controlando campeões com habilidades únicas e que lutam com seu time contra outros invocadores ou campeões controlados pelo computador. No modo mais popular do jogo, o objetivo de cada time é destruir o nexus da equipe adversária, uma construção localizada na base e protegida por outras estruturas. Cada jogo de League of Legends é distinto, pois os campeões sempre começam fracos e progridem através da acumulação de ouro e da experiência ao longo da partida.', 8.50, 'lol.png'),
(4, 'Donkey Kong Tropical Freeze', 2, 3, 'Donkey Kong Country: Tropical Freeze é um jogo eletrônico de plataforma side-scrolling desenvolvido pela Retro Studios que foi publicado pela Nintendo para o Wii U em 21 de fevereiro de 2014 nos Estados Unidos. O décimo-sétimo jogo da série, e o primeiro em alta definição, segue o jogo de 2010 Donkey Kong Country Returns, também pela Retro Studios. Foi anunciado durante a pre-conferência E3 2013 da Nintendo em 11 de junho de 2013.A historia do jogo foca num grupo de criaturas viking, como morsas, corujas e pinguins, que invadem a Donkey Kong Island, forçando o protagonista Donkey Kong lutar contra eles com a ajuda de seus amigos Diddy Kong e Dixie Kong, a última fazendo sua primeira aparição na série desde Donkey Kong Country 3: Dixie Kongs Double Trouble, lançado em 1996. Até mesmo o velho Cranky Kong entrou para a aventura.', 8.00, 'donkey.png'),
(5, 'Sonic the Hedgehog', 2, 7, 'Sonic the Hedgehog é uma franquia de videogames criada e produzida pela Sega. A franquia é centrada em uma série de jogos de plataforma focados em velocidade. O protagonizada da série é um ouriço azul chamado Sonic, cuja vida pacífica é sempre interrompida pelo antagonista principal da série, Dr. Eggman. Tipicamente Sonic -normalmente junto de um de seus amigos, como Tails, Amy e Knuckles- se aventuram para parar Eggman e seus planos para dominação mundial. O primeiro jogo da série, lançado em 1991, foi concebido pela divisão da Sega, Sonic Team após um pedido para um novo mascote. O título foi um sucesso, e foi renovado para várias sequelas, que levaram a Sega a liderança no rumo dos consoles de vídeogame da era 16-bit do começo até a metade dos anos 90.', 8.50, 'sonic.png'),
(6, 'God of War', 1, 4, 'God of War é uma série de jogos eletrônicos de ação-aventura vagamente baseada na mitologia grega criada por David Jaffe. Iniciada em 2005, a série tornou-se carro-chefe para a marca PlayStation, que consiste em sete jogos em várias plataformas. Um oitavo título está em desenvolvimento; será uma reinicialização suave para a série e será baseada na mitologia nórdica. A história centra-se em torno de sua personagem jogável, Kratos, um guerreiro espartano enganado para matar sua esposa e filha por seu antigo mestre, o deus da guerra Ares. Kratos mata Ares a mando da deusa Atena e toma seu lugar como o novo deus da guerra, mas ainda é assombrado por pesadelos de seu passado. Revelado ser um semideus e filho de Zeus, o rei dos deuses do Olimpo, que trai Kratos. O espartano em seguida busca vingança contra os deuses para suas maquinações. O que se segue é uma série de tentativas de libertar-se da influência dos deuses e dos titãs e vingança. Cada jogo faz parte de uma saga com vingança como motivo central.', 9.50, 'gow.png'),
(7, 'Counter-Strike', 1, 11, 'Counter-Strike (também abreviado por CS) é um popular jogo eletrônico de tiro em primeira pessoa. Inicialmente criado como um \"mod\" de Half-Life para jogos online, foi desenvolvido por Minh Le e Jess Cliffe e depois adquirido pela Valve Corporation. Foi lançado em 1999, porém em 2000 ele começou a ser comercializado oficialmente, e posteriormente foram feitas versões para Xbox, Mac OS X e Linux. Atualmente o game é jogado na versão Counter-Strike: Global Offensive.O jogo é baseado em rodadas nas quais equipes de contra-terroristas e terroristas combatem-se até a eliminação completa de um dos times, e tem como objetivo principal plantar e desarmar bombas, ou sequestrar e salvar reféns.\r\n\r\nO Counter-Strike foi um dos responsáveis pela massificação dos jogos por rede no início do século, sendo considerado o grande responsável pela popularização das LAN houses no mundo. O jogo é considerado o originador do \"esporte eletrônico\", onde muitos jogadores levam-no a sério e recebem salários fixos, existindo até clãs profissionais, e que são patrocinados por grandes empresas como a Intel e a NVIDIA. Pelo mundo existem ligas profissionais onde o Counter-Strike está presente, como o caso da CPL (que encerrou suas atividades em 2008), ESWC, ESL, WCG e WEG. No caso da ESWC funciona da seguinte forma: cada país tem as suas qualificações no qual qualquer clã pode ir a uma qualificação em uma lan house em qualquer parte do mesmo país, passando depois às melhores equipes, as melhores equipes de cada país encontram-se depois no complexo da ESWC, localizado em Paris, para disputar o lugar da melhor equipe do mundo de Counter-Strike.', 9.00, 'cs.png'),
(8, 'Resident Evil 6', 3, 14, 'Resident Evil 6, conhecido como Biohazard 6 no Japão, é um jogo de vídeo do gênero ação jogado em terceira pessoa desenvolvido e publicado pela Capcom. Apesar do nome é o nono jogo da série principal Resident Evil e foi lançado em 2 de outubro de 2012 para PlayStation 3 e Xbox 360. A versão para Microsoft Windows foi lançada no dia 22 de março de 2013. O game também ganhou uma versão para PlayStation 4 e Xbox One em 29 de março de 2016.\r\n\r\nA história é contada a partir das perspectivas de Chris Redfield, membro e fundador da BSAA traumatizado por ter falhado em uma missão; Leon S. Kennedy, um sobrevivente de Raccoon City e agente especial do governo; Jake Muller, filho ilegítimo de Albert Wesker e associado de Sherry Birkin; e Ada Wong, uma agente solitária com ligações aos ataques bio-terroristas pela Neo-Umbrella.\r\n\r\nO conceito do jogo começou em 2009, mas começou a ser produzido no ano seguinte sobre a supervisão de Hiroyuki Kobayashi, que já tinha produzido Resident Evil 4. A equipe de produção acabou por crescer e tornou-se na maior de sempre a trabalhar num jogo da série Resident Evil. Resident Evil 6 foi apresentado durante uma campanha de divulgação viral na página NoHopeLeft.com.', 7.50, 'resident.png'),
(9, 'Grand Theft Auto V', 2, 13, 'Grand Theft Auto V é um jogo eletrônico de ação-aventura desenvolvido pela Rockstar North e publicado pela Rockstar Games. É o sétimo título principal da série Grand Theft Auto e foi lançado originalmente em 17 de setembro de 2013 para PlayStation 3 e Xbox 360, com remasterizações lançadas em 18 de novembro de 2014 para PlayStation 4 e Xbox One, e em 14 de abril de 2015 para Microsoft Windows. O jogo se passa no estado ficcional de San Andreas, com a história da campanha um jogador seguindo três criminosos e seus esforços para realizarem assaltos sob a pressão de uma agência governamental. O mundo aberto permite que os jogadores naveguem livremente pelas áreas rurais e urbanas de San Andreas.\r\n\r\nA jogabilidade é mostrada em uma perspectiva de terceira pessoa e o mundo pode ser atravessado a pé ou com veículos. Os jogadores controlam três protagonistas e podem alternar entre eles durante e fora das missões. A história é centrada em sequências de assaltos, com muitas missões envolvendo a jogabilidade de tiro e direção. Um sistema de \"procurado\" define a resposta e agressividade das forças da lei contra os crimes cometidos pelo jogador. O modo multijogador, Grand Theft Auto Online, permite que até trinta jogadores explorem o mundo e entrem em partidas competitivas ou cooperativas.', 9.50, 'gta.png'),
(10, 'Metal Gear Solid V', 6, 9, 'Metal Gear Solid V: The Phantom Pain é um jogo eletrônico de ação-aventura furtiva com elementos de RPG, produzido pela Kojima Productions e realizado, desenhado, co-produzido e co-escrito por Hideo Kojima. Foi publicado pela Konami para Microsoft Windows, PlayStation 3, PlayStation 4, Xbox 360 e Xbox One a 1 de Setembro de 2015. The Phantom Pain é o oitavo título canónico na série Metal Gear e o sexto dentro da sua cronologia fictícia. O jogo serve como continuação para Metal Gear Solid V: Ground Zeroes, mas a sua história é anterior aos eventos ocorridos no jogo original Metal Gear original. Contém o mesmo subtítulo, Tactical Espionage Operations, usado pela primeira vez em Metal Gear Solid: Peace Walker. A ação acontece em 1984, nove anos depois de Ground Zeroes, e segue o mercenário Punished \"Venom\" Snake, à medida que este se aventura em África (no decorrer da Guerra Civil Angolana, na fronteira Angola-Zaire) e no Afeganistão durante a Guerra Soviética-Afegã, para procurar vingança sobre as pessoas que destruíram as suas forças e que quase o mataram durante os eventos ocorridos em Ground Zeroes.', 8.50, 'metal.png'),
(11, 'Assassins Creed III', 1, 10, 'Assassins Creed III é um jogo de ação-aventura produzido pela Ubisoft e publicado pela Ubisoft durante os meses de Outubro e Novembro de 2012 para Wii U, Xbox 360, PlayStation 3 e Microsoft Windows . É o quinto jogo principal da série Assassins Creed e o seu terceiro título numerado. Assassins Creed III é a continuação direta de Assassins Creed: Revelations de 2011.\r\n\r\nO enredo decorre de uma história fictícia dentro de eventos reais e segue a batalha ancestral entre os Assassinos, que lutam pela liberdade, e os Templários, que desejam controlar a humanidade. A trama se desenrola no século XXI onde Desmond Miles, o protagonista da série, com a ajuda de uma máquina conhecida como Animus, revive as memórias dos seus ancestrais para o ajudar a descobrir uma maneira de prevenir o Apocalipse de 2012. A história principal se desenrola antes, durante e depois da Revolução Americana entre 1765 e 1783 e segue o ancestral de Desmond, de ascendência mohawk e inglesa, Ratonhnhaké:ton,também conhecido como Connor, enquanto ele luta contra as tentativas dos Templários de controlar a nova nação.', 7.50, 'assassin.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `profissao` varchar(20) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `altura` decimal(3,2) DEFAULT NULL,
  `nacionalidade` varchar(20) DEFAULT 'Brasil',
  `cursopreferido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `profissao`, `nascimento`, `sexo`, `peso`, `altura`, `nacionalidade`, `cursopreferido`) VALUES
(1, 'Daniel Morais', 'Auxiliar Administrat', '1984-01-02', 'M', 78.50, 1.83, 'Brasil', 4),
(2, 'Talita Nascimento', 'Farmacêutico', '1999-12-30', 'F', 55.20, 1.65, 'Portugal', 7),
(3, 'Emerson Gabriel', 'Programador', '1920-12-30', 'M', 50.20, 1.65, 'Moçambique', 4),
(4, 'Lucas Damasceno', 'Auxiliar Administrat', '1930-11-02', 'M', 63.20, 1.75, 'Irlanda', 9),
(5, 'Leila Martins', 'Farmacêutico', '1975-04-22', 'F', 99.00, 2.15, 'Brasil', 30),
(6, 'Letícia Neves', 'Programador', '1999-12-03', 'F', 87.00, 2.00, 'Brasil', 5),
(7, 'Janaína Couto', 'Auxiliar Administrat', '1987-11-12', 'F', 75.40, 1.66, 'EUA', 3),
(8, 'Carlisson Rosa', 'Professor', '2010-08-01', 'M', 78.22, 1.98, 'Brasil', 26),
(9, 'Jackson Telles', 'Programador', '1999-01-23', 'M', 55.75, 1.33, 'Portugal', 4),
(10, 'Danilo Araujo', 'Dentista', '1975-12-10', 'M', 99.21, 1.87, 'EUA', 28),
(11, 'Andreia Delfino', 'Auxiliar Administrat', '1975-07-01', 'F', 48.64, 1.54, 'Irlanda', 30),
(12, 'Valter Vilmerson', 'Ator', '1985-10-12', 'M', 88.55, 2.03, 'Brasil', 4),
(13, 'Allan Silva', 'Programador', '1993-11-11', 'M', 76.99, 1.55, 'Brasil', 1),
(14, 'Rosana Kunz', 'Professor', '1935-01-16', 'F', 55.24, 1.87, 'Brasil', 6),
(15, 'Josiane Dutra', 'Empreendedor', '1950-01-20', 'F', 98.70, 1.04, 'Portugal', 7),
(16, 'Elvis Schwarz', 'Dentista', '2011-05-07', 'M', 66.69, 1.76, 'EUA', 22),
(17, 'Paulo Narley', 'Auxiliar Administrat', '1997-03-17', 'M', 120.10, 2.22, 'Brasil', 27),
(18, 'Joade Assis', 'Médico', '1930-12-01', 'M', 65.88, 1.78, 'França', 16),
(19, 'Nara Matos', 'Programador', '1978-03-17', 'F', 65.90, 1.33, 'Brasil', 3),
(20, 'Marcos Dissotti', 'Empreendedor', '2010-01-01', 'M', 53.79, 1.54, 'Portugal', 24),
(21, 'Ana Carolina Mendes', 'Ator', '2000-12-15', 'F', 88.30, 1.54, 'Brasil', 23),
(22, 'Guilherme de Sousa', 'Dentista', '2001-05-18', 'M', 132.70, 1.97, 'Moçambique', 8),
(23, 'Bruno Torres', 'Auxiliar Administrat', '2000-01-30', 'M', 44.65, 1.65, 'Brasil', 14),
(24, 'Yuji Homa', 'Empreendedor', '1996-12-25', 'M', 33.90, 1.22, 'Japão', 18),
(25, 'Raian Porto', 'Programador', '1989-05-05', 'M', 54.89, 1.54, 'Brasil', 15),
(26, 'Paulo Batista', 'Ator', '1999-03-15', 'M', 110.12, 1.87, 'Portugal', 4),
(27, 'Monique Precivalli', 'Auxiliar Administrat', '2013-12-30', 'F', 48.20, 1.22, 'Brasil', 3),
(28, 'Herisson Silva', 'Auxiliar Administrat', '1965-10-10', 'M', 74.65, 1.56, 'EUA', 12),
(29, 'Tiago Ulisses', 'Dentista', '1993-04-22', 'M', 150.30, 2.35, 'Brasil', 27),
(30, 'Anderson Rafael', 'Programador', '1989-12-01', 'M', 64.22, 1.44, 'Irlanda', 24),
(31, 'Karine Ribeiro', 'Empreendedor', '1988-10-01', 'F', 42.10, 1.65, 'Brasil', 20),
(32, 'Roberto Luiz Debarba', 'Ator', '2007-01-09', 'M', 77.44, 1.56, 'Brasil', 10),
(33, 'Jarismar Andrade', 'Dentista', '2000-06-23', 'F', 63.70, 1.33, 'Brasil', 2),
(34, 'Janaina Oliveira', 'Professor', '1955-03-12', 'F', 52.90, 1.76, 'Canadá', 26),
(35, 'Márcio Mello', 'Programador', '2011-11-20', 'M', 54.11, 1.55, 'EUA', 20),
(36, 'Robson Rodolpho', 'Auxiliar Administrat', '2000-08-08', 'M', 110.10, 1.76, 'Brasil', 1),
(37, 'Daniele Moledo', 'Empreendedor', '2006-08-11', 'F', 101.30, 1.99, 'Brasil', 5),
(38, 'Neto Sophiate', 'Ator', '1996-05-17', 'M', 59.28, 1.65, 'Portugal', 4),
(39, 'Neriton Dias', 'Auxiliar Administrat', '2009-10-30', 'M', 48.99, 1.29, 'Brasil', 11),
(40, 'André Schmidt', 'Programador', '1993-07-26', 'M', 55.37, 1.22, 'Angola', 19),
(41, 'Isaias Buscarino', 'Dentista', '2001-01-07', 'M', 99.90, 1.55, 'Moçambique', 16),
(42, 'Rafael Guimma', 'Empreendedor', '1968-04-11', 'M', 88.88, 1.54, 'Brasil', 3),
(43, 'Ana Carolina Hernandes', 'Ator', '1970-10-11', 'F', 65.40, 2.08, 'EUA', 4),
(44, 'Luiz Paulo', 'Professor', '1984-11-01', 'M', 75.12, 1.38, 'Portugal', 28),
(45, 'Bruna Teles', 'Programador', '1980-11-07', 'F', 55.10, 1.86, 'Brasil', 24),
(46, 'Diogo Padilha', 'Auxiliar Administrat', '2000-03-03', 'M', 54.34, 1.88, 'Angola', 25),
(47, 'Bruno Miltersteiner', 'Dentista', '1986-02-19', 'M', 77.45, 1.65, 'Alemanha', 6),
(48, 'Elaine Nunes', 'Programador', '1998-08-15', 'F', 35.90, 2.00, 'Canadá', 5),
(49, 'Silvio Ricardo', 'Programador', '2012-03-12', 'M', 65.99, 1.23, 'EUA', 26),
(50, 'Denilson Barbosa da Silva', 'Empreendedor', '2000-01-08', 'M', 97.30, 2.00, 'Brasil', 22),
(51, 'Jucinei Teixeira', 'Professor', '1977-11-22', 'F', 44.80, 1.76, 'Portugal', 30),
(52, 'Bruna Santos', 'Auxiliar Administrat', '1991-12-01', 'F', 76.30, 1.45, 'Canadá', 26),
(53, 'André Vitebo', 'Médico', '1970-07-01', 'M', 44.11, 1.55, 'Brasil', 12),
(54, 'Andre Santini', 'Programador', '1991-08-15', 'M', 66.00, 1.76, 'Itália', 10),
(55, 'Ruan Valente', 'Programador', '1998-03-19', 'M', 101.90, 1.76, 'Canadá', 16),
(56, 'Nailton Mauricio', 'Médico', '1992-04-25', 'M', 86.01, 1.43, 'EUA', 4),
(57, 'Rita Pontes', 'Professor', '1999-09-02', 'F', 54.10, 1.35, 'Angola', 5),
(58, 'Carlos Camargo', 'Programador', '2005-02-22', 'M', 124.65, 1.33, 'Brasil', 3),
(59, 'Philppe Oliveira', 'Auxiliar Administrat', '2000-05-23', 'M', 105.10, 2.19, 'Brasil', 2),
(60, 'Dayana Dias', 'Professor', '1993-05-30', 'F', 88.30, 1.66, 'Angola', 1),
(61, 'Silvana Albuquerque', 'Programador', '1999-05-22', 'F', 56.00, 1.50, 'Brasil', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtoras`
--

CREATE TABLE `produtoras` (
  `cod` int(11) NOT NULL,
  `produtora` varchar(20) NOT NULL,
  `pais` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtoras`
--

INSERT INTO `produtoras` (`cod`, `produtora`, `pais`) VALUES
(1, 'Microsoft', 'EUA'),
(2, 'Tencent', 'China'),
(3, 'Nintendo', 'Japão'),
(4, 'Sony', 'Japão'),
(5, 'Activision', 'EUA'),
(6, 'EA', 'EUA'),
(7, 'Sega', 'Japão'),
(8, 'Nanco Bandai', 'Japão'),
(9, 'Konami', 'Japão'),
(10, 'Ubisoft', 'EUA'),
(11, 'Valve', 'EUA'),
(12, 'Square Enix', 'Japão'),
(13, 'Take Two', 'EUA'),
(14, 'Capcon', 'Japão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(10) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT 'editor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nome`, `senha`, `tipo`) VALUES
('admin', 'Gustavo Guanabara', '$2y$10$3zmwaJF7gWfNez9BzzDhKOiGENjVLDJfegcrX/4..XYlWZ8CnwB9.', 'admin'),
('clovis', 'Clóvis Balreira Rodrigues', '$2y$10$mBkKumWfiJTPLSZwbkR1CO3oO1pN4gVwc70QQWgcZJSf0mo/.kNiG', 'editor'),
('teste', 'João da Silva', '$2y$10$4IWDoFoqM4bfC6bUGoyl2O0KjuFQaWKu10BWah1H9pjU3hZhEQJS2', 'editor');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcurso`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `genero` (`genero`),
  ADD KEY `produtora` (`produtora`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursopreferido` (`cursopreferido`);

--
-- Índices para tabela `produtoras`
--
ALTER TABLE `produtoras`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `jogos_ibfk_1` FOREIGN KEY (`genero`) REFERENCES `generos` (`cod`),
  ADD CONSTRAINT `jogos_ibfk_2` FOREIGN KEY (`produtora`) REFERENCES `produtoras` (`cod`);

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `pessoas_ibfk_1` FOREIGN KEY (`cursopreferido`) REFERENCES `cursos` (`idcurso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
