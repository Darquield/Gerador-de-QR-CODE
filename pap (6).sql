-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jan-2024 às 13:01
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `apostas`
--

CREATE TABLE `apostas` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `piloto_escolhido` varchar(255) NOT NULL,
  `data_aposta` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_utilizador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `apostas`
--

INSERT INTO `apostas` (`id`, `nome_usuario`, `piloto_escolhido`, `data_aposta`, `id_utilizador`) VALUES
(10, 'Ronnie Coleman', 'Lewis Hamilton', '2023-12-20 17:34:43', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipas`
--

CREATE TABLE `equipas` (
  `id_equipas` int(11) NOT NULL,
  `nome` text DEFAULT NULL,
  `data_criada` text DEFAULT NULL,
  `mail` text DEFAULT NULL,
  `descricao` longtext NOT NULL,
  `piloto_principal` int(11) NOT NULL,
  `piloto_secundario` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `equipas`
--

INSERT INTO `equipas` (`id_equipas`, `nome`, `data_criada`, `mail`, `descricao`, `piloto_principal`, `piloto_secundario`, `foto`) VALUES
(7, 'RedbullRacing', '1942-09-22', 'redbullracing@gmail.com', 'A Red Bull Racing, popularmente conhecida como Red Bull ou pela sua abreviação RBR e atualmente competindo como Oracle Red Bull Racing, é uma equipe de automobilismo baseada no Reino Unido que compete no Campeonato Mundial de Fórmula 1 sob uma licença austríaca', 25, 29, 'Rb.jpg'),
(8, 'Mercedes-AMG Petronas Motorsport', '2010-06-14', 'mercedesamg@gmail.com', 'A equipe Mercedes-Benz na Fórmula 1, conhecida como Mercedes-AMG Petronas Formula One Team, foi originalmente formada como Brawn GP em 2009. A Brawn GP foi fundada por Ross Brawn, que comprou os ativos da equipe Honda Racing, após a retirada da Honda do esporte no final de 2008.\r\n\r\nA equipe Brawn GP teve um sucesso imediato em sua única temporada, com Jenson Button conquistando o Campeonato Mundial de Pilotos e a equipe garantindo o Campeonato Mundial de Construtores em 2009. Em 2010, a equipe foi adquirida pela Mercedes-Benz e renomeada como Mercedes GP Petronas Formula One Team.\r\n\r\nPortanto, a equipe Mercedes F1, em sua encarnação atual, foi oficialmente estabelecida em 2010 após a aquisição da Brawn GP. Desde então, a equipe Mercedes tem sido uma força dominante na Fórmula 1, conquistando vários campeonatos de pilotos e construtores.', 19, 20, 'MR.jpg'),
(9, 'Scuderia Ferrari', '1929-02-18', 'scuderiaferrari@gmail.com', 'A Scuderia Ferrari, a equipe de corrida da Ferrari na Fórmula 1, foi fundada por Enzo Ferrari. A equipe foi estabelecida em 1929, embora os primeiros anos tenham sido dedicados principalmente à participação em corridas de carros esportivos e não especificamente na Fórmula 1, que só foi formalmente estabelecida em 1950.\r\n\r\nA Ferrari é a equipe mais antiga em atividade contínua na Fórmula 1 desde a primeira temporada do campeonato em 1950. Ao longo de sua história, a Scuderia Ferrari se tornou uma das equipes mais bem-sucedidas e icônicas da Fórmula 1, conquistando inúmeros campeonatos de pilotos e construtores.', 34, 35, 'ff.jpg'),
(10, 'Mclaren', '1963-09-02', 'MCLAREN@GMAIL.COM', 'A McLaren Racing Limited, competindo como McLaren F1 Team, é uma equipe de automobilismo, mais conhecida por competir na Fórmula 1, com sede na cidade de Woking, Reino Unido. É uma das equipes de maior sucesso na categoria, tendo conquistado 8 títulos mundiais de construtores e 12 títulos mundiais de pilotos.A McLaren é reconhecida como uma das equipes mais icônicas e bem-sucedidas da Fórmula 1, desempenhando um papel significativo no desenvolvimento e na história do esporte.', 38, 40, 'ML.png'),
(11, 'Aston Martin Aramco Cognizant Formula One Team.', '2018-08-01', 'astonmartin@gmail.com', 'A Aston Martin está atualmente envolvida na Fórmula 1 como equipe e construtor sob o nome Aston Martin Aramco Cognizant Formula One Team. A equipe está sediada em Silverstone, Reino Unido. A história da Aston Martin na Fórmula 1 remonta às temporadas de 1959 e 1960, quando a marca competiu como construtor, fornecendo carros para a equipe da David Brown Corporation. No entanto, a fabricante se retirou sem marcar pontos.\r\n\r\nA Aston Martin retornou à Fórmula 1 na temporada de 2018 como patrocinador título da equipe Red Bull Racing. Em 31 de janeiro de 2020, foi confirmado que a Aston Martin retornaria à Fórmula 1 como construtor e equipe em 2021, quando a equipe Racing Point foi rebatizada para Aston Martin. Essa mudança de nome ocorreu devido ao coproprietário da equipe, Lawrence Stroll, tornar-se acionista da fabricante britânica de carros de luxo.', 44, 45, 'astom.jpg'),
(12, 'Alpine Renault', '1955-03-10', 'requests@alpinef1.com', 'A Alpine é uma marca de automóveis esportivos e de competição, fundada em 1955, inicialmente como uma divisão da Renault. A equipe de Fórmula 1 conhecida como Alpine F1 Team tem suas raízes na equipe Renault, que ingressou na Fórmula 1 na década de 1970.\r\n\r\nA equipe Renault conquistou sucesso na Fórmula 1, vencendo campeonatos mundiais de pilotos e construtores. Em 2021, a equipe foi renomeada como Alpine F1 Team, refletindo a marca de automóveis esportivos da Renault.\r\n\r\nO nome \"Alpine\" tem uma história distinta, associada a carros esportivos e de competição fabricados pela Alpine, e a entrada na Fórmula 1 sob essa marca é parte do compromisso da Renault em promover a marca Alpine.', 37, 36, 'alp.jpg'),
(13, 'Williams Racing', '1977-04-10', 'wiliamsracing@gmail.com', 'A Williams Racing é uma equipe e construtora de Fórmula 1 fundada por Frank Williams e Patrick Head em 1977. Após experiências anteriores malsucedidas, a equipe começou a fabricar seus próprios carros em 1978. Ao longo dos anos, a Williams conquistou nove títulos de construtores entre 1980 e 1997. A vitória de Clay Regazzoni no Grande Prêmio da Grã-Bretanha de 1979 marcou o início bem-sucedido da equipe.\r\n\r\nEm 2020, a Williams foi adquirida pela Dorilton Capital, um grupo de investimento privado dos Estados Unidos, encerrando décadas de propriedade pela família Williams. A equipe possui interesses comerciais além da Fórmula 1, com divisões como a Williams Advanced Engineering e a Williams Hybrid Power. A história da Williams na Fórmula 1 destaca-se como uma das mais notáveis, contribuindo significativamente para o esporte ao longo dos anos.', 54, 53, 'w.jpg'),
(14, 'Scuderia AlphaTauri', '2005-08-01', 'scuderiaalphaTauri@gmail.com', 'A Scuderia AlphaTauri é uma equipe de Fórmula 1 sediada em Faenza, Itália. Originalmente conhecida como Scuderia Toro Rosso, a equipe foi fundada em 2006 como a equipe júnior da Red Bull Racing. Seu objetivo principal era desenvolver jovens talentos da academia de pilotos da Red Bull.\r\n\r\nA primeira vitória da equipe veio em 2008, no Grande Prêmio da Itália, com Sebastian Vettel ao volante. Em 2020, a equipe passou por uma mudança de nome para Scuderia AlphaTauri, refletindo a marca de moda AlphaTauri, que pertence à Red Bull. Essa mudança acompanhou o bom desempenho da equipe e sua evolução ao longo dos anos.\r\n\r\nA Scuderia AlphaTauri continua a desempenhar um papel importante no desenvolvimento de jovens pilotos, fornecendo uma plataforma para talentos emergentes na Fórmula 1.', 50, 52, 'alfa.jpg'),
(15, 'Alfa Romeo F1 Team Stake', '1985-02-12', 'alfaromeoteamstake@gmail.com', 'A Alfa Romeo Racing Orlen é a equipe que representa a Alfa Romeo na Fórmula 1, sendo operada pela Sauber Motorsport AG. Para obter as informações mais recentes sobre participações acionárias específicas, recomendo verificar fontes de notícias confiáveis, comunicados de imprensa oficiais da equipe e relatórios financeiros. Essas fontes devem fornecer os detalhes mais recentes sobre a estrutura acionária da equipe Alfa Romeo na Fórmula 1.', 42, 41, 'alfa.png'),
(16, 'Haas', '2014-02-02', 'haas@gmail.com', '\r\nA Haas F1 Team, atualmente competindo como MoneyGram Haas F1 Team, foi estabelecida por Gene Haas em abril de 2014, com a intenção inicial de estrear na Fórmula 1 na temporada de 2015. No entanto, a equipe optou por adiar sua entrada e fez sua estreia na categoria em 2016.Na estreia em 2016, a equipe conquistou pontos em sua primeira corrida com Romain Grosjean terminando em sexto no Grande Prêmio da Austrália.', 46, 49, 'haas.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipa_premio`
--

CREATE TABLE `equipa_premio` (
  `id_equipas` int(11) NOT NULL,
  `id_premio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `equipa_premio`
--

INSERT INTO `equipa_premio` (`id_equipas`, `id_premio`) VALUES
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(7, 12),
(7, 13),
(7, 14),
(7, 15),
(7, 17),
(7, 18),
(7, 19),
(7, 20),
(7, 21),
(7, 22),
(7, 23),
(9, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `idnoticia` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_publicacao` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `titulo`, `descricao`, `data_publicacao`, `foto`) VALUES
(10, 'Oracle Red Bull Racing ', ' 13ª vitória de Max Verstappen na temporada de 2023 no Grande Prêmio do Japão serviu para dar à sua equipe Oracle Red Bull Racing o título do Mundial de Construtores da Fórmula 1 mais rápido de todos os tempos na história da categoria.', '2024-01-05', 'hexa.jpg'),
(11, 'Max Verstappen ', 'É campeão! Na tarde deste sábado (7), Max Verstappen conquistou o título da Fórmula 1 de 2023. Após terminar a corrida sprint do GP do Qatar em segundo, ele faturou o tricampeonato da modalidade.\n\nAntes mesmo do final da prova ele já havia garantido o título. Com o abandono de Sergio Pérez, seu parceiro na Red Bull, após acidente com Esteban Ocon, o holandês não poderia mais ser alcançado no campeonato.\n\n\n\nO holandês entrou no final de semana com 400 pontos, com 13 vitórias em 16 corridas disputadas. Segundo colocado, Pérez somava 223 pontos. Assim, Verstappen precisava apenas de três pontos para ser campeão. Com o acidente do mexicano, não foi necessário.\n\nÉ o terceiro título consecutivo do piloto', '2023-10-07', 'bica.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pilotos`
--

CREATE TABLE `pilotos` (
  `id_pilotos` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `equipe` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bandeira` varchar(255) NOT NULL,
  `nacionalidade` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pilotos`
--

INSERT INTO `pilotos` (`id_pilotos`, `nome`, `equipe`, `numero`, `bandeira`, `nacionalidade`, `imagem`, `descricao`) VALUES
(19, 'Lewis Hamilton', 'Mercedes', 44, 'ru.png', 'Inglesa', 'hamilton.jpeg', 'Lewis Hamilton é um renomado automobilista britânico, nascido em 7 de janeiro de 1985, em Stevenage. Ele é um dos pilotos mais bem-sucedidos na história da Fórmula 1, conquistando sete títulos mundiais nos anos de 2008, 2014, 2015, 2017, 2018, 2019 e 2020. Hamilton compete atualmente pela equipe Mercedes.\n\nHamilton, frequentemente comparado a grandes pilotos da Fórmula 1, tem Ayrton Senna como seu ídolo. Sua carreira começou na McLaren em 2007, onde ficou notável por seu desempenho impressionante, terminando em terceiro em sua estreia. Em 2008, tornou-se o campeão mais jovem da F1 na época, aos 23 anos, sendo também o primeiro campeão negro.\n\nAo longo dos anos, Hamilton competiu pela McLaren e, desde 2013, pela Mercedes-AMG.'),
(20, 'George Russel', 'Mercedes', 63, 'ru.png', 'Inglesa', 'russel.jpeg', 'George Russell é um talentoso piloto britânico de Fórmula 1 cuja carreira decolou na Mercedes-AMG Petronas em 2017. Destacou-se nos treinos da Force India em 2017 e, em 2018, tornou-se Piloto de Teste de Pneus da Pirelli, completando 123 voltas em um carro de F1 de 2018.\n\nRussell assinou com a Williams em 2019, enfrentando desafios devido ao desempenho inferior do carro. Em 2020, continuou na Williams, destacando-se em algumas corridas, mas sua verdadeira estrela brilhou quando substituiu Lewis Hamilton na Mercedes no Grande Prêmio de Sakhir, liderando antes de incidentes nos boxes o impedirem de vencer.\n\nA temporada de 2021 viu Russell permanecer na Williams, conquistando seus primeiros pontos e um pódio notável em Spa, na Bélgica. Em setembro de 2021, foi anunciada sua mudança para a Mercedes em 2022, onde conquistou sua primeira pole position e vitória no Grande Prêmio de São Paulo em 2022.\n\nA Mercedes renovou seu contrato até o final de 2025, consolidando seu papel ao lado de Lewis Hamilton.'),
(25, 'Max Vertappen', 'Redbull', 1, 'pb.png', 'Holandesa', 'MAX.jpeg', 'Max Verstappen é um piloto de automobilismo neerlandês nascido em 30 de setembro de 1997 em Hasselt, na Bélgica. Ele é conhecido por ser um dos talentos mais promissores e agressivos da Fórmula 1. Aqui está um resumo de sua carreira na F1 até o meu último conhecimento em janeiro de 2023:\r\n\r\nInício da Carreira:\r\n\r\nMax Verstappen fez sua estreia na Fórmula 1 em 2015, com a equipe Scuderia Toro Rosso (atual Scuderia AlphaTauri). Ele entrou para a história como o piloto mais jovem a competir na F1, com apenas 17 anos de idade.\r\nSucesso Imediato:\r\n\r\nEm sua primeira temporada, Verstappen impressionou a todos com sua habilidade e coragem. Ele conquistou sua primeira vitória no Grande Prêmio da Espanha de 2016, tornando-se o piloto mais jovem a vencer uma corrida na Fórmula 1.\r\nMudança para a Red Bull Racing:\r\n\r\nA performance excepcional de Verstappen chamou a atenção da equipe principal da Red Bull Racing, e ele foi promovido para a equipe durante a temporada de 2016.'),
(29, 'Sergio Pérez', 'Redbull', 11, 'mx.png', 'Mexicana', 'PEREZ.jpeg', 'Sergio Pérez, nascido em Guadalajara em 26 de janeiro de 1990, é um destacado piloto mexicano na Fórmula 1, atualmente na Red Bull Racing. Sua carreira inclui passagens pela Sauber, McLaren, Force India/Racing Point, antes de chegar à Red Bull.\r\n\r\nEm sua fase inicial com a Sauber, Pérez marcou pontos notáveis, alcançando seu primeiro pódio em 2012. Mudou-se para a McLaren em 2013, mas não teve um desempenho notável. Posteriormente, na Force India/Racing Point, destacou-se, conquistando seu primeiro pódio em 2014 e uma vitória em 2020.\r\n\r\nA entrada na Red Bull Racing em 2021 trouxe vitórias, incluindo notáveis conquistas em Mônaco (2022) e Las Vegas (2023). Seu estilo de pilotagem arrojado e estratégias inteligentes o conduziram a um respeitável vice-campeonato em 2023. Pérez é uma figura proeminente no automobilismo, consolidando sua posição como um dos melhores pilotos mexicanos na Fórmula 1.'),
(34, 'Charles Leclerc', 'Scuderia Ferrari', 16, 'jujuju.png', 'Monegasco', 'leclerc.jpeg', 'Charles Leclerc, nascido em Monte Carlo em 16 de outubro de 1997, é um piloto monegasco de Fórmula 1 que representa a equipe Ferrari. Sua trajetória inclui conquistas notáveis na GP3 Series e na Fórmula 2 da FIA, ambos em 2016 e 2017, respectivamente.\r\n\r\nLeclerc iniciou sua carreira no kart em 2005, acumulando títulos, e transitou para monopostos em 2014. Em 2017, ingressou na Ferrari Driver Academy e venceu a Fórmula 2.\r\n\r\nSua estreia na Fórmula 1 ocorreu em 2018 pela Sauber, conquistando destaque e pontos notáveis. Em 2019, ingressou na Ferrari, obtendo sua primeira vitória na Bélgica e repetindo o feito na Itália.\r\n\r\nApesar dos desafios em 2020, Leclerc destacou-se, assegurando seu lugar na Ferrari até 2024. Em 2021, enfrentou um novo colega, Carlos Sainz Jr., e alcançou pódios, incluindo um segundo lugar em Silverstone.\r\n\r\nA temporada de 2022 começou com vitórias e liderança para Leclerc, mas a Red Bull superou a Ferrari, resultando em Max Verstappen conquistando o título. Leclerc encerrou a temporada em Abu Dhabi em segundo lugar, consolidando seu esforço pelo vice-campeonato.'),
(35, 'Carlos Sainz Jr', 'Scuderia Ferrari', 16, 'es.png', 'Espanhola', 'sainz.jpeg', 'Carlos Sainz Jr., nascido em 1 de setembro de 1994, é um piloto espanhol de Fórmula 1 que teve uma carreira marcada por sua passagem por diversas equipes.\r\n\r\nEm novembro de 2014, Sainz foi anunciado como piloto da Toro Rosso para a temporada de 2015, formando a dupla mais jovem da Fórmula 1 na época. Sua estreia na categoria foi notável, e apesar de um acidente durante um treino livre na Rússia, ele se recuperou rapidamente para participar da corrida.\r\n\r\nEm 2017, Sainz transferiu-se para a Renault durante a temporada, substituindo Jolyon Palmer. No entanto, sua mudança para a equipe foi antecipada, e ele correu pelo time ainda em 2017. Com a saída de Fernando Alonso em 2018, Sainz foi escolhido como seu substituto na McLaren para a temporada de 2019.\r\n\r\nO piloto espanhol teve um desempenho notável na McLaren, conquistando seu primeiro pódio no Grande Prêmio do Brasil de 2019. Em 2020, esteve perto de sua primeira vitória na Fórmula 1 no Grande Prêmio da Itália, terminando em segundo lugar.'),
(36, 'Pierre Gasly', 'Alpine', 10, 'f.png', 'Francesa', 'gasly.jpeg', 'Pierre Gasly, piloto francês de Fórmula 1, fez sua estreia na categoria em 2017 pela equipe Toro Rosso, substituindo Daniil Kvyat. Sua ascensão começou a chamar a atenção em 2018, quando conquistou surpreendentes 12 pontos ao terminar em quarto lugar no Grande Prêmio do Barém.\n\nEm agosto de 2018, Gasly recebeu a notícia de que seria promovido para a equipe principal da Red Bull Racing, para a temporada de 2019, ao lado de Max Verstappen. No entanto, após dificuldades de desempenho, em agosto de 2019, a Red Bull decidiu devolvê-lo à equipe Toro Rosso (renomeada como AlphaTauri), trocando-o por Alexander Albon.\n\nGasly teve um momento crucial em sua carreira em setembro de 2020, ao conquistar sua primeira vitória na Fórmula 1 no Grande Prêmio da Itália, tornando-se também a primeira vitória da equipe AlphaTauri. Esse feito histórico marcou não apenas sua carreira, mas também a primeira vitória de um piloto francês desde 1996.\n\nEm outubro de 2022, foi confirmada sua mudança para a equipe Alpine, com um contrato de vários anos, encerrando assim sua passagem pela AlphaTauri. '),
(37, 'Esteban Ocon', 'Alpine', 31, 'f.png', 'Francesa', 'ocon.jpeg', 'Esteban Ocon, piloto francês de Fórmula 1, iniciou sua trajetória na categoria como piloto de testes da Lotus em 2014, participando do primeiro treino livre para o Grande Prêmio de Abu Dhabi. Sua performance destacada nesse treino e nos testes pós-corrida chamaram a atenção.\n\nEm 2015, Ocon atuou como piloto de testes da Force India, conduzindo o carro no teste pós-corrida em Barcelona. Em 2016, ele se tornou piloto de testes da Renault por empréstimo da Mercedes.\n\nA estreia de Ocon como piloto titular ocorreu em 2016 pela equipe Manor, substituindo Rio Haryanto. Posteriormente, ingressou na Force India em 2017 como companheiro de Sergio Pérez. Ocon conquistou seus primeiros pontos na F1 em 2017, terminando em décimo no Grande Prêmio da Austrália.\n\nEm 2018, no Grande Prêmio do Brasil, Ocon protagonizou um incidente com Max Verstappen, resultando em punições para ambos. Em 2019, foi anunciado que Ocon correria pela Renault a partir de 2020, substituindo Nico Hülkenberg e fazendo parceria com Daniel Ricciardo.\n\nO ponto alto da carreira de Ocon ocorreu em 2020, quando conquistou seu primeiro pódio no Grande Prêmio de Sakhir. '),
(38, 'Lando Norris', 'Mclaren', 4, 'ru.png', 'Inglesa', 'lando.jpeg', 'Lando Norris, nascido em Bristol em 13 de novembro de 1999, é um piloto britânico de Fórmula 1. Sua carreira na categoria começou com conquistas em diversas categorias de base, incluindo os títulos da Fórmula MSA, Toyota Racing Series, Fórmula Renault 2.0, Fórmula Renault Norte-Europeia e Campeonato Europeu de Fórmula 3 em anos consecutivos, sendo vice-campeão da Fórmula 2 em 2018.\r\n\r\nFora das pistas, Norris possui uma cidadania dupla britânica e belga, sendo educado na Millfield School e residindo em Mônaco desde 2022. Ele também está envolvido em iniciativas filantrópicas, como levantar fundos para o COVID-19 Solidarity Response Fund e fundar a equipe de esportes eletrônicos Team Quadrant.\r\n\r\nNa Fórmula 1, estreou pela McLaren em 2019, alcançando seus primeiros pontos no Grande Prêmio do Barém. Ao longo de sua carreira, destacou-se com um terceiro lugar no Grande Prêmio da Áustria de 2020, tornando-se o terceiro piloto mais jovem a subir ao pódio. Em 2021, conquistou sua primeira pole position na Rússia e esteve próximo da vitória no Grande Prêmio do Brasil, mas uma decisão de não trocar os pneus o levou a terminar em sétimo lugar. '),
(40, 'Oscar Piastri', 'Mclaren', 81, 'a.png', 'Australiana', 'piastri.jpeg', 'Oscar Jack Piastri, nascido em 6 de abril de 2001 em Melbourne, é um automobilista australiano que atualmente compete na Fórmula 1 pela equipe McLaren. Sua carreira de destaque inclui os títulos da Eurocopa de Fórmula Renault em 2019, do Campeonato de Fórmula 3 da FIA em 2020 e do Campeonato de Fórmula 2 da FIA em 2021, todos alcançados com a equipe Prema Racing.\r\n\r\nPiastri fez sua estreia na Fórmula 1 pela McLaren em 2023, tornando-se a primeira pessoa nascida no terceiro milênio a competir na categoria. Ele alcançou sua primeira vitória em uma corrida sprint no Grande Prêmio do Catar de 2023, destacando-se ao se qualificar na pole position na classificação da corrida sprint e terminar em segundo na corrida principal. Sua rápida ascensão e desempenho promissor o estabeleceram como uma figura promissora na Fórmula 1.'),
(41, 'Zhou Guanyu', 'Alfa Romeo', 24, 'ci.png', 'Chinesa', 'zhou.jpeg', 'Guanyu Zhou, nascido em 30 de maio de 1999 em Xangai, é um automobilista chinês que atualmente compete na Fórmula 1 pela equipe Alfa Romeo. Sua carreira teve início no Campeonato Italiano de Fórmula 4 e na ADAC Fórmula 4 em 2016, passando pelo Campeonato Europeu de Fórmula 3 em 2017. Entre 2018 e 2019, atuou como piloto de desenvolvimento para a equipe de Fórmula E da DS Techeetah.\n\nNa Fórmula 2, Zhou ingressou na UNI-Virtuosi Racing em 2019, permanecendo na equipe nas temporadas de 2020 e 2021. Sua transição para a Fórmula 1 começou em 2021 quando tornou-se piloto de teste da Alpine.\n\nEm novembro de 2021, Zhou foi anunciado como piloto da equipe Alfa Romeo para a temporada de 2022, tornando-se o primeiro chinês a competir na Fórmula 1. Em sua estreia no Grande Prêmio do Barém de 2022, conquistou a 10ª posição, marcando seu primeiro ponto na categoria. No Grande Prêmio do Canadá, alcançou a 8ª posição, somando mais quatro pontos. '),
(42, 'Valtteri Bottas', 'Alfa Romeo', 77, 'fi.png', 'Filandesa', 'bottas.jpeg', 'Valtteri Bottas, nascido em 28 de agosto de 1989 em Nastola, Finlândia, é um automobilista que atualmente compete na Fórmula 1 pela equipe Alfa Romeo.\r\n\r\nSua jornada começou no kart aos cinco anos, inspirado por uma corrida que viu com seu pai. Ao longo dos anos, conquistou diversos títulos no kart e avançou para monopostos, competindo na Fórmula Renault e Formula 3, onde se destacou.\r\n\r\nEm 2009, Bottas ingressou na ART na Fórmula 3, terminando em terceiro na série europeia. Ele continuou a acumular sucessos, vencendo a F3 Masters e conquistando o título novamente em 2010.\r\n\r\nA transição para a Fórmula 1 começou com a Williams, onde foi piloto de testes em 2010 e estreou como titular em 2013. Sua primeira temporada completa rendeu um pódio na Áustria. Em 2017, Bottas mudou-se para a Mercedes, conquistando sua primeira vitória na Rússia e terminando em terceiro no campeonato.\r\n\r\nEm 2021, Bottas anunciou sua mudança para a Alfa Romeo a partir de 2022, assinando um contrato de três anos.'),
(44, 'Fernando Alonso', 'Aston Martin', 14, 'es.png', 'Espanhola', 'alonso.jpeg', 'Fernando Alonso Díaz, nascido em 29 de julho de 1981 em Oviedo, Espanha, é um automobilista espanhol que atualmente compete na Fórmula 1 pela equipe Aston Martin. Ele é bicampeão mundial de Fórmula 1, conquistando os títulos em 2005 e 2006 pela Renault.\nAlonso teve seu primeiro contato com a F1 testando pela Minardi e participou da temporada de 2001 como piloto titular. Alonso conquistou seus dois títulos mundiais com a Renault em 2005 e 2006, tornando-se o mais jovem campeão da época.\nTransferiu-se para a McLaren em 2007\nRetorno à Renault  Voltou à Renault em 2008, vencendo duas corridas, mas enfrentou controvérsias no GP de Cingapura de 2008. Em 2010, Alonso ingressou na Ferrari, conquistando vitórias e pódios, mas ficou próximo do título em 2010 e 2012.\n Após uma breve pausa, voltou à McLaren em 2015, encerrando sua última temporada na F1 em 2018.\nRetorno à F1 pela, Alonso voltou em 2021 pela Alpine, conquistando um pódio em 2021 no GP do Catar.\n Anunciou sua mudança para a equipe Aston Martin em 2023, substituindo Sebastian Vettel.\n\n'),
(45, 'Lance Strol', 'Aston Martin', 18, 'c.png', 'Canadense', 'stroll.jpeg', 'Lance Stroll, nascido como Lance Strulovitch em 29 de outubro de 1998 em Montreal, Canadá, é um piloto de Fórmula 1 que atualmente compete pela equipe Aston Martin.\r\n\r\n Stroll teve um início impressionante nos monopostos, vencendo o título da F4 Italiana em 2014 e a Toyota Racing Series em 2015. Em 2016, ele conquistou o campeonato da F3 Europeia com 14 vitórias em 30 corridas.\r\nEstreou na Fórmula 1 em 2017 pela equipe Williams, substituindo Felipe Massa. Marcou seus primeiros pontos no Grande Prêmio do Canadá de 2017 e conquistou seu primeiro pódio no Grande Prêmio do Azerbaijão, tornando-se o mais jovem estreante a subir no pódio aos 18 anos.\r\n Em 2019, Stroll se juntou à equipe Racing Point, antiga Force India, após a compra dos ativos por seu pai, Lawrence Stroll. Conquistou sua primeira pole position no Grande Prêmio da Turquia de 2020.\r\n\r\n A Racing Point foi renomeada para Aston Martin em 2021, após um investimento liderado por Lawrence Stroll. Lance permaneceu na equipe, agora conhecida como Aston Martin.'),
(46, 'Kevin Magnussen', 'Haas', 20, 'dina.png', 'Dinamarquês', 'kevin.jpeg', 'Kevin Jan Magnussen, nascido em 5 de outubro de 1992 em Roskilde, Dinamarca, é um automobilista dinamarquês que atualmente compete na Fórmula 1 pela equipe Haas. Sua carreira inclui passagens pelas equipes McLaren e Renault na F1, bem como uma participação na IndyCar Series pela equipe McLaren.\r\n\r\n Magnussen iniciou no kart e progrediu para a Fórmula Ford, onde se tornou campeão. Em 2014, tornou-se piloto titular da McLaren na F1. Conquistou pontos e um pódio em sua estreia na Austrália. Após a temporada de 2015, tornou-se piloto reserva.\r\n\r\n Em 2016, Magnussen juntou-se à equipe Renault como piloto titular, substituindo Pastor Maldonado. Teve um acidente significativo no GP da Bélgica.\r\n\r\n Anunciado como piloto da Haas em 2017, Magnussen permaneceu na equipe até o final de 2020, registrando uma volta mais rápida em Singapura em 2018. Retornou à Haas em 2022 após um breve intervalo.\r\n\r\n Em 2021, Magnussen competiu na equipe Chip Ganassi no IMSA WeatherTech SportsCar Championship, conquistando uma pole em Detroit. Em 2022, cancelou seu contrato para retornar à equipe Haas na F1.'),
(49, 'Nico Hulkenberg', 'Haas', 27, 'am.png', 'Alemão', 'nico.jpeg', 'Nicolas \"Nico\" Hülkenberg, nascido em 19 de agosto de 1987 em Emmerich am Rhein, Alemanha, é um automobilista alemão que compete na Fórmula 1 pela equipe Haas. Sua carreira na F1 abrangeu as temporadas de 2010 a 2022, passando por equipes como Williams, Sauber, Force India, Renault, Racing Point e Aston Martin.\r\n\r\n\r\n Hülkenberg iniciou sua carreira de kart em 1997 e progrediu rapidamente, destacando-se em várias categorias de base, incluindo Formula BMW, A1 Grand Prix, Fórmula 3 e GP2. Ele conquistou títulos notáveis, como o Campeonato Alemão de Kart Júnior, A1GP com a equipe alemã e o Masters de Formula 3.\r\n\r\n Estreou na F1 pela Williams em 2010, conquistando sua primeira pole position no Grande Prêmio do Brasil.\r\n  Após um ano como piloto reserva, Hülkenberg foi confirmado como titular da Force India em 2012.\r\n Mudou-se para a Sauber em 2013, terminando a temporada em décimo lugar.\r\nRetornou à Force India em 2014, estendendo seu contrato até o final de 2017.\r\nTransferiu-se para a Renault em 2017, permanecendo na equipe até o final de 2019.\r\nEm 2020, substituiu Sergio Pérez em algumas corridas devido à COVID-19.'),
(50, 'Yuki Tsunoda', 'AlphaTauri', 22, 'j.png', 'Japonesa', 'yuki.jpeg', 'Yuki Tsunoda, nascido em 11 de maio de 2000 em Kanagawa, Japão, é um automobilista japonês que compete na Fórmula 1 pela equipe AlphaTauri. Sua carreira inclui o título no Campeonato Japonês de Fórmula 4 em 2018, sendo membro da Red Bull Junior Team e do Honda Formula Dream Project.\r\n\r\nAnunciado em 16 de dezembro de 2020, Tsunoda ingressou na equipe AlphaTauri para a temporada de 2021, tornando-se o primeiro piloto da Fórmula 1 a nascer nos anos 2000. Em sua estreia no Grande Prêmio do Barém em 28 de março de 2021, marcou seus primeiros dois pontos na F1. A AlphaTauri confirmou sua permanência na equipe para a temporada de 2022.\r\n\r\nA rápida ascensão de Tsunoda evidencia seu talento e potencial, conquistando sucesso tanto em categorias de base quanto na Fórmula 2, e consolidando sua posição na Fórmula 1 como parte da equipe AlphaTauri.'),
(52, 'Daniel Ricciardo', 'AlphaTauri', 21, 'a.png', 'Australiana', 'dani.jpeg', 'Daniel Joseph Ricciardo nasceu em Perth, Austrália Ocidental, em 1 de julho de 1989. Atualmente, compete na Fórmula 1 pela equipe AlphaTauri. Ao longo de sua carreira, passou por equipes como Red Bull Racing, Renault e McLaren, conquistando poles, pódios e vitórias.\r\n\r\nSua carreira nas pistas começou no kart aos nove anos, e ele progrediu pela Fórmula Ford, Fórmula BMW e Fórmula Renault. Destacou-se na Fórmula 3, vencendo o título britânico em 2009. Na Fórmula Renault 3.5, obteve sucesso, conquistando poles e vitórias.\r\n\r\nEm 2011, estreou na Fórmula 1 com a HRT, antes de se juntar à Toro Rosso e, posteriormente, à Red Bull Racing em 2014. Na Red Bull, teve anos marcantes, vencendo corridas em 2014 e 2016, sendo reconhecido como um dos melhores pilotos do grid.\r\n\r\nMudou para a Renault em 2019 e, em 2021, integrou a equipe McLaren. Em setembro de 2021, venceu o Grande Prêmio da Itália, encerrando um longo jejum de vitórias para a McLaren.\r\n\r\nAo longo de sua carreira, Ricciardo construiu uma reputação como piloto talentoso e carismático, deixando sua marca na história da Fórmula 1.'),
(53, 'Logan Sargeant', 'Williams', 2, 'eua.png', 'Americana', 'logan.jpeg', 'Logan Hunter Sargeant, nascido em 31 de dezembro de 2000 em Fort Lauderdale, é um automobilista estadunidense que atualmente compete na Fórmula 1 pela equipe Williams. Antes de chegar à F1, fez parte da Williams Driver Academy.\r\n\r\nEm outubro de 2021, durante o Grande Prêmio dos Estados Unidos, Sargeant foi anunciado como membro do programa de jovens pilotos da Williams. Em novembro de 2022, foi confirmado como piloto titular da Williams para a temporada de 2023, tornando-se o primeiro representante dos Estados Unidos em tempo integral na F1 desde Scott Speed em 2007. Ele escolheu o número 2 para seu carro, o mesmo que usou na Fórmula Renault. Atualmente, é piloto titular da equipe Williams na F1.'),
(54, 'Alex Albon', 'Williams', 23, 'ta.png', 'Ango-Tailandesa', 'albon.jpeg', 'Alexander Albon Ansusinha, nascido em 23 de março de 1996, é um automobilista anglo-tailandês que compete na Fórmula 1 pela equipe Williams. Filho do ex-piloto britânico Nigel Albon, iniciou sua carreira no kart e progrediu para competições como a Fórmula Renault 2.0 Alpes e a Eurocopa de Fórmula Renault 2.0.\r\n\r\nNa Fórmula 1, estreou pela Toro Rosso em 2019, depois de ser liberado de seu contrato na Fórmula E. Em sua primeira temporada, destacou-se ao marcar seus primeiros pontos no Grande Prêmio do Barém, tornando-se o primeiro tailandês a pontuar desde 1954. No mesmo ano, transferiu-se para a equipe principal da Red Bull, substituindo Pierre Gasly.\r\n\r\nEm setembro de 2020, conquistou seu primeiro pódio na Fórmula 1 no Grande Prêmio da Toscana, tornando-se o primeiro tailandês a subir ao pódio na categoria. Em 2022, Albon se juntou à equipe Williams, renovando seu contrato em agosto do mesmo ano em um acordo de múltiplos anos.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `premio`
--

CREATE TABLE `premio` (
  `id_premio` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `premio`
--

INSERT INTO `premio` (`id_premio`, `descricao`, `data`, `nome`) VALUES
(1, 'Localização: Sakhir, Bahrein Comprimento: 5.412 km', '2023-03-05', 'GP do Bahrein'),
(2, 'Localização: Austin, Estados Unidos Comprimento: 5 513 km', '2023-10-22', 'GP dos Estados Unidos Austin'),
(3, 'Localização: Gidá, Arabia Saudita Comprimento:6.175 km', '2023-03-19', 'GP da Arabia Saudita'),
(4, 'Localização: Melbourne, Austrália Comprimento: 5.278 km', '2023-04-02', 'GP da Austrália'),
(5, 'Localização: Spielberg, Áustria Comprimento: 4.318 km', '2023-07-02', 'GP da Austria'),
(6, 'Localização: Ardenas, Província de Liège, Bélgica Comprimento: 7.004 km', '2023-07-30', 'GP da Belgica'),
(7, 'Localização: Montmeló, Espanha Comprimento: 4.655 km', '2023-06-04', 'GP da Espanha'),
(8, 'Localização: Silverstone, Inglaterra Comprimento: 5.891 km', '2023-07-09', 'GP da Grã Bretanha'),
(9, 'Localização: Zandvoort, Países Baixos Comprimento: 4.252 km', '2023-08-27', 'GP da Holanda'),
(10, 'Localização: Hungaroring, Budapeste, Hungria Comprimento: 4.381 km', '2023-07-23', 'GP da Hungria'),
(11, 'Localização: Monza, Itália Comprimento: 5.793 km', '2023-05-21', 'GP da Itália Emilia Romagna'),
(12, 'Localização: Yas Island, Abu Dhabi, Emirados Árabes Unidos Comprimento: 5.281 km', '2023-11-26', 'GP de Abu Dhabi'),
(13, 'Localização: Monza, Itália Comprimento: 5.793 km', '2023-09-03', 'GP de Italia Monza'),
(14, 'Localização: Miami Gardens, Estados Unidos Comprimento: 5.412 km', '2023-05-07', 'GP de Miami'),
(15, 'Localização: Monte Carlo, Monaco Comprimento: 3.337 km', '2023-05-28', 'GP de Monaco'),
(16, 'Localização: Marina Bay, Singapura Comprimento: 4.940 km', '2023-09-17', 'GP de Singapura'),
(17, 'Localização: Bacu, Azerbaijão Comprimento: 6,003 km', '2023-04-30', 'GP do Azerbaijão'),
(18, 'Localização: Interlagos-São Paulo, Brasil Comprimento: 4 309 km', '2023-11-05', 'GP do Brasil'),
(19, 'Localização: Montreal, Quebec, Canadá Comprimento: 4.361 km', '2023-11-15', 'GP do Canada'),
(20, 'Localização: Suzuka, Japão Comprimento: 5.807 km', '2023-09-24', 'GP do Japão'),
(21, 'Localização: Cidade do México, México Comprimento: 4.304 km', '2023-10-29', 'GP do Mexico'),
(22, 'Localização: Lusail, Catar Comprimento: 5,38 km', '2023-08-09', 'GP do Qatar'),
(23, 'Localização: Las Vegas, Estados Unidos Comprimento: 6.12 km', '2023-11-19', 'GP dos Estados Unidos Las Vegas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `premio_piloto`
--

CREATE TABLE `premio_piloto` (
  `id_premio` int(11) NOT NULL,
  `id_pilotos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `premio_piloto`
--

INSERT INTO `premio_piloto` (`id_premio`, `id_pilotos`) VALUES
(1, 25),
(2, 25),
(3, 29),
(4, 25),
(5, 25),
(6, 25),
(7, 25),
(8, 25),
(9, 25),
(10, 25),
(12, 25),
(13, 25),
(14, 25),
(15, 25),
(16, 35),
(17, 29),
(18, 25),
(19, 25),
(20, 25),
(21, 25),
(22, 25),
(23, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`, `foto`, `created_at`, `admin`) VALUES
(1, 'Ronnie Coleman', '$2y$10$fD4u46fXfbrMaGd.HcYFxOdFdH9uy929ftc7vZh24yhvjtqanlu.6', 'coleman@gmail.com', 'Ronnie-Dean-Coleman-4.jpg', '2023-11-22 18:44:36', 0),
(2, 'admin', '$2y$10$bsMa9WATsgzzJKHe9Wy4zOFAcHoqWALa0aA/zHX35DKYCLN501MTS', 'admin@gmail.com', NULL, '2023-11-22 18:47:17', 1),
(3, 'caca', '$2y$10$TBEL2H6iWQ2780egAV2w9eU2bfEa68LZT0/Xoi58z.MzFOW4AEOrC', 'caca@gmail.com', NULL, '2023-11-22 18:59:01', 0),
(4, 'wagner', '$2y$10$ejN2nkshczBmD3o95/pCwumcYO5iiHTxnH9LYJ5XBOfcivCxJksNe', 'wagnerbernardo440@gmail.com', NULL, '2023-11-29 10:45:42', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `apostas`
--
ALTER TABLE `apostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_apostas_usuario` (`id_utilizador`);

--
-- Índices para tabela `equipas`
--
ALTER TABLE `equipas`
  ADD PRIMARY KEY (`id_equipas`),
  ADD KEY `piloto_principal` (`piloto_principal`),
  ADD KEY `piloto_secundario` (`piloto_secundario`);

--
-- Índices para tabela `equipa_premio`
--
ALTER TABLE `equipa_premio`
  ADD PRIMARY KEY (`id_equipas`,`id_premio`),
  ADD KEY `id_premio` (`id_premio`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Índices para tabela `pilotos`
--
ALTER TABLE `pilotos`
  ADD PRIMARY KEY (`id_pilotos`);

--
-- Índices para tabela `premio`
--
ALTER TABLE `premio`
  ADD PRIMARY KEY (`id_premio`);

--
-- Índices para tabela `premio_piloto`
--
ALTER TABLE `premio_piloto`
  ADD PRIMARY KEY (`id_premio`,`id_pilotos`),
  ADD KEY `id_pilotos` (`id_pilotos`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `apostas`
--
ALTER TABLE `apostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `equipas`
--
ALTER TABLE `equipas`
  MODIFY `id_equipas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `pilotos`
--
ALTER TABLE `pilotos`
  MODIFY `id_pilotos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `apostas`
--
ALTER TABLE `apostas`
  ADD CONSTRAINT `fk_apostas_usuario` FOREIGN KEY (`id_utilizador`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `equipa_premio`
--
ALTER TABLE `equipa_premio`
  ADD CONSTRAINT `equipa_premio_ibfk_1` FOREIGN KEY (`id_equipas`) REFERENCES `equipas` (`id_equipas`),
  ADD CONSTRAINT `equipa_premio_ibfk_2` FOREIGN KEY (`id_premio`) REFERENCES `premio` (`id_premio`);

--
-- Limitadores para a tabela `premio_piloto`
--
ALTER TABLE `premio_piloto`
  ADD CONSTRAINT `premio_piloto_ibfk_1` FOREIGN KEY (`id_premio`) REFERENCES `premio` (`id_premio`),
  ADD CONSTRAINT `premio_piloto_ibfk_2` FOREIGN KEY (`id_pilotos`) REFERENCES `pilotos` (`id_pilotos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
