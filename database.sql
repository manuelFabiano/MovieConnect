-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Creato il: Mag 12, 2023 alle 10:21
-- Versione del server: 8.0.19
-- Versione PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `account`
--

CREATE TABLE `account` (
  `username` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `data_nascita` date NOT NULL,
  `residenza` varchar(50) NOT NULL,
  `ban` tinyint(1) NOT NULL DEFAULT '0',
  `tipo` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `account`
--

INSERT INTO `account` (`username`, `email`, `password`, `nome`, `cognome`, `data_nascita`, `residenza`, `ban`, `tipo`) VALUES
('Alexhax', 'alexandro@gmail.com', '$2y$10$lQCqAYNjYbrPdET1xLaVVe0G14d2W96ohx.cHTndZICwZoZw.Ar9S', 'Alessandro', 'Romeo', '2000-12-06', 'Torino, Italia', 0, 0),
('amdphenom55', 'pippo@outlookpippo.com', '$2y$10$y/rCEvUdyzBb50RmK9QLH.SnBWhkcTTC0.UtCc4/bLZZyu2XPyUOO', 'Peppe', 'Foti', '1860-02-18', 'Città del Vaticano', 0, 0),
('edo_ardo', 'edo_ardo@gmail.com', '$2y$10$CJb9W69NdjLu.MtXCugGSeveKcXSSBveCISrqtFznt6MW6UgJuzmG', 'Edoardo', 'Bruno', '2000-10-10', 'Venezia', 0, 0),
('GiovannaP', 'giovanna@gmail.com', '$2y$10$jSyuKMxTGF1ZmruXrgYvgullPD1KmnJNmTmZEJ7xnGvj3LFpsh3Ba', 'Giovanna', 'Parisi', '1967-03-03', 'Messina, Italia', 0, 0),
('Giulijia', 'giuliafaraone15@gmail.com', '$2y$10$WlWGNX83.J110XvlO3.T7e9P2vK/9EWrpjHljcUC.WD0gVoy3z35O', 'Giulia', 'Faraone', '2002-08-21', 'Messina', 0, 1),
('lauro2001', 'pierrlauro01@gmail.com', '$2y$10$1oPuVdTwUJ74eSKK9gTrGupqyaJx3v.movmetO0GE/SrC01YK7mVS', 'Pier Luca', 'Lauro', '2001-10-03', 'Messina', 0, 0),
('Leopardo', 'gleo@gmail.com', '$2y$10$a.1.WremvpGb9zUlg7cOO.6W0RMIOxQYfXJvaJGpwfNeG5/eMXNHu', 'Giacomo ', 'Leopardo', '2000-01-01', 'Recanati', 0, 0),
('luigiVerdi', 'luigiverdi@gmail.com', '$2y$10$sqd4xMubbrkbHRDe5aRMeOF1e1zcFew87/gL3.8lBGSIJeKbXwspq', 'Luigi ', 'Verdi', '2000-10-03', 'Messina', 0, 1),
('manuelFabiano', 'manuel.fabiano.36@gmail.com', '$2y$10$jCknO6ZpYP9XklxZKln44Ojn39q1ku5LmcZWuYZc2Tpl7SbY5X7NG', 'Manuel', 'Fabiano', '2002-10-03', 'Messina, Italia', 0, 2),
('Marcopolos', 'marcopolo@gmail.com', '$2y$10$J7iC65nOblTe0kEnEEPQhe9kDSyeo5/fQcjpHQmfKOyoMcd5t0sn2', 'Marco', 'Polo', '2000-01-01', 'Milano', 0, 0),
('MarcoRed', 'marcorossi@gmail.com', '$2y$10$egFDOD7D8tbaV89psmSAWe7krqfyBuQ5FvkRXnZd8A2Tm/vi3illK', 'Marco', 'Rossi', '2000-03-28', 'Milano, Italia', 1, 0),
('MarioMario', 'mariomario@gmail.com', '$2y$10$tI7ujqzXC8HaPtwDE/CbDuC7sokNMxO.4X036UC41x..p9VPPwVmm', 'Mario', 'Mario', '2000-02-03', 'Catania', 0, 1),
('PaoloM3', 'pmuratore@gmail.com', '$2y$10$REaNOXmkaS8qQlQ86RvA6u5diX7wuuoFzat.rkHzazmaqRbXivvQK', 'Paolo', 'Muratore', '2000-10-31', 'Palermo', 0, 0),
('Parker1962', 'parker@alice.it', '$2y$10$myeJkdUvmldC7gusLhsjL.EZB94E5k2za62vFxbeuu4.yRERLN6iK', 'Peter', 'Parker', '1993-08-27', 'New York', 0, 0),
('Pieros', 'piero@gmail.com', '$2y$10$/saoHeowIIVwohZwrVcOLu0isZixC2LdkTGCZCffGDKA54a201EwO', 'Piero', 'Piero', '2000-01-01', 'Milano', 0, 0),
('Saretta ', 'sarafabiano03@gmail.com', '$2y$10$UC3cc9hSjUFD/0riYqSWYOnUADERLYvm/pP91PSzvvctl4Go1DjRW', 'Sara', 'Fabiano', '2006-06-06', 'Messina', 0, 0),
('schamali_', 'michelamagazzu@gmail.com', '$2y$10$V5LFeNBHhfO7IX52.ZjfNuewWRZgW/IOC5trXpLlU6wFimvVa/GKC', 'Michela', 'Magazzù', '2000-09-25', 'Messina', 0, 0),
('test', 'test@gmail.com', '$2y$10$SB92c46W/YoMifW0.Q6UWe6nchnHoRA/EiR3FhuJSStyB.Q2Y1CMq', 'Test', 'Test', '2000-10-10', 'messina', 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `commento`
--

CREATE TABLE `commento` (
  `id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `id_recensione` int NOT NULL,
  `data_ora` datetime NOT NULL,
  `contenuto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `commento`
--

INSERT INTO `commento` (`id`, `username`, `id_recensione`, `data_ora`, `contenuto`) VALUES
(3, 'manuelFabiano', 20, '2023-04-27 15:50:01', 'che vuol dire xd??'),
(4, 'manuelFabiano', 18, '2023-04-27 16:27:17', 'Ma come fai a dire una cosa del genere?'),
(5, 'manuelFabiano', 31, '2023-04-30 12:34:30', 'Commento di prova'),
(6, 'manuelFabiano', 31, '2023-04-30 12:44:21', 'prova'),
(7, 'manuelFabiano', 31, '2023-04-30 12:45:55', 'prova2'),
(8, 'manuelFabiano', 31, '2023-04-30 12:46:36', 'prova3'),
(9, 'manuelFabiano', 20, '2023-05-03 12:01:09', 'Ah adesso ho capito'),
(10, 'luigiVerdi', 37, '2023-05-06 15:27:13', 'prova'),
(12, 'manuelFabiano', 28, '2023-05-07 22:26:43', 'test!'),
(13, 'edo_ardo', 42, '2023-05-07 23:39:46', 'Si, ma il voto è troppo basso'),
(14, 'edo_ardo', 13, '2023-05-07 23:42:37', 'Secondo me The Amazing Spider-Man è meglio'),
(18, 'manuelFabiano', 47, '2023-05-10 17:16:32', 'asasas'),
(19, 'schamali_', 42, '2023-05-11 14:10:49', 'Completamente d\'accordo!'),
(20, 'schamali_', 26, '2023-05-11 14:42:21', 'Mi rispecchio completamente nella tua recensione!'),
(21, 'schamali_', 57, '2023-05-11 14:56:03', 'sopravvalutata'),
(22, 'Parker1962', 60, '2023-05-12 11:27:41', 'Anche io');

-- --------------------------------------------------------

--
-- Struttura della tabella `da_vedere`
--

CREATE TABLE `da_vedere` (
  `username` varchar(20) NOT NULL,
  `id_scheda` int NOT NULL,
  `visto` tinyint(1) NOT NULL DEFAULT '0',
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `da_vedere`
--

INSERT INTO `da_vedere` (`username`, `id_scheda`, `visto`, `data`) VALUES
('edo_ardo', 11, 0, NULL),
('luigiVerdi', 16, 1, '2023-05-06'),
('manuelFabiano', 1, 1, '2023-04-13'),
('manuelFabiano', 2, 1, '2023-04-30'),
('manuelFabiano', 3, 1, '2023-05-01'),
('manuelFabiano', 5, 1, '2023-04-29'),
('manuelFabiano', 8, 1, '2023-05-02'),
('manuelFabiano', 9, 1, '2023-05-01'),
('manuelFabiano', 13, 1, '2023-04-29'),
('manuelFabiano', 16, 1, '2023-05-02'),
('manuelFabiano', 21, 1, '2023-05-09'),
('PaoloM3', 1, 0, NULL),
('PaoloM3', 11, 0, NULL),
('Parker1962', 2, 0, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `locandina`
--

CREATE TABLE `locandina` (
  `label` varchar(30) NOT NULL,
  `id_scheda` int NOT NULL,
  `percorso_immagine` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `locandina`
--

INSERT INTO `locandina` (`label`, `id_scheda`, `percorso_immagine`) VALUES
('gog1.jpeg', 21, 'gog1.jpeg'),
('gotg2.jpeg', 22, 'gotg2.jpeg'),
('Locandina WW', 1, 'harrypotter1.jpeg'),
('Locandina WW', 3, 'harrypotter2.jpeg'),
('Locandina WW', 4, 'harrypotter3.jpeg'),
('Il sol dell avvenire.jpeg', 11, 'Il sol dell avvenire.jpeg'),
('Inception.jpeg', 19, 'Inception.jpeg'),
('Locandina 1.jpg', 8, 'Locandina 1.jpg'),
('Locandina HP1 Troll.jpeg', 1, 'Locandina HP1 Troll.jpeg'),
('Locandina ITA HP1.jpeg', 1, 'Locandina ITA HP1.jpeg'),
('LocandinaInterstellar.jpeg', 16, 'LocandinaInterstellar.jpeg'),
('Locandina S5', 5, 'prisonbreak.jpeg'),
('PulpFiction HD.jpeg', 13, 'PulpFiction HD.jpeg'),
('Locandina 1', 2, 'spider-man1.jpeg'),
('TheLastDance.jpeg', 24, 'TheLastDance.jpeg'),
('TheOfficeUS.jpeg', 9, 'TheOfficeUS.jpeg');

-- --------------------------------------------------------

--
-- Struttura della tabella `mi_piace`
--

CREATE TABLE `mi_piace` (
  `username` varchar(20) NOT NULL,
  `id_recensione` int NOT NULL,
  `data_ora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `mi_piace`
--

INSERT INTO `mi_piace` (`username`, `id_recensione`, `data_ora`) VALUES
('amdphenom55', 17, '2023-04-12 12:27:51'),
('edo_ardo', 28, '2023-05-07 23:59:50'),
('edo_ardo', 30, '2023-05-08 19:06:25'),
('edo_ardo', 36, '2023-05-07 23:33:34'),
('edo_ardo', 37, '2023-05-07 23:33:36'),
('edo_ardo', 39, '2023-05-07 23:33:37'),
('edo_ardo', 41, '2023-05-07 23:42:17'),
('edo_ardo', 44, '2023-05-07 23:33:38'),
('edo_ardo', 45, '2023-05-08 00:00:19'),
('edo_ardo', 46, '2023-05-07 23:36:38'),
('edo_ardo', 47, '2023-05-07 23:39:33'),
('edo_ardo', 48, '2023-05-07 23:45:43'),
('edo_ardo', 49, '2023-05-07 23:47:17'),
('edo_ardo', 51, '2023-05-08 19:06:27'),
('Giulijia', 12, '2023-04-12 09:27:03'),
('Giulijia', 17, '2023-04-15 18:33:13'),
('Giulijia', 18, '2023-04-07 22:24:24'),
('Giulijia', 20, '2023-04-15 18:33:17'),
('Giulijia', 23, '2023-04-15 18:33:17'),
('lauro2001', 13, '2023-04-24 23:13:23'),
('lauro2001', 19, '2023-04-24 23:13:23'),
('lauro2001', 26, '2023-04-24 23:13:23'),
('lauro2001', 51, '2023-05-10 23:48:29'),
('luigiVerdi', 12, '2023-05-07 23:08:37'),
('luigiVerdi', 17, '2023-05-07 23:09:14'),
('luigiVerdi', 20, '2023-05-07 23:08:35'),
('luigiVerdi', 26, '2023-05-06 13:22:40'),
('luigiVerdi', 36, '2023-05-06 13:22:40'),
('luigiVerdi', 37, '2023-05-06 13:22:40'),
('manuelFabiano', 12, '2023-04-30 12:52:02'),
('manuelFabiano', 13, '2023-05-01 16:30:02'),
('manuelFabiano', 17, '2023-04-30 16:30:02'),
('manuelFabiano', 19, '2023-04-15 16:30:02'),
('manuelFabiano', 20, '2023-04-20 22:56:14'),
('manuelFabiano', 23, '2023-05-01 16:30:02'),
('manuelFabiano', 26, '2023-05-07 19:26:49'),
('manuelFabiano', 27, '2023-04-28 22:56:14'),
('manuelFabiano', 28, '2023-04-28 22:56:14'),
('manuelFabiano', 29, '2023-04-28 00:00:00'),
('manuelFabiano', 30, '2023-04-28 00:00:00'),
('manuelFabiano', 31, '2023-04-30 00:00:00'),
('manuelFabiano', 35, '2023-05-02 00:00:00'),
('manuelFabiano', 36, '2023-05-02 00:00:00'),
('manuelFabiano', 37, '2023-05-06 17:08:55'),
('manuelFabiano', 39, '2023-05-10 14:24:10'),
('manuelFabiano', 41, '2023-05-06 16:59:31'),
('manuelFabiano', 42, '2023-05-07 20:54:32'),
('manuelFabiano', 44, '2023-05-10 17:13:13'),
('manuelFabiano', 45, '2023-05-08 19:13:44'),
('manuelFabiano', 47, '2023-05-11 14:42:48'),
('manuelFabiano', 49, '2023-05-09 00:16:39'),
('manuelFabiano', 51, '2023-05-09 00:12:15'),
('manuelFabiano', 52, '2023-05-08 19:14:50'),
('manuelFabiano', 69, '2023-05-11 14:06:20'),
('manuelFabiano', 70, '2023-05-11 14:15:50'),
('manuelFabiano', 71, '2023-05-11 14:45:18'),
('manuelFabiano', 74, '2023-05-11 22:28:45'),
('MarioMario', 13, '2023-04-15 00:00:00'),
('MarioMario', 17, '2023-04-07 00:00:00'),
('MarioMario', 18, '2023-04-07 00:00:00'),
('MarioMario', 23, '2023-04-15 00:00:00'),
('MarioMario', 59, '2023-05-12 11:40:19'),
('PaoloM3', 17, '2023-05-06 00:00:00'),
('PaoloM3', 36, '2023-05-06 00:00:00'),
('PaoloM3', 37, '2023-05-06 00:00:00'),
('PaoloM3', 39, '2023-05-06 00:00:00'),
('PaoloM3', 41, '2023-05-06 00:00:00'),
('Parker1962', 41, '2023-05-12 11:28:02'),
('Parker1962', 48, '2023-05-12 11:28:00'),
('Parker1962', 60, '2023-05-12 11:27:53'),
('Parker1962', 71, '2023-05-12 11:28:58'),
('Parker1962', 77, '2023-05-12 11:27:31'),
('Parker1962', 78, '2023-05-12 11:29:34'),
('schamali_', 26, '2023-05-11 14:44:55'),
('schamali_', 30, '2023-05-11 13:54:21'),
('schamali_', 42, '2023-05-11 14:10:32'),
('schamali_', 51, '2023-05-11 13:54:24');

-- --------------------------------------------------------

--
-- Struttura della tabella `persona`
--

CREATE TABLE `persona` (
  `nome` varchar(40) NOT NULL,
  `percorso_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `persona`
--

INSERT INTO `persona` (`nome`, `percorso_foto`) VALUES
('Alan Rickman', 'AlanRickman.jpeg'),
('Amaury Nolasco', 'AmauryNolasco.jpeg'),
('Anna Torv', 'AnnaTorv.jpeg'),
('Anne Hathaway', 'AnneHathaway.jpeg'),
('Barbora Bobuľová', 'BarboraBobuľová.jpeg'),
('Bella Ramsey', 'BellaRamsey.jpeg'),
('Bradley Cooper', 'BradleyCooper.jpeg'),
('Bruce Willis', 'BruceWillis.jpeg'),
('Casey Affleck', 'CaseyAffleck.jpeg'),
('Chris Pratt', 'ChrisPratt.jpeg'),
('Christopher Nolan', 'ChristopherNolan.jpeg'),
('Craig Mazin', 'CraigMazin.jpeg'),
('Daniel Radcliffe', 'DanielRadcliffe.jpeg'),
('Dave Bautista', 'DaveBautista.jpeg'),
('David Gyasi', 'DavidGyasi.jpeg'),
('Dennis Rodman', 'DennisRodman.jpeg'),
('Dominic Purcell', 'DominicPurcell.jpeg'),
('Elliot Page', 'ElliotPage.jpeg'),
('Emma Watson', 'EmmaWatson.jpeg'),
('Gabriel Luna', 'GabrielLuna.jpeg'),
('Harry Melling', 'HarryMelling.jpeg'),
('James Franco', 'JamesFranco.jpeg'),
('James Gunn', 'JamesGunn.jpeg'),
('Jeffrey Pierce', 'JeffreyPierce.jpeg'),
('Jessica Chastain', 'JessicaChastain.jpeg'),
('John Krasinski', 'JohnKrasinski.jpeg'),
('John Travolta', 'JohnTravolta.jpeg'),
('Joseph Gordon-Levitt', 'JosephGordon-Levitt.jpeg'),
('Karen Gillan', 'KarenGillan.jpeg'),
('Keivonn Woodard', 'KeivonnWoodard.jpeg'),
('Kristen Dunst ', 'KristenDunst.jpeg'),
('Lamar Johnson', 'LamarJohnson.jpeg'),
('Lee Pace', 'LeePace.jpeg'),
('Leonardo DiCaprio', 'LeonardoDiCaprio.jpeg'),
('Margherita Buy', 'MargheritaBuy.jpeg'),
('Mathieu Amalric', 'MathieuAmalric.jpeg'),
('Matt Damon', 'MattDamon.jpeg'),
('Matthew McConaughey', 'MatthewMcConaughey.jpeg'),
('Michael Jordan', 'MichaelJordan.jpeg'),
('Michael Rooker', 'MichaelRooker.jpeg'),
('Nanni Moretti', 'NanniMoretti.jpeg'),
('Neil Druckmann', 'NeilDruckmann.jpeg'),
('Pedro Pascal', 'PedroPascal.jpeg'),
('Phil Jackson', 'PhilJackson.jpeg'),
('Pom Klementieff', 'PomKlementieff.jpeg'),
('Quentin Tarantino', 'QuentinTarantino.jpeg'),
('Rainn Wilson', 'RainnWilson.jpeg'),
('Robbie Coltrane', 'RobbieColtrane.jpeg'),
('Robert Knepper', 'RobertKnepper.jpeg'),
('Rupert Grint', 'RupertGrint.jpeg'),
('Samuel L. Jackson', 'SamuelL.Jackson.jpeg'),
('Sarah Wayne Callies', 'SarahWayneCallies.jpeg'),
('Scottie Pippen', 'ScottiePippen.jpeg'),
('Silvio Orlando', 'SilvioOrlando.jpeg'),
('Steve Carell', 'SteveCarell.jpeg'),
('Steve Kerr', 'SteveKerr.jpeg'),
('Tobey Maguire', 'TobeyMaguire.jpeg'),
('Tom Felton', 'TomFelton.jpeg'),
('Tom Hardy', 'TomHardy.jpeg'),
('Topher Grace', 'TopherGrace.jpeg'),
('Uma Thurman', 'UmaThurman.jpeg'),
('Vin Diesel', 'VinDiesel.jpeg'),
('Wade Williams', 'WadeWilliams.jpeg'),
('Wentworth Miller', 'WentworthMiller.jpeg'),
('Willem Dafoe', 'WillemDafoe.jpeg'),
('William Fichtner', 'WilliamFichtner.jpeg'),
('Zoe Saldaña', 'ZoeSaldaña.jpeg');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `id` int NOT NULL,
  `id_scheda` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `voto` decimal(3,1) NOT NULL,
  `contenuto` varchar(5000) NOT NULL,
  `data_ora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`id`, `id_scheda`, `username`, `voto`, `contenuto`, `data_ora`) VALUES
(12, 1, 'GiovannaP', '9.0', 'Mamma mia che bel film', '2023-04-03 00:31:12'),
(13, 2, 'GiovannaP', '10.0', 'Miglior film di Spider-Man', '2023-04-03 00:37:03'),
(17, 1, 'manuelFabiano', '7.5', 'Non ho la pretesa di essere un critico cinematografico, ma voglio esprimere tutta la mia approvazione per un film che mi fa tornare bambino, o meglio, che mi fa desiderare di tornare ad essere bambino. Se posso direi un film \"innocente\", che a mio parere non ha nessuna pretesa di ordine morale. Vuole essere un divertimento e una delizia per gli occhi dei più piccini e non, una bella favola di fantasia, non di tecnologia, come ho visto scritto da qualcuno. Ma è questo che molte persone non capiscono. Harry Potter è una bella fiaba, che ti trasporta in un mondo dove tutto è magico, dove puoi volare con l\'immaginazione, e tutto questo senza niente togliere ad altre splendide storie come lo sono quelle di Tim Burton o del Signore degli Anelli. Non penso si possano paragonare film che trattano di storie completamente diverse! Ognuno ha la sua particolarità e bellezza e va rispettato. Non penso poi che questo film riesca ad annoiare bambini, e ancor più i libri. A nessun fanciullo peserà il fatto che si parli di scuola e professori, perchè questa è una scuola magica, una scuola che tutti vorrebbero frequentare, la scuola in cui ti può accadere di tutto e puoi vivere le più mirabolanti avventure, puoi assistere a fatti meravigliosi e a lezioni tutt\'altro che tediose! Chi da bambino non avrebbe preferito studiare come preparare strani intrugli o fare incantesimi piuttosto che tabelline e regole di grammatica? Nel complesso il film penso sia ben riuscito, anche se il doppiaggio italiano, c\'è da ammetterlo è pessimo. Nonostante non sia un capolavoro comunque onore al merito per chi ha voluto trasportare su pellicola una delle storie di fantasia più belle degli ultimi tempi! Perdonatemi un\'ultima cosa. Mi è molto dispiaciuto leggere recensioni contenenti parole di pessimo gusto. Indipendentemente se a favore o contro la buona riuscita del film ritengo siano da condannare in entrambe i casi.', '2023-04-06 17:53:41'),
(18, 1, 'MarioMario', '6.0', 'Non mi convince.', '2023-04-06 19:30:43'),
(19, 2, 'MarioMario', '9.0', 'Mi ha fatto scoprire Spider-Man e secondo me qui Raimi si è superato', '2023-04-06 23:00:35'),
(20, 1, 'Giulijia', '10.0', 'Un capolavoro del cinema, complimenti! xdxd', '2023-04-07 17:51:59'),
(23, 5, 'manuelFabiano', '9.5', 'Serie incredibile , tra le mie preferite in assoluto insieme a. Le prime 2 stagioni sono le più convincenti, geniali e belle di tutti i prodotti televisivi che ho visto finora, piene di colpi di scene, situazioni che ti mettono adrenalina e ansia, personaggi buoni e cattivi ben scritti e interpretati. Anche se la maggior parte dice che la stagione migliore sia la prima, io penso invece che la seconda sia insuperabile; Mahone personaggio grandioso, geniale che riesce sempre a mettere in difficoltà Micheal, e grazie a lui la seconda stagione ha un ritmo molto incalzante e mai noioso. La terza stagione è un po’ inferiore alle altre due, si capiva che non era in programma, il ritmo che ti teneva attaccato allo schermo col fiato sospeso, diventa più lento ma comunque, a mio parere, piacevole. Il finale della terza stagione l\'ho trovato fantastico. La quarta stagione la ritengo la peggiore, ritmo molto più lento, ripetitivo e noioso, nonostante i primi episodi mi fossero piaciuti abbastanza: dopo che Micheal riesce a prendere Scilla, la serie diventa insopportabile, perché di colpo diventano tutti doppiogiochisti( ho quasi odiato i personaggi di Self, Gretchen e T-Bag perché non riuscivo mai a capire cosa volevano fare e da che parte fossero schierati),ho apprezzato poi il personaggio della madre di Scofield e ho amato il finale della quarta stagione, (no spoiler)non mi era quasi mai successo di commuovermi per la morte di un personaggio di una serie tv. La quinta stagione io non la considero, perché NON è Prison Break, l’ambientazione nello Yemen, la durata di soli 9 episodi, finale scritto velocemente e non si capisce se la serie possa continuare. Non la consiglio assolutamente a nessuno, perché la quarta stagione è pienamente autoconclusiva.', '2023-04-14 20:19:18'),
(26, 11, 'lauro2001', '8.0', 'Come al solito Nanni Moretti non delude le aspettative, con la sua distinta e a volte velata ironia. Il tempo è indistinto, a volte sospeso. La vita di Moretti viene spesso fuori in questo film, che in realtà è un viaggio caleidoscopico tra più storie. Visionario, e con una volontà di rivalsa. ', '2023-04-24 23:25:56'),
(27, 12, 'manuelFabiano', '10.0', 'bello', '2023-04-26 11:43:07'),
(28, 8, 'manuelFabiano', '8.5', 'The Last of Us è una serie televisiva eccezionale, basata sull\'amato videogioco. Fedele all\'originale, affascina con la sua narrazione coinvolgente, personaggi ben sviluppati e una rappresentazione post-apocalittica realistica. È un\'esperienza emozionante che cattura l\'essenza del gioco e trasmette un forte impatto emotivo.', '2023-04-26 14:58:55'),
(29, 4, 'manuelFabiano', '8.0', 'Il mio film preferito della saga! ', '2023-04-27 17:19:42'),
(30, 13, 'manuelFabiano', '9.0', 'Opera  spartiacque nel cinema degli anni Novanta, Pulp Fiction ha rivelato al mondo il talento di Quentin Tarantino, già regista del pregevole Le iene e sceneggiatore per Tony Scott (Una vita al massimo) o, in quello stesso memorabile anno, per Oliver Stone (Assassini nati). Tanto la consacrazione a Cannes, dove fu premiato con una meritata Palma d\'oro, quanto l\'Oscar per la miglior sceneggiatura originale, da dividere con l\'ex amico Roger Avary, poco rendono l\'idea dell\'influenza avuta da un film-fenomeno che è stato in grado di attuare una vera \"tarantinizzazione\" del modo di raccontare su grande schermo. Con una capacità incomparabile di mescolare alto e basso, generi e loro riscrittura, il regista poco più che trentenne orchestra un capolavoro pop fatto di citazioni e rimandi interni con il fine primo di traghettare lo sguardo in un gioco, di godibilissima fattura, in cui la forma della \"digressione\" la fa da padrone, dando nuova vita a situazioni cinematografiche ultra-classiche. Il divertimento si mescola alla violenza efferata, moltissime all\'epoca le polemiche che seguirono a ruota il successo, il dialogo brillante alla drammaticità delle situazioni messe in scena (su tutte una folle sequenza ambientata nel retro di un negozio di pegni), mentre il tempo e lo spazio subiscono giravolte, facendo chiedere di continuo allo spettatore a che punto e in quale luogo ci si trova nella complessità della storia. A partire dal titolo riferibile a quelle riviste popolari (\"Pulp Magazines\") sulla cui carta scadente erano raccontate novelle dei generi più disparati, dal poliziesco allo sportivo fino al western, Pulp Fiction frulla insieme stimoli della cultura popolare e del cinema di tutte le latitudini: dagli incastri di Robert Altman agli umori neri di Martin Scorsese, Sam Peckinpah e Arthur Penn, dalla violenza coreografata di Sergio Leone e John Woo fino a quel \"poliziottesco\" italiano, con Fernando Di Leo e Enzo G. Castellari in testa, di cui Tarantino è da sempre fanatico. Tra le sequenze entrate nella storia citiamo il ballo tra Vincent Vega e Mia Wallace al \"Jack Rabbit Slim\'s\" sulle note di You Never Can Tell di Chuck Berry. Colonna sonora epocale e attori, quasi tutti, in stato di grazia. Ottima la fotografia di Andrzej Sekula. Un cult.', '2023-04-27 23:32:54'),
(31, 14, 'manuelFabiano', '6.0', 'prova', '2023-04-29 00:38:06'),
(32, 15, 'manuelFabiano', '5.0', 'Non fa paura', '2023-04-29 01:04:07'),
(34, 3, 'manuelFabiano', '7.0', 'lorem ipsum', '2023-04-30 23:53:32'),
(35, 2, 'manuelFabiano', '9.0', 'Grande Sam Raimi', '2023-05-01 16:30:36'),
(36, 16, 'manuelFabiano', '10.0', 'Sarò breve: questo film entra di diritto nel club dei film \"unici\" da riguardare più e più volte.\r\nla storia, almeno inizialmente, non appare imprevedibile e ricca di sorprese: Terra che sta diventando inabitabile, quindi serve un altro mondo dove abitare, quindi ecco il progetto dell viaggio interstellare. Ma ecco la rivoluzione: non ci si sofferma più nel mostrare le solite pompose scene tipiche dei film spaziali (piloti che si preparano, musiche eroiche, sfrenata dettagliatura delle navicelle spaziali), ma si vada dritti al cuore della narrazione. Alcuni dei vari accadimenti nello spazio non sono di immediata comprensione per lo spettatore, quasi una conseguenza logica vista la mole di nozioni tecniche su cui si basano: ma questo mi è piaciuto, attriubuisce una certo realismo e una logica che sfuggono allo spettatore \"medio\", ma che vengono più che esaurientemente rese afferrabili col proseguire della trama. Inutile vermante soffermarsi sulla qualità tecnica del film, con effetti speciali di prima qualità e ottima fattura. Dal punto di vista contenutistico sono rimasto a bocca aperta riguardo ad un aspetto particolare: una nemmeno troppo implicita ammissione dell\'esistenza di \"esseri/essere\" superiore all\'uomo e non vincolato alla nostra esistenza tridimensionale, forse un nuovo modo di legare visioni trascendenti con la concezione puramente scientifica della realtà. In buona parte del film io ho avuto i brividi, specialmente quando venivano ad avere vero \"contatto\" momenti storico-temporali all\'apparenza lontanissimi. Rivelazioni inaspettate che ci fanno sforzare all\'ennessima potenza per capire momenti e scene visti nella parte iniziale del film, e questo ho amato di questa pellicola: la mia mente non si è mai soffermata a notare il singolo dettaglio perchè troppo impegnata a seguire il senso logico degli accadimenti, che si legano tra loro in un rapporto semplicemente geniale, di non immediata comprensione forse, ma geniale.\r\n', '2023-05-02 00:42:04'),
(37, 16, 'luigiVerdi', '9.5', 'Bello bello!', '2023-05-06 00:23:18'),
(38, 20, 'PaoloM3', '8.5', 'Bel film, DiCaprio bravissimo come sempre', '2023-05-06 15:43:08'),
(39, 16, 'PaoloM3', '8.5', 'Un film che sa regalare momenti di emozione intensa, una colonna sonora bellissima, immagini che rimangono nella memoria. Punto debole, personalmente, la sceneggiatura un po’ troppo pretenziosa in certi punti.', '2023-05-06 15:44:47'),
(41, 2, 'PaoloM3', '7.0', 'Secondo me è invecchiato un pò male questo film.', '2023-05-06 15:47:54'),
(42, 19, 'manuelFabiano', '8.5', 'Nolan non delude mai', '2023-05-07 20:54:16'),
(44, 16, 'edo_ardo', '9.5', 'La regia di Nolan è magistrale, combinando sequenze d\'azione mozzafiato con momenti di riflessione filosofica. La colonna sonora di Hans Zimmer è un\'altra componente fondamentale del film, creando un\'atmosfera intensa e coinvolgente che amplifica l\'impatto delle scene più emozionanti.', '2023-05-07 23:33:25'),
(45, 21, 'edo_ardo', '9.0', 'Guardiani della Galassia è un\'esplosione di divertimento e azione. Questo film di supereroi spaziali, diretto da James Gunn, ti trascina in un viaggio intergalattico pieno di umorismo, colpi di scena e personaggi indimenticabili.', '2023-05-07 23:34:44'),
(46, 22, 'edo_ardo', '8.5', 'Guardiani della Galassia Vol. 2 si distingue per gli effetti visivi strabilianti e i fantastici scenari spaziali, che ti immergono completamente in un mondo di meraviglia. La regia di Gunn è magistrale nel tenere alto il ritmo e nel regalare spettacolo visivo a ogni istante.', '2023-05-07 23:36:29'),
(47, 19, 'edo_ardo', '10.0', 'Inception è un\'opera cinematografica straordinaria, diretta da Christopher Nolan, che sfida la mente e le convenzioni del genere. Con una trama intricata, effetti visivi sorprendenti e una colonna sonora avvolgente, il film ti catapulta in un labirinto onirico di suspense e meraviglia. È un viaggio indimenticabile che merita il massimo punteggio.', '2023-05-07 23:39:26'),
(48, 2, 'edo_ardo', '7.0', 'Ogni fan di Spider-Man ha le proprie preferenze, ma devo ammettere che il film \"Spider-Man\" diretto da Sam Raimi non ha pienamente colpito la mia sensibilità. Nonostante le sue forti radici nell\'immaginario del supereroe, ho trovato il film un po\' datato e talvolta caricaturale.\r\n\r\nLa caratterizzazione dei personaggi e la trama sembrano mancare di profondità, e alcuni elementi del film sembrano troppo convenzionali per il mio gusto. Inoltre, ho trovato l\'interpretazione di Tobey Maguire come Peter Parker un po\' troppo ingenua e meno coinvolgente rispetto ad altre versioni.\r\n\r\nD\'altra parte, \"The Amazing Spider-Man\" diretto da Marc Webb ha portato una freschezza al franchise. L\'interpretazione di Andrew Garfield come Spider-Man ha reso il personaggio più vivace e moderno, con una rappresentazione più convincente dei conflitti interni di Peter Parker. Inoltre, l\'approccio visivo e le sequenze d\'azione di Webb hanno reso il film più spettacolare e coinvolgente.', '2023-05-07 23:45:20'),
(49, 5, 'edo_ardo', '8.0', 'Prison Break è stata una serie televisiva intensa ed avvincente che ha tenuto i telespettatori col fiato sospeso per le prime stagioni. La trama intricata e le fughe audaci dei protagonisti hanno mantenuto alta la tensione e l\'interesse. Tuttavia, purtroppo, nell\'ultima stagione la qualità complessiva sembra essersi deteriorata. La trama si è allungata eccessivamente, perdendo di intensità e credibilità, e alcuni sviluppi dei personaggi sono risultati poco convincenti. Nonostante ciò, rimane un\'esperienza emozionante per gli appassionati di thriller carcerario.', '2023-05-07 23:47:11'),
(50, 1, 'Saretta ', '10.0', 'Il mio film preferito!! Attori davvero bravi!!', '2023-05-08 14:04:23'),
(51, 13, 'Giulijia', '10.0', 'Film assurdo, cast spaziale, un capolavoro del cinema !!!!', '2023-05-08 19:00:30'),
(52, 21, 'manuelFabiano', '9.0', 'Guardiani della Galassia è un film di supereroi spaziali che incanta con la sua combinazione di azione, umorismo e cuore. I personaggi eccentrici e carismatici, insieme a una colonna sonora epica, rendono l\'avventura intergalattica irresistibile. È un\'esperienza divertente e coinvolgente che ti fa innamorare di questi insoliti eroi cosmici.', '2023-05-08 19:14:40'),
(57, 5, 'lauro2001', '10.0', 'Miglior serie esistente sul pianeta Terra. Chi l\'ha ideata è veramente geniale, spero solo in una nuova stagione!', '2023-05-10 23:54:27'),
(58, 23, 'lauro2001', '10.0', 'Solito splendido ed ironico film di Ficarra e Picone, due mostri sacri dell\'ironia siciliana, che ti fanno comprendere al meglio i problemi esistenti, purtroppo, sulla bella Sicilia', '2023-05-10 23:57:01'),
(59, 24, 'lauro2001', '9.5', 'Una delle serie migliori che abbia mai visto, che fa vivere tutte le emozioni della magnifica squadra dei Bulls negli anni di Micheal Jordan. Consigliata a tutti gli appassionati di basket e non, vi farà amare questo sport!', '2023-05-11 00:00:09'),
(60, 2, 'lauro2001', '6.0', 'Mi aspettavo di più', '2023-05-11 00:01:04'),
(69, 13, 'schamali_', '8.5', 'Un umorismo straordinario e spietato. E\' sicuramente un pilastro della storia del cinema, un punto di riferimento importante, soprattutto per chi voglia intraprendere la scelta di raccontare storie tramite il mezzo cinematografico.\r\n\r\nPs: Mia Wallace è di una sensualità disarmante.', '2023-05-11 14:04:11'),
(70, 19, 'schamali_', '9.5', 'Un fottuto trip.\r\nStoria basata su più livelli, temporali/emozionali/mentali. La realtà viene di continuo messa in discussione. Sto vivendo davvero oppure qualcuno ha inserito ciò che sto vivendo nella mia testa? Ricorda un po\' l\'idea del genio maligno di Cartesio.\r\nDa vedere, assolutamente!', '2023-05-11 14:10:20'),
(71, 16, 'schamali_', '9.5', 'Un film davvero emozionante. La storia di un padre ed una figlia, che va oltre i limiti dello spazio e del tempo. Un legame di cui si sente la forza, la complessità, e soprattutto l\'amore. Il film è ambientato in un futuro prossimo - aggiungerei decisamente prossimo - dove la scelta di un uomo diventa fondamentale. La sensazione che il film lascia ha a che fare con l\'infinito in un certo senso, ma la cosa più bella a parer mio, è la fiducia nell\'uomo, nelle sue possibilità e capacità.', '2023-05-11 14:40:45'),
(72, 11, 'schamali_', '8.5', 'Un Nanni Moretti energico come sempre, un punto di vista nuovo rispetto alla storia del partito comunista italiano.', '2023-05-11 14:44:25'),
(73, 25, 'schamali_', '10.0', 'In assoluto il mio film preferito. Sarà perchè sono siciliana. Porta avanti una verità nuda e cruda sulla nostra terra. La terra qui per quanto bella è maledetta, è un posto da cui andare via. La colonna sonora è di Ennio Morricone, da brividi. Alfredo è straziante, mi ha fatto piangere tanto. E\' così ai personaggi ci si lega come se fossero persone, e io ad Alfredo voglio tanto bene. La storia su cui basarsi maggiormente è quella tra il protagonista ed Alfredo, la parte in cui si parla dell\'amore perduto e ritrovato tra Salvatore e Agnese è interessante, ma non è la parte più importante. La scena finale è di una commozione allucinante.', '2023-05-11 14:53:31'),
(74, 9, 'manuelFabiano', '8.5', 'Serie molto divertente', '2023-05-11 22:28:39'),
(77, 2, 'Parker1962', '6.5', 'Diciamo che poteva essere fatto meglio', '2023-05-12 11:27:22'),
(78, 16, 'Parker1962', '9.0', 'Questo film è pazzesco, anche se non ci ho capito niente', '2023-05-12 11:29:27');

-- --------------------------------------------------------

--
-- Struttura della tabella `richiesta_inserimento`
--

CREATE TABLE `richiesta_inserimento` (
  `username` varchar(20) NOT NULL,
  `id_scheda` int NOT NULL,
  `data_ora` datetime NOT NULL,
  `risposta` tinyint(1) DEFAULT NULL,
  `moderatore` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `richiesta_inserimento`
--

INSERT INTO `richiesta_inserimento` (`username`, `id_scheda`, `data_ora`, `risposta`, `moderatore`) VALUES
('Giulijia', 9, '2023-04-15 18:31:42', 1, 'manuelFabiano'),
('lauro2001', 11, '2023-04-24 23:14:21', 1, 'luigiVerdi'),
('lauro2001', 23, '2023-05-10 23:55:40', NULL, NULL),
('lauro2001', 24, '2023-05-10 23:58:26', 1, 'MarioMario'),
('manuelFabiano', 6, '2023-04-13 22:26:00', NULL, NULL),
('manuelFabiano', 8, '2023-04-13 22:29:36', 1, 'manuelFabiano'),
('manuelFabiano', 12, '2023-04-26 11:42:57', 0, 'manuelFabiano'),
('manuelFabiano', 13, '2023-04-27 23:32:21', 1, 'manuelFabiano'),
('manuelFabiano', 14, '2023-04-29 00:37:47', 0, 'manuelFabiano'),
('manuelFabiano', 15, '2023-04-29 19:03:57', 0, 'manuelFabiano'),
('manuelFabiano', 16, '2023-05-02 00:40:18', 1, 'manuelFabiano'),
('PaoloM3', 20, '2023-05-06 15:41:01', NULL, NULL),
('schamali_', 25, '2023-05-11 14:46:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `ruolo`
--

CREATE TABLE `ruolo` (
  `persona` varchar(40) NOT NULL,
  `id_scheda` int NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `nome_ruolo` varchar(50) NOT NULL,
  `nome_personaggio` varchar(50) DEFAULT NULL,
  `ordine` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `ruolo`
--

INSERT INTO `ruolo` (`persona`, `id_scheda`, `tipo`, `nome_ruolo`, `nome_personaggio`, `ordine`) VALUES
('Alan Rickman', 1, 0, 'Coprotagonista', 'Severus Piton', NULL),
('Amaury Nolasco', 5, 0, 'Coprotagonista', 'Fernando Sucre', NULL),
('Anna Torv', 8, 0, 'Personaggio secondario', 'Tess', 3),
('Anne Hathaway', 16, 0, 'CoProtagonista', 'Dr. Amelia Brand', 3),
('Barbora Bobuľová', 11, 0, 'Personaggio secondario', 'Vera', 5),
('Bella Ramsey', 8, 0, 'Protagonista', 'Ellie Williams', 2),
('Bradley Cooper', 21, 0, 'Protagonista', 'Rocket (voce)', 6),
('Bradley Cooper', 22, 0, 'Protagonista', 'Rocket', 6),
('Bruce Willis', 13, 0, 'Protagonista', 'Butch Coolidge', 5),
('Casey Affleck', 16, 0, 'Personaggio secondario', 'Tom Cooper', 5),
('Chris Pratt', 21, 0, 'Protagonista', 'Star-Lord', 2),
('Chris Pratt', 22, 0, 'Protagonista', 'Star-Lord', 2),
('Christopher Nolan', 16, 1, 'Regista', NULL, 1),
('Christopher Nolan', 19, 1, 'Regista', NULL, 1),
('Craig Mazin', 8, 1, 'Produttore', NULL, 1),
('Daniel Radcliffe', 1, 0, 'Protagonista', 'Harry Potter', NULL),
('Daniel Radcliffe', 3, 0, 'Protagonista', 'Harry Potter', NULL),
('Daniel Radcliffe', 4, 0, 'Protagonista', 'Harry Potter', 1),
('Dave Bautista', 21, 0, 'Protagonista', 'Drax', 4),
('Dave Bautista', 22, 0, 'Protagonista', 'Drax', 4),
('David Gyasi', 16, 0, 'Personaggio secondario', 'Romilly', 7),
('Dennis Rodman', 24, 0, 'Protagonista', 'Dennis Rodman', 3),
('Dominic Purcell', 5, 0, 'Coprotagonista', 'Lincoln Burrows', NULL),
('Elliot Page', 19, 0, 'CoProtagonista', 'Ariadne', 2),
('Emma Watson', 1, 0, 'Coprotagonista', 'Hermione Granger', NULL),
('Emma Watson', 3, 0, 'Coprotagonista', 'Hermione Granger', NULL),
('Emma Watson', 4, 0, 'Coprotagonista', 'Hermione Granger', 3),
('Gabriel Luna', 8, 0, 'Personaggio secondario', 'Tommy Miller', 5),
('Harry Melling', 1, 0, 'Personaggio secondario', 'Dudley Dursley', NULL),
('James Franco', 2, 0, 'Coprotagonista', 'Harry Osborn', NULL),
('James Gunn', 21, 1, 'Regista', NULL, 1),
('James Gunn', 22, 1, 'Regista', NULL, 1),
('Jeffrey Pierce', 8, 0, 'Personaggio secondario', 'Perry', 5),
('Jessica Chastain', 16, 0, 'CoProtagonista', 'Murphy Cooper', 4),
('John Krasinski', 9, 0, 'Coprotagonista', 'Jim Halpert', 3),
('John Travolta', 13, 0, 'Protagonista', 'Vincent Vega', 2),
('Joseph Gordon-Levitt', 19, 0, 'Personaggio secondario', 'Arthur', 3),
('Karen Gillan', 21, 0, 'Personaggio secondario', 'Nebula', 9),
('Karen Gillan', 22, 0, 'Personaggio secondario', 'Nebula', 8),
('Keivonn Woodard', 8, 0, 'Personaggio secondario', 'Sam Burrell', 7),
('Kristen Dunst ', 2, 0, 'Coprotagonista', 'Mary Jane Watson', NULL),
('Lamar Johnson', 8, 0, 'Personaggio secondario', 'Henry Burrell', 4),
('Lee Pace', 21, 0, 'Antagonista', 'Ronan', 7),
('Leonardo DiCaprio', 19, 0, 'Protagonista', 'Dom Cobb', 1),
('Margherita Buy', 11, 0, 'CoProtagonista', 'Paola', 2),
('Mathieu Amalric', 11, 0, 'Personaggio secondario', 'Pierre', 3),
('Matt Damon', 16, 0, 'Personaggio secondario', 'Mann', 6),
('Matthew McConaughey', 16, 0, 'Protagonista', 'Joseph Cooper', 2),
('Michael Jordan', 24, 0, 'Protagonista', 'Michael Jordan', 1),
('Michael Rooker', 21, 0, 'Personaggio secondario', 'Yondu', 8),
('Michael Rooker', 22, 0, 'CoProtagonista', 'Yondu', 7),
('Nanni Moretti', 11, 1, 'Regista/Protagonista', NULL, 1),
('Neil Druckmann', 8, 1, 'Direttore creativo', NULL, 1),
('Pedro Pascal', 8, 0, 'Protagonista', 'Joel Miller', 1),
('Phil Jackson', 24, 0, 'CoProtagonista', 'Phil Jackson', 5),
('Pom Klementieff', 22, 0, 'CoProtagonista', 'Mantis', 9),
('Quentin Tarantino', 13, 1, 'Regista', NULL, 1),
('Rainn Wilson', 9, 0, 'Protagonista', 'Dwight Schrute', 2),
('Robbie Coltrane', 4, 0, 'Personaggio secondario', 'Rubeus Hagrid', 4),
('Rupert Grint', 1, 0, 'Coprotagonista', 'Ron Weasley', NULL),
('Rupert Grint', 3, 0, 'Coprotagonista', 'Ron Weasley', NULL),
('Rupert Grint', 4, 0, 'Coprotagonista', 'Ron Weasley', 2),
('Samuel L. Jackson', 13, 0, 'Protagonista', 'Jules Winnfield', 3),
('Sarah Wayne Callies', 5, 0, 'Coprotagonista', 'Sara Tancredi', NULL),
('Scottie Pippen', 24, 0, 'Protagonista', 'Scottie Pippen', 2),
('Silvio Orlando', 11, 0, 'Personaggio secondario', 'Ennio', 4),
('Steve Carell', 9, 0, 'Protagonista', 'Michael Scott', 1),
('Steve Kerr', 24, 0, 'CoProtagonista', 'Steve Kerr', 4),
('Tobey Maguire', 2, 0, 'Protagonista', 'Spider-Man', NULL),
('Tom Felton', 1, 0, 'Antagonista', 'Draco Malfoy', NULL),
('Tom Felton', 3, 0, 'Antagonista', 'Draco Malfoy', NULL),
('Tom Hardy', 19, 0, 'Personaggio secondario', 'Eames', 4),
('Uma Thurman', 13, 0, 'Protagonista', 'Mia Wallace', 4),
('Vin Diesel', 21, 0, 'Protagonista', 'Groot (voce)', 5),
('Vin Diesel', 22, 0, 'Protagonista', 'Groot (voce)', 5),
('Wade Williams', 5, 0, 'Coprotagonista', 'Brad Bellick', NULL),
('Wentworth Miller', 5, 0, 'Protagonista', 'Michael Scofield', NULL),
('Willem Dafoe', 2, 0, 'Antagonista', 'Norman Osborn', NULL),
('William Fichtner', 5, 0, 'Coprotagonista', 'Alexander Mahone', NULL),
('Zoe Saldaña', 21, 0, 'Protagonista', 'Gamora', 3),
('Zoe Saldaña', 22, 0, 'Protagonista', 'Gamora', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `scheda`
--

CREATE TABLE `scheda` (
  `id` int NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `media` decimal(3,1) DEFAULT NULL,
  `sinossi` varchar(1000) DEFAULT NULL,
  `tipo` int DEFAULT NULL,
  `uscita` date DEFAULT NULL,
  `durata` varchar(6) DEFAULT NULL,
  `n_stagioni` int DEFAULT NULL,
  `inizio` year DEFAULT NULL,
  `fine` year DEFAULT NULL,
  `colore` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `scheda`
--

INSERT INTO `scheda` (`id`, `titolo`, `media`, `sinossi`, `tipo`, `uscita`, `durata`, `n_stagioni`, `inizio`, `fine`, `colore`) VALUES
(1, 'Harry Potter e la pietra filosofale', '8.5', 'Harry Potter vive con gli zii e il cuginetto sin dalla più tenera età dopo la morte dei suoi genitori. I parenti non lo amano per nulla. Harry sta ormai per compiere undici anni e viene guardato male anche per alcune sue capacità \'magiche\'. Che sono effettive perché Harry è figlio di maghi e comincia a ricevere lettere, regolarmente sequestrate, portate da gufi. Dovrà giungere il gigantesco Hagrid a recapitargliene personalmente una perché possa apprendere di essere stato ammesso a frequentare la Scuola di Magia e Stregoneria di Hogwarts. Gli zii a questo punto non possono far più nulla e Harry raggiunge la Scuola dove apprende che il suo nome è già noto e dove scoprirà di avere naturali doti magiche.', 0, '2001-12-06', '2h 32m', NULL, NULL, NULL, 'blue'),
(2, 'Spider-Man', '7.8', 'Peter Parker è il tipico adolescente sfigato, segretamente innamorato fin da bambino della sua vicina di casa Mary Jane, rimasto orfano dei genitori e che vive con gli zii. Durante una gita scolastica a un laboratorio scientifico Peter viene morso da un ragno geneticamente modificato. Ben presto si renderà conto di non aver più bisogno degli occhiali da vista e di essere in possesso di poteri molto particolari.', 0, '2002-06-07', '2h 1m', NULL, NULL, NULL, 'red'),
(3, 'Harry Potter e la camera dei segreti', '7.0', 'Harry Potter sta trascorrendo noiose vacanze estive presso gli zii, oltretutto senza aver ricevuto nemmeno un messaggio dagli amici Ron e Hermione. Colpa di Dobby, elfo domestico che ha intercettato la posta per convincere il ragazzo a lasciare la scuola di magia di Hogwarts dove lo attenderebbe un terribile pericolo. L\'arrivo all\'accademia coincide in effetti con una serie di strani e paurosi fenomeni: esseri pietrificati, scritte di sangue sui muri e soprattutto l\'accenno a una misteriosa \"camera dei segreti\" che conterrebbe qualcosa di malefico. Quando il pericolo comincerà a riguardare i suoi amici Harry saprà risolvere la situazione.', 0, '2002-12-06', '2h 41m', NULL, NULL, NULL, 'green'),
(4, 'Harry Potter e il prigioniero di Azkaban', '8.0', 'Harry Potter ha tredici anni e deve trascorrere ancora una volta le vacanze estive con i terribili zii Dursley, i suoi unici parenti, che hanno un atteggiamento davvero medioevale nei confronti della magia e vivono nel terrore che qualcuno scopra che il nipote frequenta la Scuola di Magia e Stregoneria di Hogwarts. Tutto fila liscio fino all\'arrivo di zia Marge, la prepotente sorella di zio Vernon, che maltratta talmente tanto Harry da spingerlo \"involontariamente\" a farla gonfiare come un mostruoso pallone che si libra nell\'aria. Temendo di essere punito dagli zii (e da Hogwarts, perchè il Ministero della Magia proibisce severamente agli studenti di usare le arti magiche nel mondo dei Babbani), Harry fugge nella notte...', 0, '2004-06-04', '2h 32m', NULL, NULL, NULL, 'orange'),
(5, 'Prison Break', '9.2', 'Condannato a morte per l\'omicidio di un potente uomo di Washington, Lincoln Burrows si dice vittima di un complotto. L\'unico a credere in lui è il fratello Michael Scofield, ingegnere edile, che ha architettato un piano per farlo evadere, ma per metterlo in pratica deve farsi rinchiudere nello stesso carcere. Da qui inizia una lunga, rocambolesca fuga per la libertà per Michael, suo fratello e gli altri che si uniranno a loro.', 1, NULL, NULL, 5, 2005, 2017, 'blue'),
(6, 'Breaking Bad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(8, 'The Last of Us', '8.5', 'Vent’anni dopo la distruzione della civiltà moderna Joel, uno scaltro sopravvissuto, viene incaricato di far uscire Ellie, una ragazza di 14 anni, da una zona di quarantena sotto stretta sorveglianza. Un compito all’apparenza facile che si trasforma presto in un viaggio brutale e straziante, in cui i due si troveranno a dover attraversare gli Stati Uniti insieme e a dipendere l’uno dall’altra per sopravvivere.', 1, NULL, NULL, 1, 2023, 0000, 'blue'),
(9, 'The Office(US)', '8.5', 'Il direttore regionale della Dunder Mifflin, Michael Scott conduce la troupe del documentario e il suo staff in un viaggio attraverso atteggiamenti sconvenienti, commenti in buona fede ma inappropriati e una miriade di tecniche da dirigente mediocre. Michael non ha idea che i suoi impiegati in realtà lo sopportano a fatica. È convinto di essere il loro guru.', 1, NULL, NULL, 9, 2005, 2012, 'orange'),
(11, 'Il Sol dell\'avvenire', '8.3', 'Giovanni, regista italiano in ambasce tra una moglie in analisi e un produttore sull\'orlo del fallimento, ha smesso di credere nell\'avvenire. A immagine del suo protagonista, figura di prua dell\'Unità e della sezione comunista del Quarticciolo, vuole \'farla finita\' col mondo che avanza in direzione ostinata e contraria: la consorte ha deciso di investire su un giovane regista de-genere, la figlia di sposare un uomo (molto) più vecchio di lei, la sua attrice principale di improvvisare l\'amore in un racconto politico e poi c\'è Netflix che produce cinema in scatola.', 0, '2023-04-20', '1h 36m', NULL, NULL, NULL, 'orange'),
(12, 'Rick e Morty', '10.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Pulp Fiction', '9.2', 'Le vite di due gangster, di un pugile e della moglie di un potente boss della malavita finiscono per intrecciarsi in una paradossale storia di violenza, vendetta e redenzione...', 0, '1994-10-28', '2h 34m', NULL, NULL, NULL, 'red'),
(14, 'prova', '6.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Scream VI', '5.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Interstellar', '9.3', 'In seguito alla scoperta di un cunicolo spazio-temporale, un gruppo di esploratori si avventura in una eroica missione per tentare di superare i limiti della conquista spaziale e oltrepassare le distanze che fino a quel momento avevano reso impraticabili i viaggi interstellari. L\'obiettivo è quello di trovare nuovi luoghi dove coltivare il granoturco, l\'unica coltivazione rimasta dopo un drastico cambiamento climatico che ha colpito soprattutto l\'agricoltura.', 0, '2014-11-06', '2h 28m', NULL, NULL, NULL, 'blue'),
(19, 'Inception', '9.3', 'Dom Cobb possiede una qualifica speciale: è in grado di inserirsi nei sogni altrui per prelevare i segreti nascosti nel più profondo del subconscio. Viene contattato da Saito, un potentissimo industriale di origine giapponese, il quale gli chiede di tentare l\'operazione opposta. Non deve prelevare pensieri celati ma inserire un\'idea che si radichi nella mente di una persona. Costui è Robert Fischer Jr. il quale, alla morte dell\'anziano e dittatoriale genitore, dovrà convincersi che l\'unica cosa che può fare è distruggere l\'impero ereditato. Saito avrà allora campo libero. In cambio offrirà a Cobb la possibilità di rientrare negli Stati Uniti dove è ricercato per omicidio. Cobb accetta e si fa affiancare da un team di cui entra a far parte la giovane Ariane, architetto abilissimo nella costruzione di spazi virtuali.', 0, '2010-09-24', '2h 28m', NULL, NULL, NULL, 'blue'),
(20, 'The Wolf of Wall Street', '8.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Guardiani della Galassia', '9.0', 'L\'audace esploratore Peter Quill è inseguito dai cacciatori di taglie per aver rubato una misteriosa sfera ambita da Ronan, un essere malvagio la cui sfrenata ambizione minaccia l\'intero universo. Per sfuggire all’ostinato Ronan, Quill è costretto a una scomoda alleanza con quattro improbabili personaggi: Rocket, un procione armato; Groot, un umanoide dalle sembianze di un albero; la letale ed enigmatica Gamora e il vendicativo Drax il Distruttore. Ma quando Quill scopre il vero potere della sfera e la minaccia che costituisce per il cosmo, farà di tutto per guidare questa squadra improvvisata in un\'ultima, disperata battaglia per salvare il destino della galassia.', 0, '2014-10-22', '2h 2m', NULL, NULL, NULL, 'blue'),
(22, 'Guardiani della Galassia Vol. 2', '8.5', 'Mentre sono alle prese con il mistero che avvolge le vere origini di Peter Quill, i Guardiani della Galassia dovranno combattere per mantenere unita la propria squadra. Il gruppo di eroi dovrà allearsi con vecchi nemici e potrà contare sull\'aiuto di inaspettati alleati.', 0, '2017-04-25', '2h 17m', NULL, NULL, NULL, 'blue'),
(23, 'L\'Ora Legale', '10.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'The Last Dance', '9.5', 'Questa docuserie racconta come mai prima d\'ora la carriera di Michael Jordan e la storia dei Chicago Bulls degli anni \'90 con filmati inediti della stagione 1997-98.\r\n', 1, NULL, NULL, 1, 2020, 2020, 'red'),
(25, 'Nuovo Cinema Paradiso', '10.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `tag`
--

CREATE TABLE `tag` (
  `label` varchar(30) NOT NULL,
  `id_scheda` int NOT NULL,
  `id_recensione` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `tag`
--

INSERT INTO `tag` (`label`, `id_scheda`, `id_recensione`) VALUES
('', 1, 17),
('', 1, 50),
('avventura', 1, 17),
('avventura', 1, 18),
('avventura', 1, 20),
('effetti_speciali', 1, 18),
('fantasy', 1, 17),
('fantasy', 1, 18),
('fantasy', 1, 20),
('harry', 1, 50),
('infanzia', 1, 17),
('magia', 1, 18),
('natale', 1, 18),
('potter', 1, 50),
('', 2, 41),
('azione', 2, 19),
('azione', 2, 35),
('azione', 2, 41),
('azione', 2, 48),
('azione', 2, 77),
('cinecomic', 2, 19),
('cinecomic', 2, 35),
('cinecomic', 2, 48),
('cinecomic', 2, 77),
('dislike', 2, 60),
('fantascienza', 2, 19),
('fumetti', 2, 41),
('marvel', 2, 19),
('marvel', 2, 48),
('ragno', 2, 48),
('spider-man', 2, 19),
('spiderman', 2, 60),
('superpoteri', 2, 77),
('avventura', 3, 34),
('azione', 3, 34),
('fantasy', 3, 34),
('magia', 3, 34),
('avventura', 4, 29),
('effettispeciali', 4, 29),
('fantasy', 4, 29),
('magia', 4, 29),
('avventura', 5, 23),
('azione', 5, 23),
('azione', 5, 49),
('crime', 5, 23),
('dramma', 5, 23),
('fratelli', 5, 23),
('fuga', 5, 23),
('fuga', 5, 49),
('micheal', 5, 57),
('prigione', 5, 23),
('prigione', 5, 49),
('prigioni', 5, 57),
('prisonbreak', 5, 57),
('thriller', 5, 49),
('', 8, 28),
('amore', 8, 28),
('azione', 8, 28),
('sopravvivenza', 8, 28),
('zombie', 8, 28),
('commedia', 9, 74),
('', 11, 26),
('', 11, 72),
('comunismo', 11, 26),
('Incomunicabilità', 11, 72),
('Italia', 11, 72),
('Moretti', 11, 72),
('NanniMoretti', 11, 26),
('politica', 11, 26),
('sinistra', 11, 26),
('cartoneanimato', 12, 27),
('', 13, 30),
('azione', 13, 30),
('azione', 13, 51),
('jackson', 13, 69),
('pulpfiction', 13, 69),
('Tarantino', 13, 69),
('thurman', 13, 69),
('travolta', 13, 69),
('prova', 14, 31),
('horror', 15, 32),
('', 16, 37),
('', 16, 71),
('amore', 16, 44),
('avventura', 16, 39),
('avventura', 16, 44),
('azione', 16, 39),
('azione', 16, 44),
('famiglia', 16, 44),
('fantascienza', 16, 36),
('fantascienza', 16, 39),
('fisica', 16, 36),
('fisica', 16, 39),
('oscar', 16, 36),
('scienza', 16, 39),
('spazio', 16, 36),
('spazio', 16, 37),
('spazio', 16, 39),
('spazio', 16, 44),
('spazio', 16, 71),
('spazio', 16, 78),
('tempo', 16, 39),
('tempo', 16, 44),
('tempo', 16, 71),
('avventura', 19, 42),
('azione', 19, 42),
('azione', 19, 47),
('fantascienza', 19, 42),
('fantascienza', 19, 47),
('inconscio', 19, 70),
('incubo', 19, 70),
('Nolan', 19, 70),
('sogno', 19, 47),
('sogno', 19, 70),
('suspence', 19, 47),
('thriller', 19, 47),
('commedia', 20, 38),
('soldi', 20, 38),
('wallstreet', 20, 38),
('amicizia', 21, 45),
('avventura', 21, 45),
('avventura', 21, 52),
('azione', 21, 45),
('azione', 21, 52),
('commedia', 21, 52),
('marvel', 21, 45),
('marvel', 21, 52),
('spazio', 21, 45),
('spazio', 21, 52),
('amicizia', 22, 46),
('avventura', 22, 46),
('azione', 22, 46),
('cinecomic', 22, 46),
('commedia', 22, 46),
('marvel', 22, 46),
('spazio', 22, 46),
('comicità', 23, 58),
('ironia', 23, 58),
('sicilia', 23, 58),
('basket', 24, 59),
('bulls', 24, 59),
('jordan', 24, 59),
('cinema', 25, 73),
('Giancaldo', 25, 73),
('Morricone', 25, 73),
('nontornareagiancaldo', 25, 73),
('nostalgia', 25, 73),
('nuovo', 25, 73),
('paradiso', 25, 73),
('Tornatore', 25, 73);

-- --------------------------------------------------------

--
-- Struttura della tabella `trailer`
--

CREATE TABLE `trailer` (
  `label` varchar(30) NOT NULL,
  `id_scheda` int NOT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `trailer`
--

INSERT INTO `trailer` (`label`, `id_scheda`, `link`) VALUES
('Trailer Fan-Made', 5, 'https://www.youtube.com/embed/AL9zLctDJaU?autoplay=1&mute=1'),
('Trailer', 3, 'https://www.youtube.com/embed/cbhVaQv-aNU?autoplay=1&mute=1'),
('Trailer Netflix', 24, 'https://www.youtube.com/embed/DFwkr9ffVMQ?autoplay=1&mute=1'),
('Trailer ITA', 19, 'https://www.youtube.com/embed/gzhcWpzUUIg?autoplay=1&mute=1'),
('Trailer 1', 4, 'https://www.youtube.com/embed/IhtRswxOn9Q?autoplay=1&mute=1'),
('Best moments', 9, 'https://www.youtube.com/embed/lv4Qv9dLu-U?autoplay=1&mute=1'),
('Trailer ITA', 13, 'https://www.youtube.com/embed/mg0GqZmoM9M?autoplay=1&mute=1'),
('Trailer ITA', 21, 'https://www.youtube.com/embed/PYcgR4iP8r8'),
('Teaser ITA', 8, 'https://www.youtube.com/embed/qjdL9O0LJfU?&mute=1'),
('Trailer', 1, 'https://www.youtube.com/embed/rQLfqdLZ49A?autoplay=1&mute=1'),
('Trailer HD', 2, 'https://www.youtube.com/embed/t06RUxPbp_c?autoplay=1&mute=1'),
('Trailer Ufficiale', 11, 'https://www.youtube.com/embed/Tj2SzXLyADw?autoplay=1&mute=1'),
('Trailer HBO', 8, 'https://www.youtube.com/embed/uLtkt8BonwM?autoplay=1&mute=1'),
('Trailer ITA', 22, 'https://www.youtube.com/embed/zRmvEVSfElw?autoplay=1&mute=1'),
('Trailer WB', 16, 'https://www.youtube.com/embed/zSWdZVtXT7E?autoplay=1&mute=1');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `commento`
--
ALTER TABLE `commento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `id_recensione` (`id_recensione`);

--
-- Indici per le tabelle `da_vedere`
--
ALTER TABLE `da_vedere`
  ADD PRIMARY KEY (`username`,`id_scheda`),
  ADD KEY `id_scheda` (`id_scheda`);

--
-- Indici per le tabelle `locandina`
--
ALTER TABLE `locandina`
  ADD PRIMARY KEY (`percorso_immagine`,`id_scheda`) USING BTREE,
  ADD UNIQUE KEY `percorso_immagine` (`percorso_immagine`),
  ADD KEY `id_scheda` (`id_scheda`);

--
-- Indici per le tabelle `mi_piace`
--
ALTER TABLE `mi_piace`
  ADD PRIMARY KEY (`username`,`id_recensione`),
  ADD KEY `id_recensione` (`id_recensione`);

--
-- Indici per le tabelle `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_scheda` (`id_scheda`,`username`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `richiesta_inserimento`
--
ALTER TABLE `richiesta_inserimento`
  ADD PRIMARY KEY (`username`,`id_scheda`),
  ADD KEY `richiesta_inserimento_ibfk_1` (`id_scheda`);

--
-- Indici per le tabelle `ruolo`
--
ALTER TABLE `ruolo`
  ADD PRIMARY KEY (`persona`,`id_scheda`),
  ADD KEY `id_scheda` (`id_scheda`);

--
-- Indici per le tabelle `scheda`
--
ALTER TABLE `scheda`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`label`,`id_scheda`,`id_recensione`),
  ADD KEY `id_scheda` (`id_scheda`),
  ADD KEY `id_recensione` (`id_recensione`);

--
-- Indici per le tabelle `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`link`,`id_scheda`) USING BTREE,
  ADD KEY `id_scheda` (`id_scheda`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `commento`
--
ALTER TABLE `commento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT per la tabella `scheda`
--
ALTER TABLE `scheda`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `commento`
--
ALTER TABLE `commento`
  ADD CONSTRAINT `commento_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commento_ibfk_2` FOREIGN KEY (`id_recensione`) REFERENCES `recensione` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `da_vedere`
--
ALTER TABLE `da_vedere`
  ADD CONSTRAINT `da_vedere_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `da_vedere_ibfk_2` FOREIGN KEY (`id_scheda`) REFERENCES `scheda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `locandina`
--
ALTER TABLE `locandina`
  ADD CONSTRAINT `locandina_ibfk_1` FOREIGN KEY (`id_scheda`) REFERENCES `scheda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `mi_piace`
--
ALTER TABLE `mi_piace`
  ADD CONSTRAINT `mi_piace_ibfk_1` FOREIGN KEY (`id_recensione`) REFERENCES `recensione` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mi_piace_ibfk_2` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `recensione_ibfk_1` FOREIGN KEY (`id_scheda`) REFERENCES `scheda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recensione_ibfk_2` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `richiesta_inserimento`
--
ALTER TABLE `richiesta_inserimento`
  ADD CONSTRAINT `richiesta_inserimento_ibfk_1` FOREIGN KEY (`id_scheda`) REFERENCES `scheda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `richiesta_inserimento_ibfk_2` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `ruolo`
--
ALTER TABLE `ruolo`
  ADD CONSTRAINT `ruolo_ibfk_1` FOREIGN KEY (`id_scheda`) REFERENCES `scheda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ruolo_ibfk_2` FOREIGN KEY (`persona`) REFERENCES `persona` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`id_scheda`) REFERENCES `scheda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_ibfk_2` FOREIGN KEY (`id_recensione`) REFERENCES `recensione` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `trailer`
--
ALTER TABLE `trailer`
  ADD CONSTRAINT `trailer_ibfk_1` FOREIGN KEY (`id_scheda`) REFERENCES `scheda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
