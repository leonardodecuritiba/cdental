-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2017 at 10:02 AM
-- Server version: 10.1.25-MariaDB-1~xenial
-- PHP Version: 7.1.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdental`
--

-- --------------------------------------------------------

--
-- Table structure for table `anamnese`
--

CREATE TABLE `anamnese` (
  `idanamnese` int(10) UNSIGNED NOT NULL,
  `idprofissional_criador` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anamnese`
--

INSERT INTO `anamnese` (`idanamnese`, `idprofissional_criador`, `nome`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Principal', '2017-03-28 13:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cheques`
--

CREATE TABLE `cheques` (
  `id` int(10) UNSIGNED NOT NULL,
  `idplano` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `banco` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numeracao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `destino` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cheques`
--

INSERT INTO `cheques` (`id`, `idplano`, `nome`, `data`, `valor`, `banco`, `numeracao`, `destino`, `created_at`, `updated_at`) VALUES
(9, 2, 'Dr. Emanuel Branco', '2017-07-14', '250.00', 'vel', '90973249', 'ullam269', '2017-07-14 18:37:56', '2017-10-04 13:01:06'),
(10, 2, 'Norma Ketlin Furtado Sobrinho', '2017-07-14', '300.00', 'maxime', '68303469', 'soluta267', '2017-07-14 18:39:08', '2017-10-04 13:01:06'),
(11, 4, 'Isaac Teles Jr.', '2017-07-12', '320.00', 'rerum', '51514688', 'consequatur431', '2017-07-14 18:40:51', '2017-10-04 13:01:06'),
(12, 2, 'Estêvão Corona Valentin Neto', '2017-07-10', '300.00', 'dolor', '90286074', 'facere535', '2017-07-14 18:41:55', '2017-10-04 13:01:06'),
(13, 3, 'Dr. Giovana Isabella Teles Jr.', '2017-07-10', '1142.95', 'labore', '51822917', 'doloremque915', '2017-07-14 18:42:40', '2017-10-04 13:01:06'),
(14, 4, 'Ivana Violeta Urias', '2017-07-11', '1750.00', 'magni', '14082164', 'harum549', '2017-07-14 18:43:32', '2017-10-04 13:01:06'),
(15, 3, 'Alessandra Azevedo', '2017-07-18', '1000.00', 'dolorem', '97903307', 'aspernatur162', '2017-07-18 17:03:58', '2017-10-04 13:01:06'),
(16, 2, 'Sr. Agostinho Franco Medina Sobrinho', '2018-02-15', '1075.00', 'laudantium', '89603498', 'consequatur653', '2017-08-01 21:55:57', '2017-10-04 13:01:06'),
(17, 2, 'Sra. Daniela Michele Delatorre Sobrinho', '2018-01-15', '1075.00', 'saepe', '45380457', 'dolores868', '2017-08-01 21:56:41', '2017-10-04 13:01:06'),
(18, 2, 'Dr. Valentin Gabriel Pedrosa Neto', '2017-12-15', '1075.00', 'a', '97388870', 'consequatur166', '2017-08-01 21:57:26', '2017-10-04 13:01:06'),
(19, 2, 'Sr. Teobaldo David Branco Jr.', '2017-11-15', '1075.00', 'porro', '91516768', 'facere535', '2017-08-01 21:58:05', '2017-10-04 13:01:06'),
(20, 2, 'Horácio Kevin Azevedo', '2017-09-15', '1075.00', 'asperiores', '59963352', 'reiciendis937', '2017-08-01 21:58:38', '2017-10-04 13:01:06'),
(21, 2, 'Luara Zamana Teles', '2017-10-15', '1075.00', 'quos', '41591419', 'nihil587', '2017-08-01 21:59:14', '2017-10-04 13:01:07'),
(22, 2, 'Clara Rocha Branco Filho', '2017-08-15', '3000.00', 'perferendis', '84023971', 'vel753', '2017-08-01 21:59:50', '2017-10-04 13:01:07'),
(23, 4, 'Fernando Reis Filho', '2017-08-01', '1714.50', 'et', '7964156', 'maiores995', '2017-08-01 22:01:44', '2017-10-04 13:01:07'),
(24, 3, 'Maximiano Sérgio Mendes', '2017-08-03', '360.00', 'illo', '11348157', 'suscipit666', '2017-08-04 17:02:20', '2017-10-04 13:01:07'),
(25, 3, 'Dr. Alma Mia Torres Jr.', '2017-10-08', '360.00', 'ipsam', '53195450', 'laudantium930', '2017-08-04 17:03:09', '2017-10-04 13:01:07'),
(26, 3, 'Sra. Daniela Natália Mendonça Neto', '2017-08-04', '360.00', 'ipsum', '64458254', 'ex514', '2017-08-04 17:03:38', '2017-10-04 13:01:07'),
(27, 2, 'Srta. Josefina Ariadna Tamoio', '2017-09-15', '1000.00', 'inventore', '29352160', 'odio129', '2017-08-23 13:00:54', '2017-10-04 13:01:07'),
(28, 2, 'Dr. Samanta Lutero Neto', '2017-12-15', '1000.00', 'aut', '64098443', 'ratione337', '2017-08-23 13:02:18', '2017-10-04 13:01:07'),
(29, 2, 'Gabriel Delatorre Soares Filho', '2018-01-15', '1000.00', 'delectus', '77266700', 'ut876', '2017-08-23 13:03:29', '2017-10-04 13:01:07'),
(30, 3, 'Elias Azevedo Pereira Neto', '2017-09-15', '1000.00', 'facere', '11307462', 'cum866', '2017-09-15 15:43:48', '2017-10-04 13:01:07'),
(31, 2, 'Dr. Thiago Cordeiro Sandoval Sobrinho', '2017-09-10', '500.00', 'eum', '33994746', 'reprehenderit132', '2017-09-22 14:15:15', '2017-10-04 13:01:07'),
(32, 2, 'Miguel Rodrigues Jr.', '2017-10-11', '547.00', 'in', '41716450', 'reprehenderit48', '2017-09-22 14:16:06', '2017-10-04 13:01:07'),
(33, 2, 'Paula Grego Filho', '2017-11-05', '547.00', 'molestiae', '41805303', 'enim761', '2017-09-22 14:16:36', '2017-10-04 13:01:07'),
(34, 2, 'Sra. Olívia Pedrosa Campos', '2017-11-15', '547.00', 'earum', '11153200', 'et433', '2017-09-22 14:17:10', '2017-10-04 13:01:07'),
(35, 2, 'Srta. Sofia Marques Grego Filho', '2017-09-20', '625.00', 'deleniti', '10144401', 'placeat579', '2017-09-22 14:18:17', '2017-10-04 13:01:07'),
(36, 3, 'Samuel Fernandes de Souza Jr.', '2017-10-05', '1200.00', 'voluptas', '96290162', 'voluptatem546', '2017-09-29 15:18:20', '2017-10-04 13:01:07'),
(37, 3, 'Sr. Leandro Ortega Rico', '2017-11-05', '530.00', 'quaerat', '41752078', 'ullam68', '2017-09-29 15:22:56', '2017-10-04 13:01:07'),
(38, 3, 'Abgail Valentina Marés', '2017-12-05', '530.00', 'consequuntur', '52217556', 'corrupti369', '2017-09-29 15:24:47', '2017-10-04 13:01:07'),
(39, 3, 'Sra. Miranda Daniela Duarte Filho', '2018-01-05', '530.00', 'est', '93269671', 'aut852', '2017-09-29 15:25:36', '2017-10-04 13:01:07'),
(40, 3, 'Miguel Salgado Brito Filho', '2017-09-29', '530.00', 'sit', '27978751', 'modi639', '2017-09-29 15:26:53', '2017-10-04 13:01:07'),
(41, 4, 'Dante Ferminiano Salgado', '2017-09-27', '600.00', 'non', '11790992', 'laudantium912', '2017-09-29 15:28:15', '2017-10-04 13:01:07'),
(42, 4, 'Dante Eduardo Ferreira Filho', '2017-09-26', '395.00', 'consectetur', '66286223', 'provident878', '2017-09-29 15:29:03', '2017-10-04 13:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `clinica`
--

CREATE TABLE `clinica` (
  `idclinica` int(10) UNSIGNED NOT NULL,
  `idresponsavel` int(10) UNSIGNED NOT NULL,
  `idcontato` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clinica`
--

INSERT INTO `clinica` (`idclinica`, `idresponsavel`, `idcontato`, `nome`, `email`, `foto`, `cnpj`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 'Consultório Odontológico Dr. Dolittle', 'drdolittle@cdental.com', NULL, '45456054566', '2017-01-01 12:00:00', '2017-05-02 14:01:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consulta`
--

CREATE TABLE `consulta` (
  `idconsulta` int(10) UNSIGNED NOT NULL,
  `idprofissional_criador` int(10) UNSIGNED NOT NULL,
  `idprofissional` int(10) UNSIGNED NOT NULL,
  `idpaciente` int(10) UNSIGNED DEFAULT NULL,
  `data_consulta` date NOT NULL,
  `dia_inteiro` tinyint(1) NOT NULL DEFAULT '0',
  `hora_inicio` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `hora_termino` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `observacao` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_consulta` enum('Atendimento','Cirurgia','Emergência','Retorno') COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `consulta`
--

INSERT INTO `consulta` (`idconsulta`, `idprofissional_criador`, `idprofissional`, `idpaciente`, `data_consulta`, `dia_inteiro`, `hora_inicio`, `hora_termino`, `observacao`, `tipo_consulta`, `nome`, `telefone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 1, NULL, '2017-04-28', 0, '18:00', '19:00', '', 'Atendimento', 'Joao da Silva', '985888888', '2017-04-28 19:47:49', '2017-04-28 19:47:49', NULL),
(4, 1, 1, NULL, '2017-05-02', 0, '15:00', '16:00', 'Dor dente', 'Atendimento', 'Joaozinho', '98754754', '2017-05-02 15:34:05', '2017-05-02 15:34:05', NULL),
(5, 1, 1, NULL, '2017-05-03', 0, '15:00', '16:00', '', 'Atendimento', 'Joao da Silva', '5498485455', '2017-05-02 15:34:43', '2017-05-02 15:34:43', NULL),
(6, 1, 1, 1, '2017-05-11', 0, '16:00', '17:00', '', 'Atendimento', '', '', '2017-05-04 13:44:29', '2017-05-04 13:44:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contato`
--

CREATE TABLE `contato` (
  `idcontato` int(10) UNSIGNED NOT NULL,
  `cep` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(72) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(72) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comercial` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contato`
--

INSERT INTO `contato` (`idcontato`, `cep`, `estado`, `cidade`, `bairro`, `logradouro`, `complemento`, `telefone`, `comercial`, `celular`, `email`, `facebook`, `created_at`, `updated_at`) VALUES
(1, '51568889', 'RO', 'Santa Carlos d\'Oeste', 'Rua Máximo', 'Avenida Maximiano Sanches', 'dolorum', '2932345067', '5131430338', '89904597695', 'antonio94@example.net', NULL, '2017-01-01 12:00:00', '2017-10-04 13:01:03'),
(2, '36329997', 'AM', 'Andrea do Leste', 'Avenida Abgail Ortiz', 'Travessa Eduardo', 'est', '4220990664', '3429193191', '36924932844', 'ziraldo97@example.com', NULL, '2017-01-01 12:00:00', '2017-10-04 13:01:03'),
(3, '86376508', 'AM', 'Martines d\'Oeste', 'Travessa Rafael', 'Av. Ketlin', 'vero', '2224809329', '4132830678', '53904821191', 'julia96@example.com', NULL, '2017-01-01 12:00:00', '2017-10-04 13:01:03'),
(4, '1301675', 'PI', 'São Luis', 'R. Hugo Madeira', 'Largo Samuel', 'id', '8435504936', '6437354775', '94972132166', 'elias33@example.net', NULL, '2017-03-29 03:06:57', '2017-10-04 13:01:03'),
(6, '72510833', 'PR', 'São João', 'R. Valência', 'R. Nádia', 'numquam', '8937772916', '8626056735', '38953208726', 'isabel91@example.org', NULL, '2017-03-31 10:56:21', '2017-10-04 13:01:03'),
(7, '57992258', 'PA', 'Porto Joana', 'Avenida Pedro Martines', 'Travessa Carla Flores', 'sed', '2635472428', '2132578108', '58978190308', 'renata.perez@example.org', NULL, '2017-05-04 19:20:18', '2017-10-04 13:01:03'),
(8, '41296807', 'MG', 'São Renata do Leste', 'Largo Ferminiano', 'Travessa João Domingues', 'sint', '3135823031', '4834668979', '51940647485', 'valeria59@example.org', NULL, '2017-05-05 18:58:39', '2017-10-04 13:01:03'),
(9, '87996006', 'AP', 'Sandoval do Leste', 'Av. Natal Vasques', 'Rua Maitê', 'molestias', '5236299139', '5520042148', '36911449836', 'camila81@example.net', NULL, '2017-05-05 19:07:58', '2017-10-04 13:01:03'),
(10, '9119263', 'MA', 'Faro do Sul', 'Largo Samuel Campos', 'Rua Feliciano', 'et', '5222562893', '8327836114', '67953472521', 'oflores@example.org', NULL, '2017-05-09 16:51:11', '2017-10-04 13:01:03'),
(11, '9612393', 'RR', 'Hugo do Sul', 'Av. Clara Toledo', 'Rua Bianca', 'sunt', '8837791080', '3635370485', '31981207752', 'thales62@example.com', NULL, '2017-05-09 17:32:11', '2017-10-04 13:01:03'),
(12, '20341764', 'RN', 'Vila Simão', 'Travessa Vale', 'Av. Gomes', 'magni', '6837473330', '3835847728', '49987781181', 'davila.cristovao@example.com', NULL, '2017-05-12 13:49:46', '2017-10-04 13:01:04'),
(13, '51426226', 'ES', 'Constância d\'Oeste', 'R. Mel Rangel', 'Largo Vicente Rosa', 'nihil', '8329290706', '4727196739', '47925861431', 'rafaela.quintana@example.com', NULL, '2017-05-16 18:01:03', '2017-10-04 13:01:04'),
(14, '88264517', 'PE', 'Vila Guilherme do Leste', 'Travessa Samanta', 'Avenida Batista', 'veniam', '2130931470', '2438977273', '91962671109', 'qabreu@example.com', NULL, '2017-05-16 18:01:46', '2017-10-04 13:01:04'),
(15, '52711978', 'PB', 'Santa Paulina do Sul', 'Travessa Nádia', 'Travessa Jasmin Serra', 'sint', '5428511088', '3922387832', '79985943033', 'olivia79@example.net', NULL, '2017-05-18 17:26:20', '2017-10-04 13:01:04'),
(16, '5533981', 'TO', 'Santa Fabiana do Sul', 'Av. Mateus', 'Av. Miranda Rico', 'eveniet', '4525093604', '4537725276', '62910157344', 'tfidalgo@example.org', NULL, '2017-05-18 17:37:23', '2017-10-04 13:01:04'),
(17, '18280324', 'RN', 'Sabrina do Norte', 'R. Gil', 'Travessa Sepúlveda', 'amet', '3833058543', '9933481738', '74905830467', 'alan.salgado@example.com', NULL, '2017-05-26 13:23:16', '2017-10-04 13:01:04'),
(18, '25221665', 'SE', 'Vila Samuel', 'Av. Ortega', 'Avenida Martines', 'est', '7825090200', '1831057160', '77932128760', 'luciana.sandoval@example.org', NULL, '2017-05-30 17:11:53', '2017-10-04 13:01:04'),
(19, '83253800', 'AM', 'Mel do Sul', 'Avenida de Oliveira', 'Travessa Carolina Fidalgo', 'qui', '2136760315', '4620506426', '63924662351', 'burgos.rodrigo@example.net', NULL, '2017-05-30 18:16:34', '2017-10-04 13:01:04'),
(20, '50660303', 'PB', 'Josefina d\'Oeste', 'Rua Rebeca', 'R. D\'ávila', 'sapiente', '1423061149', '4423995218', '74972362566', 'nadia.rocha@example.net', NULL, '2017-06-01 18:11:12', '2017-10-04 13:01:04'),
(21, '52006284', 'RO', 'Pâmela do Sul', 'Avenida Luciano', 'Rua Silvana Paes', 'sed', '8539458272', '4133979996', '58984574262', 'tmadeira@example.net', NULL, '2017-06-02 13:52:53', '2017-10-04 13:01:04'),
(22, '58634116', 'GO', 'Santa Gustavo do Sul', 'Av. João', 'Av. Francisco', 'distinctio', '3531056981', '6634763054', '31936426804', 'yoliveira@example.com', NULL, '2017-06-02 17:39:35', '2017-10-04 13:01:04'),
(23, '97852252', 'AC', 'Gil do Sul', 'Av. Quintana', 'Avenida Sérgio Lovato', 'voluptas', '2724301946', '8137905655', '26918006012', 'michele35@example.com', NULL, '2017-06-02 20:52:50', '2017-10-04 13:01:04'),
(24, '15770176', 'AL', 'Vieira do Sul', 'Travessa Jácomo', 'Av. Benjamin Vega', 'et', '4231085195', '8623474642', '81992904118', 'silvana.soto@example.org', NULL, '2017-06-06 13:13:07', '2017-10-04 13:01:04'),
(25, '79263074', 'TO', 'Santa Nicole do Norte', 'Largo Santiago', 'Travessa Catarina', 'nam', '3224790910', '7435984986', '43911553242', 'cmendes@example.com', NULL, '2017-06-06 14:14:43', '2017-10-04 13:01:04'),
(26, '90508454', 'TO', 'de Souza do Sul', 'Rua Irene', 'Largo Samuel', 'maxime', '7628977390', '8935607007', '32992376083', 'xdacruz@example.com', NULL, '2017-06-06 18:53:55', '2017-10-04 13:01:04'),
(27, '8223651', 'PA', 'Urias do Norte', 'Rua Maximiano', 'Largo Pontes', 'labore', '9931838816', '7932423319', '32941695928', 'ferreira.tabata@example.net', NULL, '2017-06-08 17:25:22', '2017-10-04 13:01:04'),
(28, '84648646', 'ES', 'Santa Joana do Norte', 'Avenida Benjamin', 'Rua Branco', 'natus', '2637356802', '3530814187', '52900859015', 'joao.franco@example.org', NULL, '2017-06-09 19:00:52', '2017-10-04 13:01:04'),
(29, '48925467', 'CE', 'Porto Gian', 'Rua Pâmela', 'Largo Escobar', 'sunt', '5626310586', '1126970713', '99938921710', 'dante.domingues@example.com', NULL, '2017-06-14 12:54:06', '2017-10-04 13:01:04'),
(30, '81369471', 'SE', 'Fernandes do Sul', 'Travessa Padilha', 'Avenida Clara Zambrano', 'facilis', '3135956833', '2620431589', '15985580123', 'ssantacruz@example.org', NULL, '2017-06-22 20:13:02', '2017-10-04 13:01:04'),
(31, '12505815', 'SC', 'São Adriano do Sul', 'Rua Luciano', 'Rua Horácio Uchoa', 'impedit', '5829251225', '9321399783', '27932501653', 'norma32@example.org', NULL, '2017-06-27 12:00:55', '2017-10-04 13:01:04'),
(32, '19712668', 'ES', 'Amanda do Sul', 'R. Ana Maia', 'Largo Rodrigo Espinoza', 'labore', '3422588205', '1537798510', '87958306613', 'hugo06@example.net', NULL, '2017-06-27 18:28:37', '2017-10-04 13:01:04'),
(33, '58940817', 'MG', 'Marques do Sul', 'Largo Miranda Ortega', 'Rua Elias Romero', 'voluptas', '7234607096', '4820320963', '45994311286', 'ecaldeira@example.org', NULL, '2017-07-04 14:06:28', '2017-10-04 13:01:04'),
(34, '99782257', 'RS', 'Giovane d\'Oeste', 'Travessa Gustavo', 'Largo Molina', 'eligendi', '8923821587', '4532230409', '39904343741', 'alessandra.galvao@example.com', NULL, '2017-07-06 18:02:27', '2017-10-04 13:01:05'),
(35, '57828973', 'MG', 'Luis do Leste', 'Avenida Delatorre', 'Rua Demian Sandoval', 'est', '1933988625', '1430067182', '53923167829', 'thiago.deaguiar@example.org', NULL, '2017-07-06 18:20:47', '2017-10-04 13:01:05'),
(36, '66335842', 'BA', 'de Souza do Norte', 'Av. Amélia', 'Largo Malena Correia', 'velit', '9735048094', '6521894311', '53924725722', 'ramires.jacomo@example.com', NULL, '2017-07-07 13:17:32', '2017-10-04 13:01:05'),
(37, '76958364', 'DF', 'Porto Silvana do Sul', 'R. Queirós', 'Rua Salas', 'ad', '6526775527', '7931789517', '52941533379', 'eespinoza@example.net', NULL, '2017-07-12 10:49:39', '2017-10-04 13:01:05'),
(38, '97781306', 'AM', 'Vila Kevin', 'Travessa Rebeca', 'Travessa Sérgio Meireles', 'tenetur', '5429274938', '6921508489', '79902513393', 'qdominato@example.org', NULL, '2017-07-13 19:14:18', '2017-10-04 13:01:05'),
(39, '72145507', 'AP', 'Fábio do Norte', 'R. de Souza', 'Av. Micaela', 'et', '5627950915', '1426020223', '13961333148', 'camila.cordeiro@example.com', NULL, '2017-07-18 14:15:35', '2017-10-04 13:01:05'),
(40, '93243558', 'MS', 'Sophie d\'Oeste', 'Largo Verdara', 'R. da Silva', 'unde', '5721152729', '3930205142', '92937987824', 'wrico@example.com', NULL, '2017-07-18 16:57:24', '2017-10-04 13:01:05'),
(41, '72623414', 'DF', 'Porto Thalissa', 'Av. Emílio Cruz', 'Rua Carrara', 'accusantium', '3530820658', '1726526454', '26911400131', 'valdez.fabiana@example.org', NULL, '2017-07-27 19:48:55', '2017-10-04 13:01:05'),
(42, '20629825', 'CE', 'São Máximo', 'R. Maldonado', 'R. Natal Urias', 'quaerat', '8723952698', '6328501959', '26999219223', 'egodoi@example.org', NULL, '2017-08-01 18:24:54', '2017-10-04 13:01:05'),
(43, '56277060', 'AM', 'Valentin d\'Oeste', 'Travessa Madalena Balestero', 'Rua Grego', 'doloremque', '3621694163', '3136624070', '34957325734', 'fvalencia@example.com', NULL, '2017-08-01 19:56:40', '2017-10-04 13:01:05'),
(44, '29475135', 'AP', 'José do Norte', 'R. Thalissa Padrão', 'Rua Renata Soto', 'neque', '6127263580', '4420419257', '12960236329', 'benjamin52@example.org', NULL, '2017-08-03 18:30:29', '2017-10-04 13:01:05'),
(45, '6446956', 'SE', 'Valéria do Norte', 'R. Felipe da Cruz', 'Largo Bianca', 'facilis', '8730735090', '2426495559', '87938045848', 'vescobar@example.com', NULL, '2017-08-03 19:37:26', '2017-10-04 13:01:05'),
(46, '61811546', 'MA', 'Prado do Sul', 'Av. Andres', 'Rua Ketlin', 'nemo', '2232859305', '6130027758', '55935189332', 'qbezerra@example.org', NULL, '2017-08-04 18:01:20', '2017-10-04 13:01:05'),
(47, '69733507', 'SP', 'Porto Júlia', 'Travessa Carlos Serrano', 'Rua Isabel Ferreira', 'est', '2939960575', '1328027293', '21929712051', 'beatriz57@example.com', NULL, '2017-08-15 14:57:28', '2017-10-04 13:01:05'),
(48, '95924229', 'ES', 'Sebastião do Sul', 'Largo Lutero', 'R. Taís Gusmão', 'numquam', '6422338455', '1737122006', '78930129002', 'kevin.fernandes@example.org', NULL, '2017-08-18 13:08:07', '2017-10-04 13:01:05'),
(49, '15587811', 'CE', 'Porto Constância', 'Rua Ornela', 'Av. Carrara', 'aut', '4135613412', '4429149069', '26906979754', 'aaron74@example.org', NULL, '2017-08-22 17:56:53', '2017-10-04 13:01:05'),
(50, '29644913', 'RN', 'Vila Luis d\'Oeste', 'Largo Carla Ferreira', 'Travessa Antonieta', 'consequatur', '5923227117', '5432337345', '81920996285', 'juliana80@example.com', NULL, '2017-08-22 20:50:31', '2017-10-04 13:01:05'),
(51, '2869149', 'RJ', 'Vila Josefina', 'R. Godói', 'Rua Vitória', 'animi', '3731619572', '5527536409', '49999672271', 'ymaia@example.net', NULL, '2017-08-22 20:50:46', '2017-10-04 13:01:05'),
(52, '95514309', 'MG', 'Noel do Sul', 'Travessa Isabella Azevedo', 'Av. Pereira', 'eum', '6526492363', '7131835887', '44947526662', 'mariana.dacruz@example.org', NULL, '2017-08-24 12:57:09', '2017-10-04 13:01:06'),
(53, '27189306', 'ES', 'Santa Adriana', 'Rua Roque', 'Rua Salgado', 'quibusdam', '2839976956', '1333331371', '28979281866', 'dtorres@example.org', NULL, '2017-09-19 21:40:54', '2017-10-04 13:01:06'),
(54, '82716054', 'RR', 'Lutero do Sul', 'Travessa Silvana Valência', 'Avenida Mia', 'provident', '5832194312', '7826746025', '74990510656', 'smeireles@example.com', NULL, '2017-09-21 19:19:40', '2017-10-04 13:01:06'),
(55, '69803197', 'RO', 'Sepúlveda do Sul', 'Avenida Meireles', 'Avenida Fabiana', 'molestiae', '7934327058', '2934786668', '79965745001', 'isabella86@example.org', NULL, '2017-09-21 19:46:51', '2017-10-04 13:01:06'),
(56, '64266069', 'PE', 'de Souza d\'Oeste', 'Rua Emílio', 'Travessa Ivana', 'ipsa', '7234400911', '7435329532', '25982464126', 'tamoio.noel@example.net', NULL, '2017-09-21 19:51:45', '2017-10-04 13:01:06'),
(57, '76300567', 'SE', 'São Alexandre', 'Av. Martines', 'Largo Paes', 'quia', '9827709167', '5724385919', '94997957840', 'joao.gil@example.org', NULL, '2017-09-26 14:48:49', '2017-10-04 13:01:06'),
(58, '31712206', 'MT', 'Luana d\'Oeste', 'R. Marin', 'Largo Giovane Brito', 'ea', '3732873023', '7320789565', '43923553983', 'simao.fontes@example.com', NULL, '2017-09-27 18:17:57', '2017-10-04 13:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `evolucao`
--

CREATE TABLE `evolucao` (
  `idevolucao` int(10) UNSIGNED NOT NULL,
  `idprofissional_criador` int(10) UNSIGNED NOT NULL,
  `idpaciente` int(10) UNSIGNED NOT NULL,
  `data_evolucao` date NOT NULL,
  `texto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evolucao`
--

INSERT INTO `evolucao` (`idevolucao`, `idprofissional_criador`, `idpaciente`, `data_evolucao`, `texto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 2, '2017-05-05', 'Error omnis asperiores nesciunt ab qui aut.', '2017-05-05 19:00:40', '2017-10-04 13:01:08', NULL),
(6, 1, 3, '2017-05-05', 'Omnis corporis in quibusdam modi.', '2017-05-05 19:38:18', '2017-10-04 13:01:08', NULL),
(7, 1, 4, '2017-05-05', 'Saepe dolor et voluptatum ipsum voluptatum sit officiis.', '2017-05-09 16:52:16', '2017-10-04 13:01:08', NULL),
(8, 1, 4, '2017-04-28', 'Enim distinctio sed accusamus necessitatibus.', '2017-05-09 16:53:07', '2017-10-04 13:01:08', NULL),
(9, 1, 4, '2017-04-21', 'Non aut autem earum illo consequatur.', '2017-05-09 16:53:59', '2017-10-04 13:01:08', NULL),
(10, 1, 5, '2017-05-02', 'Qui dolorem enim et et nobis distinctio.', '2017-05-09 17:33:10', '2017-10-04 13:01:08', NULL),
(11, 1, 4, '2017-05-12', 'Qui deleniti dignissimos amet sed tempora minus.', '2017-05-12 13:27:43', '2017-10-04 13:01:08', NULL),
(12, 1, 6, '2014-08-20', 'Aut cupiditate et modi et quia.', '2017-05-12 14:07:23', '2017-10-04 13:01:08', NULL),
(13, 1, 7, '2017-05-16', 'Autem voluptas quas voluptas ea quia aut ut.', '2017-05-16 18:02:13', '2017-10-04 13:01:08', NULL),
(14, 1, 8, '2017-05-18', 'Quae a totam tempora rerum.', '2017-05-18 17:27:03', '2017-10-04 13:01:08', NULL),
(15, 1, 6, '2017-05-26', 'Architecto voluptas iusto odit totam nihil illo dolores est.', '2017-05-26 13:17:49', '2017-10-04 13:01:08', NULL),
(16, 1, 10, '2017-05-26', 'Quasi ut quisquam sunt ut sint suscipit quibusdam.', '2017-05-26 13:43:46', '2017-10-04 13:01:08', NULL),
(17, 1, 14, '2017-06-02', 'Ab iure omnis eum voluptate.', '2017-06-02 13:53:21', '2017-10-04 13:01:08', NULL),
(18, 1, 16, '2017-06-02', 'Recusandae error itaque in corrupti enim.', '2017-06-02 20:53:52', '2017-10-04 13:01:08', NULL),
(20, 1, 18, '2016-11-18', 'Placeat numquam non quaerat minus quibusdam.', '2017-06-06 14:19:05', '2017-10-04 13:01:08', NULL),
(21, 1, 19, '2017-06-06', 'Non exercitationem et quos non ut sit tempore.', '2017-06-06 18:54:28', '2017-10-04 13:01:08', NULL),
(22, 1, 20, '2017-06-08', 'Delectus sit quia qui est magni.', '2017-06-08 17:27:44', '2017-10-04 13:01:08', NULL),
(23, 1, 21, '2017-06-09', 'Sint magni sunt natus iure.', '2017-06-09 19:09:22', '2017-10-04 13:01:08', NULL),
(24, 1, 22, '2017-06-14', 'Reiciendis eum sapiente ducimus quis officia.', '2017-06-15 15:38:13', '2017-10-04 13:01:08', NULL),
(25, 1, 3, '2017-06-20', 'Et et aut est excepturi perferendis maiores voluptatem corporis.', '2017-06-21 12:59:16', '2017-10-04 13:01:08', NULL),
(26, 1, 23, '2017-06-22', 'Quaerat consequatur ex quo omnis id natus.', '2017-06-22 20:13:43', '2017-10-04 13:01:08', NULL),
(27, 1, 15, '2017-06-23', 'Sunt ut perspiciatis quisquam officia.', '2017-06-24 16:25:54', '2017-10-04 13:01:08', NULL),
(28, 1, 25, '2017-06-27', 'Sint et dolor cumque facere.', '2017-06-27 18:29:31', '2017-10-04 13:01:08', NULL),
(29, 1, 25, '2016-04-26', 'Ratione praesentium sed cupiditate inventore est.', '2017-06-27 18:31:09', '2017-10-04 13:01:09', NULL),
(30, 1, 20, '2017-06-22', 'Itaque aperiam ad quisquam incidunt fuga est ut.', '2017-06-29 18:32:34', '2017-10-04 13:01:09', NULL),
(31, 1, 20, '2017-06-29', 'In deleniti eum et quia expedita ea.', '2017-06-29 18:33:32', '2017-10-04 13:01:09', NULL),
(32, 1, 14, '2017-07-04', 'Et corrupti laborum neque veniam ut modi vitae iste.', '2017-07-04 13:23:44', '2017-10-04 13:01:09', NULL),
(33, 1, 26, '2017-07-04', 'Et nesciunt reprehenderit soluta non.', '2017-07-04 15:08:14', '2017-10-04 13:01:09', NULL),
(34, 1, 27, '2017-07-06', 'Vel eligendi adipisci ratione animi in qui.', '2017-07-06 18:03:12', '2017-10-04 13:01:09', NULL),
(35, 1, 27, '2017-05-04', 'Ducimus est aut eaque accusamus nemo at architecto.', '2017-07-06 18:04:49', '2017-10-04 13:01:09', NULL),
(36, 1, 29, '2017-07-07', 'Fuga deleniti illum vel atque itaque.', '2017-07-07 13:30:39', '2017-10-04 13:01:09', NULL),
(37, 1, 28, '2017-07-13', 'Vero est exercitationem nemo cupiditate.', '2017-07-13 21:00:00', '2017-10-04 13:01:09', NULL),
(38, 1, 18, '2017-07-14', 'Omnis omnis fugiat quia.', '2017-07-14 14:52:34', '2017-10-04 13:01:09', NULL),
(39, 1, 18, '2017-07-14', 'Voluptas rerum et numquam iure accusamus mollitia saepe.', '2017-07-14 14:53:01', '2017-10-04 13:01:09', NULL),
(40, 1, 7, '2017-07-14', 'Ipsa ut ullam ut ullam maiores odio reiciendis vel.', '2017-07-14 18:24:21', '2017-10-04 13:01:09', NULL),
(41, 1, 7, '2017-07-14', 'Laborum est blanditiis repellendus quia quo officia ipsa.', '2017-07-14 18:24:55', '2017-10-04 13:01:09', NULL),
(42, 1, 22, '2017-06-27', 'Suscipit vero aut tenetur iure cupiditate qui et nisi.', '2017-07-18 12:06:58', '2017-10-04 13:01:09', NULL),
(43, 1, 22, '2017-07-18', 'Odit veniam harum eos porro sint earum.', '2017-07-18 12:07:30', '2017-10-04 13:01:09', NULL),
(44, 1, 31, '2017-07-18', 'Nisi aspernatur perferendis quisquam voluptatem enim et.', '2017-07-18 14:23:35', '2017-10-04 13:01:09', NULL),
(45, 1, 30, '2017-07-20', 'Voluptate minus est neque non aut fugiat itaque aut.', '2017-07-20 13:48:36', '2017-10-04 13:01:09', NULL),
(46, 1, 30, '2017-07-20', 'Laborum est repellendus quibusdam molestiae quas distinctio ea qui.', '2017-07-20 13:49:05', '2017-10-04 13:01:09', NULL),
(47, 1, 18, '2017-07-26', 'Esse pariatur ab illum.', '2017-07-26 17:25:22', '2017-10-04 13:01:10', NULL),
(48, 1, 31, '2017-07-26', 'Quo quisquam nisi deleniti.', '2017-07-26 18:36:31', '2017-10-04 13:01:10', NULL),
(49, 1, 33, '2017-07-27', 'Maiores molestiae aperiam quo dolore non.', '2017-07-27 19:53:20', '2017-10-04 13:01:10', NULL),
(50, 1, 26, '2017-08-01', 'Illo error amet cumque suscipit rem laboriosam vitae.', '2017-08-01 21:54:55', '2017-10-04 13:01:10', NULL),
(51, 1, 34, '2017-08-01', 'Consequatur dignissimos error earum.', '2017-08-01 22:05:31', '2017-10-04 13:01:10', NULL),
(52, 1, 34, '2017-08-01', 'Molestias et atque magni veniam ad illo.', '2017-08-01 22:07:18', '2017-10-04 13:01:10', NULL),
(53, 1, 36, '2017-08-03', 'Earum expedita autem ut et occaecati et qui eveniet.', '2017-08-03 18:31:43', '2017-10-04 13:01:10', NULL),
(54, 1, 37, '2017-08-03', 'Architecto quo rem nihil ut.', '2017-08-03 20:10:16', '2017-10-04 13:01:10', NULL),
(55, 1, 33, '2017-08-03', 'Quibusdam nemo et laboriosam eveniet itaque non.', '2017-08-03 22:19:17', '2017-10-04 13:01:10', NULL),
(56, 1, 26, '2017-08-08', 'Atque ipsum rem molestias possimus quis.', '2017-08-08 20:43:45', '2017-10-04 13:01:10', NULL),
(57, 1, 26, '2017-08-11', 'Unde vel aut sapiente quia molestias.', '2017-08-11 18:28:59', '2017-10-04 13:01:10', NULL),
(58, 1, 2, '2017-08-15', 'Necessitatibus consequatur laborum sit dolores quidem consequatur.', '2017-08-15 17:31:54', '2017-10-04 13:01:10', NULL),
(59, 1, 40, '2017-08-18', 'Repellat ut vero ex enim dicta.', '2017-08-18 13:08:23', '2017-10-04 13:01:10', NULL),
(60, 1, 22, '2017-08-22', 'Earum est unde magni exercitationem ducimus saepe.', '2017-08-22 17:48:12', '2017-10-04 13:01:10', NULL),
(61, 1, 42, '2017-08-22', 'Id et corrupti qui harum repellendus.', '2017-08-22 20:51:35', '2017-10-04 13:01:10', NULL),
(62, 1, 21, '2017-09-15', 'Sit nihil nisi molestias velit.', '2017-09-15 19:11:04', '2017-10-04 13:01:10', NULL),
(63, 1, 44, '2017-09-19', 'Debitis voluptatem dolor laboriosam vel voluptas et.', '2017-09-19 21:51:07', '2017-10-04 13:01:10', NULL),
(64, 1, 44, '2017-09-19', 'Ut sed eaque excepturi modi omnis quas sit maiores.', '2017-09-19 21:53:01', '2017-10-04 13:01:11', NULL),
(65, 1, 46, '2017-09-21', 'Sunt sit iste sapiente necessitatibus quo quas.', '2017-09-21 19:48:04', '2017-10-04 13:01:11', NULL),
(66, 1, 33, '2017-09-22', 'Aut consequatur eos doloremque et sint labore dolore.', '2017-09-22 13:54:25', '2017-10-04 13:01:11', NULL),
(67, 1, 48, '2017-09-26', 'Voluptatem provident fuga nihil doloribus praesentium.', '2017-09-26 14:55:50', '2017-10-04 13:01:11', NULL),
(68, 1, 12, '2017-09-29', 'Quo iure sapiente est.', '2017-09-29 14:53:09', '2017-10-04 13:01:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `impressos`
--

CREATE TABLE `impressos` (
  `id` int(10) UNSIGNED NOT NULL,
  `idprofissional_criador` int(10) UNSIGNED NOT NULL,
  `documento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intervencao`
--

CREATE TABLE `intervencao` (
  `idintervencao` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `regiao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `intervencao`
--

INSERT INTO `intervencao` (`idintervencao`, `nome`, `codigo`, `regiao`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'Coroa Provisória', '5002', '', '400.00', '2017-03-28 13:00:00', NULL),
(2, 'Prótese Total', '5004', '', '2500.00', '2017-03-28 13:00:00', NULL),
(3, 'Prótese Total Caracterizada', '5005', '', '3000.00', '2017-03-28 13:00:00', NULL),
(4, 'Coroa Livre de Metal', '5001', '', '1800.00', '2017-03-29 03:04:55', '2017-03-29 03:04:55'),
(5, 'Coroa Provisória sobre implante', '5007', '', '450.00', '2017-04-28 19:51:58', '2017-04-28 19:56:58'),
(6, 'Implante Dentário', '6001', '', '1800.00', '2017-04-28 19:57:45', '2017-04-28 19:57:45'),
(7, 'Levantamento de Seio', '6002', '', '2500.00', '2017-04-28 19:58:17', '2017-04-28 19:58:17'),
(8, 'Enxerto ósseo', '6003', '', '2500.00', '2017-04-28 19:58:54', '2017-04-28 19:58:54'),
(9, 'Biomaterial', '6005', '', '400.00', '2017-04-28 19:59:20', '2017-04-28 19:59:51'),
(10, 'Raspagem Supra Gengival', '1001', '', '350.00', '2017-04-28 20:00:23', '2017-04-28 20:00:52'),
(11, 'Consulta', '1000', '', '250.00', '2017-04-28 20:01:14', '2017-04-28 20:01:14'),
(12, 'Raspagem Sub-gengival', '1002', '', '450.00', '2017-04-28 20:02:32', '2017-04-28 20:02:32'),
(13, 'Prótese Parcial Removivel', '6010', '', '4500.00', '2017-05-02 04:11:46', '2017-05-02 04:11:46'),
(14, 'Coroa Metalo Cerâmica', '6011', '', '1800.00', '2017-05-02 04:12:35', '2017-05-02 04:12:35'),
(15, 'Coroa Metalo Cerâmica sobre implante', '6012', '', '2200.00', '2017-05-02 04:13:25', '2017-05-02 04:13:29'),
(16, 'Consulta de manutenção de Prótese tipo All on Four', '6007', '', '450.00', '2017-05-02 12:53:26', '2017-05-02 12:53:26'),
(17, 'Clareamento Dentário ', '3003', '', '600.00', '2017-05-02 12:56:46', '2017-05-02 12:57:14'),
(18, 'Clareamento Dentário em consultório', '3002', '', '800.00', '2017-05-02 12:57:53', '2017-05-02 12:57:53'),
(19, 'Conserto em Prótese', '5012', '', '500.00', '2017-05-02 12:58:57', '2017-05-02 12:58:57'),
(20, 'Restauração em resina fotopolimerizável', '3004', '', '220.00', '2017-05-02 12:59:44', '2017-05-02 12:59:44'),
(21, 'Aumento de Coroa Clinica', '2003', '', '450.00', '2017-05-02 13:00:15', '2017-05-02 13:00:15'),
(22, 'Exodontia', '4002', '', '280.00', '2017-05-02 13:00:44', '2017-05-02 13:00:44'),
(23, 'Exodontia de dentes inclusos ou impactados', '4003', '', '850.00', '2017-05-02 13:02:30', '2017-05-02 13:02:30'),
(24, 'Nucleo metálico fundido', '5013', '', '550.00', '2017-05-02 13:05:46', '2017-05-02 13:05:46'),
(25, 'Núcleo intra radicular estético', '5014', '', '750.00', '2017-05-02 13:06:37', '2017-05-02 13:06:37'),
(26, 'Restauração em cerâmica pura ', '5015', '', '1250.00', '2017-05-02 13:48:04', '2017-05-02 13:48:04'),
(27, 'Facetas ultra finas em cerâmica', '5016', '', '2500.00', '2017-05-02 13:49:19', '2017-05-02 13:49:19'),
(28, 'Consulta de Manutenção de implantes', '1005', '', '250.00', '2017-05-02 13:50:10', '2017-05-02 13:50:10'),
(29, 'Radiografia Periapical', '1006', '', '25.00', '2017-05-02 13:50:38', '2017-05-02 13:50:38'),
(30, 'Aumento de Coroa Clinico estético', '2005', '', '550.00', '2017-05-02 13:51:51', '2017-05-02 13:51:51'),
(31, 'Planejamento de tratamento com modelos e fotgrafias', '1007', '', '400.00', '2017-05-02 13:54:10', '2017-05-02 13:54:10'),
(32, 'Enceramento diagnóstico', '1008', 'por elemento', '120.00', '2017-05-02 13:54:41', '2017-05-02 13:54:41'),
(33, 'Material para cirurgia (Membranas, parafusos entre outros', '6008', '', '350.00', '2017-05-02 13:55:58', '2017-05-02 13:55:58'),
(34, 'Componentes protéticos', '6009', '', '150.00', '2017-05-02 13:57:05', '2017-05-02 13:57:05'),
(35, 'Taxa de repetição de trabalho', '5999', '', '500.00', '2017-05-05 19:04:18', '2017-05-05 19:04:18'),
(36, 'Protese Tipo Protocolo Branemark (12 dentes)', '6007', '', '15000.00', '2017-05-30 18:18:33', '2017-05-30 18:19:25'),
(37, 'Coroa CAD /CAM sobre implante', '6008', '', '1800.00', '2017-06-02 13:56:44', '2017-06-02 13:57:07'),
(38, 'Tratamento Endodontico Molar', '7001', '', '900.00', '2017-06-02 20:58:19', '2017-06-02 20:58:19'),
(39, 'Prótese Metalo-cerâmica sobre implante PF1', '6012', '', '1800.00', '2017-07-07 12:24:05', '2017-07-07 12:24:05'),
(40, 'All on four - fase cirurgica ', '6015', '', '9000.00', '2017-07-13 19:17:13', '2017-07-13 19:17:18'),
(41, 'All on four - Prótese Provisória', '6016', '', '3000.00', '2017-07-13 19:17:57', '2017-07-13 19:17:57'),
(42, 'Componentes proteticos e laboratoriais', '6099', '', '180.00', '2017-07-26 04:10:35', '2017-07-26 12:06:14'),
(43, 'Tratamento odontológico', '9000', '', '100.00', '2017-08-01 19:59:17', '2017-08-01 19:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `item_orcamento`
--

CREATE TABLE `item_orcamento` (
  `iditem_orcamento` int(10) UNSIGNED NOT NULL,
  `idorcamento` int(10) UNSIGNED NOT NULL,
  `idintervencao` int(10) UNSIGNED NOT NULL,
  `regiao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_orcamento`
--

INSERT INTO `item_orcamento` (`iditem_orcamento`, `idorcamento`, `idintervencao`, `regiao`, `valor`, `created_at`, `updated_at`) VALUES
(16, 5, 10, '', '180.00', '2017-05-05 19:01:34', '2017-05-05 19:01:34'),
(17, 6, 35, '', '358.00', '2017-05-05 19:05:00', '2017-05-05 19:05:00'),
(18, 7, 27, '11', '2500.00', '2017-05-09 16:57:24', '2017-05-09 16:57:24'),
(19, 7, 27, '12', '2500.00', '2017-05-09 16:57:24', '2017-05-09 16:57:24'),
(20, 7, 27, '13', '2500.00', '2017-05-09 16:57:24', '2017-05-09 16:57:24'),
(21, 7, 27, '21', '2500.00', '2017-05-09 16:57:24', '2017-05-09 16:57:24'),
(22, 7, 27, '22', '2500.00', '2017-05-09 16:57:24', '2017-05-09 16:57:24'),
(23, 7, 27, '23', '2500.00', '2017-05-09 16:57:24', '2017-05-09 16:57:24'),
(24, 7, 31, '', '400.00', '2017-05-09 16:57:24', '2017-05-09 16:57:24'),
(25, 7, 32, 'por elemento', '400.00', '2017-05-09 16:57:24', '2017-05-09 16:57:24'),
(26, 8, 26, '', '1250.00', '2017-05-09 17:33:51', '2017-05-19 18:20:35'),
(27, 9, 6, '37', '1800.00', '2017-05-12 14:09:52', '2017-05-12 14:17:06'),
(28, 9, 15, '46', '2200.00', '2017-05-12 14:09:52', '2017-05-12 14:17:06'),
(29, 9, 15, '47', '2200.00', '2017-05-12 14:09:52', '2017-05-12 14:17:06'),
(30, 9, 15, '36', '2200.00', '2017-05-12 14:09:52', '2017-05-12 14:17:06'),
(31, 9, 15, '37', '2200.00', '2017-05-12 14:09:52', '2017-05-12 14:17:06'),
(32, 10, 4, '', '1721.00', '2017-05-18 17:30:05', '2017-05-18 17:30:05'),
(33, 11, 6, '45', '1500.00', '2017-05-18 17:39:24', '2017-05-18 17:39:24'),
(34, 11, 6, '44', '1500.00', '2017-05-18 17:39:24', '2017-05-18 17:39:24'),
(35, 11, 6, '35', '1500.00', '2017-05-18 17:39:24', '2017-05-18 17:39:24'),
(36, 12, 15, '44', '1500.00', '2017-05-18 17:41:54', '2017-05-18 17:41:54'),
(37, 12, 15, '45', '1500.00', '2017-05-18 17:41:54', '2017-05-18 17:41:54'),
(38, 12, 15, '35', '1250.00', '2017-05-18 17:41:54', '2017-05-18 17:41:54'),
(39, 12, 11, '', '250.00', '2017-05-18 17:41:54', '2017-05-18 17:41:54'),
(43, 14, 20, '36O', '360.00', '2017-05-26 13:44:54', '2017-05-26 13:44:54'),
(44, 14, 17, 'Todas', '300.00', '2017-05-26 13:44:54', '2017-05-26 13:44:54'),
(45, 15, 6, '36', '600.00', '2017-05-30 17:12:34', '2017-05-30 17:12:34'),
(46, 16, 36, '', '12980.00', '2017-05-30 18:21:35', '2017-05-30 18:21:35'),
(47, 17, 6, '14', '1200.00', '2017-05-30 18:25:39', '2017-05-30 18:25:39'),
(48, 17, 6, '15', '1200.00', '2017-05-30 18:25:39', '2017-05-30 18:25:39'),
(49, 17, 6, '16', '1200.00', '2017-05-30 18:25:39', '2017-05-30 18:25:39'),
(50, 17, 6, '23', '1200.00', '2017-05-30 18:25:39', '2017-05-30 18:25:39'),
(51, 17, 6, '24', '1200.00', '2017-05-30 18:25:39', '2017-05-30 18:25:39'),
(52, 17, 6, '25', '1200.00', '2017-05-30 18:25:39', '2017-05-30 18:25:39'),
(53, 17, 6, '26', '1200.00', '2017-05-30 18:25:39', '2017-05-30 18:25:39'),
(54, 17, 7, 'direito', '2000.00', '2017-05-30 18:25:39', '2017-05-30 18:25:39'),
(55, 17, 7, '', '2000.00', '2017-05-30 18:25:39', '2017-05-30 18:25:39'),
(56, 18, 4, '13', '1500.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(57, 18, 4, '12', '1500.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(58, 18, 4, '11', '1500.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(59, 18, 4, '21', '1500.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(60, 18, 4, '22', '1500.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(61, 18, 15, '14', '1200.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(62, 18, 15, '15', '1200.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(63, 18, 15, '16', '1200.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(64, 18, 15, '23', '1200.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(65, 18, 15, '24', '1200.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(66, 18, 15, '25', '1200.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(67, 18, 15, '26', '1200.00', '2017-05-30 18:30:20', '2017-05-30 18:30:20'),
(68, 19, 4, '37', '1200.00', '2017-06-01 18:16:30', '2017-06-01 18:16:30'),
(69, 19, 24, '37', '550.00', '2017-06-01 18:16:30', '2017-06-01 18:16:30'),
(70, 20, 37, '36', '1750.00', '2017-06-02 13:58:49', '2017-06-02 13:58:49'),
(71, 21, 14, '36', '1200.00', '2017-06-02 17:45:02', '2017-06-02 17:45:02'),
(72, 21, 6, '47', '800.00', '2017-06-02 17:45:02', '2017-06-02 17:45:02'),
(73, 22, 20, '27MO', '350.00', '2017-06-02 20:57:27', '2017-06-02 20:57:27'),
(74, 23, 38, '27', '800.00', '2017-06-02 20:59:26', '2017-06-02 20:59:26'),
(75, 24, 10, 'Todas', '350.00', '2017-06-06 13:35:29', '2017-06-06 13:35:29'),
(76, 25, 6, '36', '1500.00', '2017-06-06 14:15:30', '2017-07-14 18:47:39'),
(77, 26, 15, '', '1500.00', '2017-06-06 14:16:14', '2017-06-06 14:16:14'),
(78, 27, 15, '15', '1200.00', '2017-06-06 18:55:13', '2017-06-06 18:55:13'),
(79, 28, 6, '35', '1500.00', '2017-06-08 17:26:47', '2017-06-08 17:26:47'),
(80, 28, 5, '35', '450.00', '2017-06-08 17:26:47', '2017-06-08 17:26:47'),
(82, 30, 10, 'Todas', '280.00', '2017-06-09 19:04:17', '2017-06-09 19:04:17'),
(83, 31, 6, '16', '1500.00', '2017-06-14 12:58:23', '2017-06-14 12:58:23'),
(84, 31, 6, '15', '1500.00', '2017-06-14 12:58:23', '2017-06-14 12:58:23'),
(85, 31, 6, '14', '1500.00', '2017-06-14 12:58:23', '2017-06-14 12:58:23'),
(86, 31, 15, '16', '1500.00', '2017-06-14 12:58:23', '2017-06-14 12:58:23'),
(87, 31, 15, '15', '1500.00', '2017-06-14 12:58:23', '2017-06-14 12:58:23'),
(88, 31, 15, '14', '1500.00', '2017-06-14 12:58:23', '2017-06-14 12:58:23'),
(89, 31, 7, 'direito', '1250.00', '2017-06-14 12:58:23', '2017-06-14 12:58:23'),
(90, 32, 4, '13', '1500.00', '2017-06-14 13:05:13', '2017-06-14 13:05:13'),
(91, 32, 4, '12', '1500.00', '2017-06-14 13:05:13', '2017-06-14 13:05:13'),
(92, 32, 4, '11', '1500.00', '2017-06-14 13:05:13', '2017-06-14 13:05:13'),
(93, 33, 6, '24', '800.00', '2017-06-22 20:14:18', '2017-06-22 20:14:18'),
(94, 34, 6, '16', '1300.00', '2017-06-27 12:56:08', '2017-06-27 12:56:08'),
(95, 35, 15, '36', '1350.00', '2017-06-27 12:58:06', '2017-06-27 12:58:06'),
(96, 36, 6, '36', '1188.00', '2017-06-27 13:01:03', '2017-06-27 13:01:03'),
(97, 37, 28, 'Todas', '180.00', '2017-06-27 18:35:36', '2017-06-27 18:35:36'),
(98, 38, 6, '', '1755.00', '2017-06-29 18:25:51', '2017-06-29 18:25:51'),
(101, 40, 6, '46', '1000.00', '2017-07-06 18:23:23', '2017-07-06 18:23:23'),
(102, 42, 6, '16', '1800.00', '2017-07-07 12:22:40', '2017-07-07 18:51:34'),
(103, 42, 6, '14', '1800.00', '2017-07-07 12:22:40', '2017-07-07 18:51:34'),
(104, 42, 6, '13', '1800.00', '2017-07-07 12:22:40', '2017-07-07 18:51:34'),
(105, 42, 6, '25', '1800.00', '2017-07-07 12:22:40', '2017-07-07 18:51:34'),
(106, 42, 6, '27', '1800.00', '2017-07-07 12:22:40', '2017-07-07 18:51:34'),
(107, 42, 1, '14 elementos', '1200.00', '2017-07-07 12:22:40', '2017-07-07 18:51:34'),
(108, 42, 34, '', '300.00', '2017-07-07 12:22:40', '2017-07-07 18:51:34'),
(110, 43, 39, '14 elementos', '21000.00', '2017-07-07 19:06:14', '2017-07-07 19:06:14'),
(111, 44, 6, '', '1750.00', '2017-07-10 12:15:03', '2017-07-10 12:15:03'),
(112, 45, 40, 'superior', '6000.00', '2017-07-13 19:19:35', '2017-07-13 19:19:35'),
(113, 45, 41, 'superior', '3000.00', '2017-07-13 19:19:35', '2017-07-13 19:19:35'),
(114, 46, 4, '21', '1800.00', '2017-07-18 12:05:25', '2017-07-18 12:05:25'),
(115, 46, 4, '26', '1800.00', '2017-07-18 12:05:25', '2017-07-18 12:05:25'),
(116, 46, 6, '36', '1800.00', '2017-07-18 12:05:25', '2017-07-18 12:05:25'),
(117, 46, 4, '36', '1800.00', '2017-07-18 12:05:25', '2017-07-18 12:05:25'),
(118, 46, 7, 'direito', '1500.00', '2017-07-18 12:05:25', '2017-07-18 12:05:25'),
(119, 46, 6, '17', '1800.00', '2017-07-18 12:05:25', '2017-07-18 12:05:25'),
(120, 46, 20, 'DO', '250.00', '2017-07-18 12:05:25', '2017-07-18 12:05:25'),
(121, 46, 5, '36', '150.00', '2017-07-18 12:05:25', '2017-07-18 12:05:25'),
(122, 46, 4, '17', '1800.00', '2017-07-18 12:05:25', '2017-07-18 12:05:25'),
(123, 47, 7, '', '2400.00', '2017-07-18 14:35:53', '2017-07-18 14:35:53'),
(124, 47, 6, '', '1200.00', '2017-07-18 14:35:53', '2017-07-18 14:35:53'),
(125, 47, 6, '', '1200.00', '2017-07-18 14:35:53', '2017-07-18 14:35:53'),
(126, 47, 6, '', '1200.00', '2017-07-18 14:35:53', '2017-07-18 14:35:53'),
(127, 47, 6, '', '1200.00', '2017-07-18 14:35:53', '2017-07-18 14:35:53'),
(128, 48, 6, '', '1000.00', '2017-07-18 14:37:22', '2017-07-18 14:37:22'),
(129, 48, 6, '', '1000.00', '2017-07-18 14:37:22', '2017-07-18 14:37:22'),
(130, 48, 6, '', '1000.00', '2017-07-18 14:37:22', '2017-07-18 14:37:22'),
(131, 48, 6, '', '1000.00', '2017-07-18 14:37:22', '2017-07-18 14:37:22'),
(132, 48, 1, '12 elementos', '1200.00', '2017-07-18 14:37:22', '2017-07-18 14:37:22'),
(133, 49, 39, '12 elementos', '12000.00', '2017-07-18 14:38:17', '2017-07-18 14:38:17'),
(134, 50, 4, '12', '1800.00', '2017-07-18 16:59:57', '2017-07-18 16:59:57'),
(135, 50, 4, '11', '1800.00', '2017-07-18 16:59:57', '2017-07-18 16:59:57'),
(136, 50, 37, '21', '1900.00', '2017-07-18 16:59:57', '2017-07-18 16:59:57'),
(137, 50, 37, '22', '1900.00', '2017-07-18 16:59:57', '2017-07-18 16:59:57'),
(138, 50, 30, 'Ant Sup', '600.00', '2017-07-18 16:59:57', '2017-07-18 16:59:57'),
(139, 51, 4, '11', '1800.00', '2017-07-27 19:51:22', '2017-08-03 22:24:02'),
(140, 52, 20, '', '400.00', '2017-08-01 12:39:08', '2017-08-01 12:40:43'),
(141, 52, 20, '', '400.00', '2017-08-01 12:39:08', '2017-08-01 12:40:43'),
(142, 52, 20, '', '400.00', '2017-08-01 12:39:08', '2017-08-01 12:40:43'),
(143, 52, 20, '', '400.00', '2017-08-01 12:39:08', '2017-08-01 12:40:43'),
(144, 52, 15, '', '1500.00', '2017-08-01 12:40:43', '2017-08-01 12:40:43'),
(145, 53, 6, '22', '2500.00', '2017-08-01 18:26:12', '2017-08-01 18:26:12'),
(146, 53, 1, '22', '400.00', '2017-08-01 18:26:12', '2017-08-01 18:26:12'),
(147, 53, 42, '', '100.00', '2017-08-01 18:26:12', '2017-08-01 18:26:12'),
(148, 54, 43, '', '1500.00', '2017-08-01 20:01:03', '2017-08-01 20:01:03'),
(150, 56, 34, '22', '214.00', '2017-08-01 22:10:33', '2017-08-01 22:11:03'),
(151, 57, 6, '25', '1800.00', '2017-08-03 18:38:17', '2017-08-03 18:38:17'),
(152, 57, 1, '', '400.00', '2017-08-03 18:38:17', '2017-08-03 18:38:17'),
(153, 57, 15, '', '1500.00', '2017-08-03 18:38:17', '2017-08-03 18:38:17'),
(154, 58, 40, '', '6000.00', '2017-08-03 19:39:09', '2017-08-03 19:39:09'),
(155, 58, 41, '', '3000.00', '2017-08-03 19:39:09', '2017-08-03 19:39:09'),
(156, 59, 40, '', '5100.00', '2017-08-03 20:09:33', '2017-08-03 20:09:51'),
(157, 59, 41, '', '1800.00', '2017-08-03 20:09:33', '2017-08-03 20:09:51'),
(158, 59, 42, '', '2100.00', '2017-08-03 20:09:33', '2017-08-03 20:09:51'),
(159, 60, 43, '', '1150.00', '2017-08-04 17:56:14', '2017-08-04 17:56:14'),
(160, 61, 43, '', '3800.00', '2017-08-04 18:01:54', '2017-08-04 18:01:54'),
(161, 62, 6, '37', '800.00', '2017-08-15 14:52:47', '2017-08-15 14:52:47'),
(162, 62, 6, '34', '800.00', '2017-08-15 14:52:47', '2017-08-15 14:52:47'),
(163, 62, 1, '4 els', '400.00', '2017-08-15 14:52:47', '2017-08-15 14:52:47'),
(164, 63, 6, '', '800.00', '2017-08-15 14:58:29', '2017-08-15 14:58:29'),
(165, 63, 1, '', '200.00', '2017-08-15 14:58:29', '2017-08-15 14:58:29'),
(166, 64, 11, '', '180.00', '2017-08-15 17:32:33', '2017-08-15 17:32:33'),
(167, 65, 5, '36', '450.00', '2017-08-22 18:06:37', '2017-08-22 18:06:37'),
(168, 65, 6, '36', '1550.00', '2017-08-22 18:06:37', '2017-08-22 18:06:37'),
(169, 66, 4, '12 11 21 22', '8500.00', '2017-08-24 12:58:18', '2017-08-24 12:58:18'),
(170, 67, 6, '36', '1500.00', '2017-08-24 13:00:26', '2017-08-24 13:00:26'),
(171, 67, 15, '36', '1500.00', '2017-08-24 13:00:26', '2017-08-24 13:00:26'),
(172, 68, 40, '', '4000.00', '2017-08-25 14:26:06', '2017-08-25 14:26:06'),
(173, 68, 41, '', '2500.00', '2017-08-25 14:26:06', '2017-08-25 14:26:06'),
(174, 69, 14, '34', '1800.00', '2017-09-21 19:54:37', '2017-09-21 19:54:37'),
(175, 69, 14, '35', '1800.00', '2017-09-21 19:54:37', '2017-09-21 19:54:37'),
(176, 69, 24, '35', '550.00', '2017-09-21 19:54:37', '2017-09-21 19:54:37'),
(177, 70, 6, '22', '1000.00', '2017-09-26 14:59:54', '2017-09-26 14:59:54'),
(178, 71, 6, '14', '2000.00', '2017-09-26 19:39:18', '2017-09-26 19:39:45'),
(179, 71, 6, '16', '2000.00', '2017-09-26 19:39:18', '2017-09-26 19:39:45'),
(180, 71, 15, '26', '2000.00', '2017-09-26 19:39:18', '2017-09-26 19:39:45'),
(181, 71, 15, '27', '2000.00', '2017-09-26 19:39:18', '2017-09-26 19:39:45'),
(182, 71, 7, 'direito', '0.00', '2017-09-26 19:39:18', '2017-09-26 19:39:45'),
(183, 71, 33, '', '500.00', '2017-09-26 19:39:18', '2017-09-26 19:39:45'),
(184, 72, 12, '24', '1500.00', '2017-09-26 19:44:07', '2017-09-26 19:44:07'),
(185, 72, 6, '17', '2000.00', '2017-09-26 19:44:07', '2017-09-26 19:44:07'),
(186, 72, 1, '14/15/16', '1200.00', '2017-09-26 19:44:07', '2017-09-26 19:44:07'),
(187, 72, 33, '', '1253.00', '2017-09-26 19:44:07', '2017-09-26 19:44:07'),
(188, 73, 15, '14', '1350.00', '2017-09-26 19:46:32', '2017-09-29 14:51:44'),
(189, 73, 15, '15', '1350.00', '2017-09-26 19:46:32', '2017-09-29 14:51:44'),
(190, 73, 15, '16', '1350.00', '2017-09-26 19:46:32', '2017-09-29 14:51:44'),
(191, 73, 15, '17', '1350.00', '2017-09-26 19:46:32', '2017-09-29 14:51:44'),
(192, 74, 6, '46', '995.00', '2017-09-27 18:57:37', '2017-09-27 18:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_08_205613_create_intervencao_table', 1),
('2016_01_08_205632_create_plano_table', 1),
('2016_01_08_210619_create_plano_intervencao_table', 1),
('2016_01_08_210633_create_contato_table', 1),
('2016_01_08_210712_create_users_table', 1),
('2016_01_08_210715_create_profissional_table', 1),
('2016_01_08_210729_create_paciente_table', 1),
('2016_01_08_210747_create_anamnese_table', 1),
('2016_01_08_210802_create_pergunta_table', 1),
('2016_01_08_210816_create_resposta_table', 1),
('2016_01_08_210828_create_retorno_table', 1),
('2016_01_08_210843_create_consulta_table', 1),
('2016_01_08_210856_create_tipo_pagamento_table', 1),
('2016_01_08_210910_create_orcamento_table', 1),
('2016_01_08_210938_create_item_orcamento_table', 1),
('2016_01_08_210940_create_pagamento_table', 1),
('2016_01_08_210953_create_parcela_table', 1),
('2016_01_08_211320_create_recibo_table', 1),
('2016_01_08_211321_create_evolucao_table', 1),
('2016_04_27_000734_entrust_setup_tables', 1),
('2016_09_19_103938_create_clinica_table', 1),
('2017_03_28_142037_create_impressos_table', 1),
('2017_04_18_122546_create_parcela_pagamentos_table', 2),
('2017_06_23_231835_create_uploads_table', 3),
('2017_07_11_094644_create_cheques_table', 4),
('2017_07_12_150837_create_valores_table', 5),
('2017_07_17_172329_create_paciente_documentos_table', 6),
('2017_07_17_172329_create_paciente_images_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orcamento`
--

CREATE TABLE `orcamento` (
  `idorcamento` int(10) UNSIGNED NOT NULL,
  `idprofissional` int(10) UNSIGNED NOT NULL,
  `idpaciente` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desconto` tinyint(3) UNSIGNED NOT NULL,
  `numero_parcelas` tinyint(3) UNSIGNED NOT NULL,
  `valor_entrada` decimal(10,2) UNSIGNED NOT NULL,
  `valor_total` decimal(10,2) UNSIGNED NOT NULL,
  `aprovacao` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orcamento`
--

INSERT INTO `orcamento` (`idorcamento`, `idprofissional`, `idpaciente`, `descricao`, `desconto`, `numero_parcelas`, `valor_entrada`, `valor_total`, `aprovacao`, `created_at`, `updated_at`) VALUES
(5, 1, 2, 'Non dolor ducimus fugiat quod doloribus.', 0, 1, '0.00', '180.00', 1, '2017-05-05 19:01:34', '2017-10-04 13:01:11'),
(6, 1, 2, 'Ex sed in voluptates.', 0, 1, '0.00', '358.00', 1, '2017-05-05 19:05:00', '2017-10-04 13:01:11'),
(7, 1, 4, 'Voluptas maiores et aperiam ipsum nulla ea sunt.', 24, 1, '0.00', '15800.00', 1, '2017-05-09 16:57:24', '2017-10-04 13:01:11'),
(8, 1, 5, 'Possimus rerum tenetur eveniet fuga et iste.', 20, 1, '0.00', '1250.00', 1, '2017-05-09 17:33:51', '2017-10-04 13:01:11'),
(9, 1, 6, 'Sapiente vero vel ut provident.', 20, 10, '1800.00', '10600.00', 1, '2017-05-12 14:09:52', '2017-10-04 13:01:11'),
(10, 1, 8, 'Et sint omnis delectus veniam unde corrupti nulla.', 0, 1, '0.00', '1721.00', 1, '2017-05-18 17:30:05', '2017-10-04 13:01:11'),
(11, 1, 9, 'Qui consequatur ut ut.', 0, 3, '1000.00', '4500.00', 1, '2017-05-18 17:39:24', '2017-10-04 13:01:11'),
(12, 1, 9, 'Et aspernatur id ipsum.', 0, 1, '0.00', '4500.00', 1, '2017-05-18 17:41:54', '2017-10-04 13:01:11'),
(14, 1, 10, 'Consequuntur repellendus autem sunt corrupti quibusdam vero rem ipsum.', 0, 1, '0.00', '660.00', 1, '2017-05-26 13:44:54', '2017-10-04 13:01:11'),
(15, 1, 11, 'Sint ratione provident consequatur animi dolor consequuntur.', 0, 1, '0.00', '600.00', 1, '2017-05-30 17:12:34', '2017-10-04 13:01:11'),
(16, 1, 12, 'Aliquam amet omnis sint nisi sapiente sint.', 19, 1, '2500.00', '12980.00', 1, '2017-05-30 18:21:35', '2017-10-04 13:01:11'),
(17, 1, 12, 'Sunt nemo exercitationem culpa officiis qui atque vitae.', 23, 1, '0.00', '12400.00', 1, '2017-05-30 18:25:39', '2017-10-04 13:01:11'),
(18, 1, 12, 'Numquam qui aut cum deleniti ipsa ipsum magnam.', 10, 1, '0.00', '15900.00', 1, '2017-05-30 18:30:20', '2017-10-04 13:01:11'),
(19, 1, 13, 'Voluptates qui qui quod non odit.', 0, 3, '600.00', '1750.00', 0, '2017-06-01 18:16:30', '2017-10-04 13:01:11'),
(20, 1, 14, 'Non quidem provident dicta nam.', 0, 1, '0.00', '1750.00', 1, '2017-06-02 13:58:49', '2017-10-04 13:01:11'),
(21, 1, 15, 'Asperiores quis aut placeat officiis ea omnis et.', 0, 6, '0.00', '2000.00', 1, '2017-06-02 17:45:02', '2017-10-04 13:01:11'),
(22, 1, 16, 'Qui laboriosam aut necessitatibus ullam sequi.', 0, 1, '0.00', '350.00', 1, '2017-06-02 20:57:27', '2017-10-04 13:01:11'),
(23, 1, 16, 'Aspernatur nam aliquam voluptatum qui qui.', 0, 2, '0.00', '800.00', 1, '2017-06-02 20:59:26', '2017-10-04 13:01:12'),
(24, 1, 17, 'Pariatur libero laborum quos corporis perspiciatis iusto.', 30, 1, '0.00', '350.00', 1, '2017-06-06 13:35:29', '2017-10-04 13:01:12'),
(25, 1, 18, 'Id debitis modi natus ipsam est.', 0, 6, '0.00', '1500.00', 1, '2017-06-06 14:15:30', '2017-10-04 13:01:12'),
(26, 1, 18, 'Quas perferendis optio aspernatur.', 0, 1, '0.00', '1500.00', 0, '2017-06-06 14:16:14', '2017-10-04 13:01:12'),
(27, 1, 19, 'Aut dolor asperiores officiis omnis.', 0, 4, '0.00', '1200.00', 1, '2017-06-06 18:55:13', '2017-10-04 13:01:12'),
(28, 1, 20, 'Vero officia et rerum voluptatibus.', 0, 6, '800.00', '1950.00', 0, '2017-06-08 17:26:47', '2017-10-04 13:01:12'),
(30, 1, 21, 'Animi autem doloremque est facere iusto aut illo.', 0, 1, '0.00', '280.00', 1, '2017-06-09 19:04:17', '2017-10-04 13:01:12'),
(31, 1, 22, 'Quia et hic ratione asperiores at.', 21, 1, '0.00', '10250.00', 1, '2017-06-14 12:58:23', '2017-10-04 13:01:12'),
(32, 1, 22, 'Voluptatem soluta beatae sunt.', 25, 1, '0.00', '4500.00', 1, '2017-06-14 13:05:13', '2017-10-04 13:01:12'),
(33, 1, 23, 'Et blanditiis occaecati et distinctio quidem facere.', 0, 1, '0.00', '800.00', 1, '2017-06-22 20:14:18', '2017-10-04 13:01:12'),
(34, 1, 24, 'Dolores quidem eveniet maxime veritatis cum.', 0, 1, '0.00', '1300.00', 1, '2017-06-27 12:56:08', '2017-10-04 13:01:12'),
(35, 1, 24, 'Dolorem eum id non autem porro dolores quo.', 0, 1, '0.00', '1350.00', 1, '2017-06-27 12:58:06', '2017-10-04 13:01:12'),
(36, 1, 24, 'Soluta et vero magni vitae quidem.', 0, 1, '0.00', '1188.00', 1, '2017-06-27 13:01:03', '2017-10-04 13:01:12'),
(37, 1, 25, 'Consequatur assumenda sint corrupti expedita.', 0, 1, '0.00', '180.00', 1, '2017-06-27 18:35:36', '2017-10-04 13:01:12'),
(38, 1, 20, 'Id eum nihil vitae et iusto autem optio.', 0, 1, '0.00', '1755.00', 1, '2017-06-29 18:25:51', '2017-10-04 13:01:12'),
(40, 1, 28, 'Doloribus fuga velit harum quasi necessitatibus.', 0, 1, '0.00', '1000.00', 1, '2017-07-06 18:23:23', '2017-10-04 13:01:12'),
(42, 1, 26, 'Iure ea eius reiciendis necessitatibus ex sed.', 10, 6, '3000.00', '10500.00', 1, '2017-07-07 12:26:03', '2017-10-04 13:01:12'),
(43, 1, 26, 'Nobis quod eum est corrupti aspernatur quia esse exercitationem.', 20, 1, '0.00', '21000.00', 0, '2017-07-07 19:06:14', '2017-10-04 13:01:12'),
(44, 1, 14, 'Qui aut consectetur omnis quidem aut.', 0, 1, '0.00', '1750.00', 1, '2017-07-10 12:15:03', '2017-10-04 13:01:12'),
(45, 1, 30, 'Dolorum quo corrupti hic nesciunt aperiam.', 0, 6, '3000.00', '9000.00', 1, '2017-07-13 19:19:35', '2017-10-04 13:01:12'),
(46, 1, 14, 'Velit adipisci nam qui asperiores eaque.', 10, 1, '0.00', '12700.00', 0, '2017-07-18 12:05:25', '2017-10-04 13:01:12'),
(47, 1, 31, 'Consequuntur qui quia earum odio.', 0, 1, '0.00', '7200.00', 1, '2017-07-18 14:35:53', '2017-10-04 13:01:12'),
(48, 1, 31, 'Expedita ut ad veniam quibusdam impedit molestias.', 0, 1, '0.00', '5200.00', 1, '2017-07-18 14:37:22', '2017-10-04 13:01:12'),
(49, 1, 31, 'Aut voluptates quae incidunt dolorem cum quas repudiandae.', 0, 1, '0.00', '12000.00', 0, '2017-07-18 14:38:17', '2017-10-04 13:01:12'),
(50, 1, 32, 'Quidem quasi omnis temporibus maxime velit assumenda.', 0, 1, '0.00', '8000.00', 1, '2017-07-18 16:59:57', '2017-10-04 13:01:12'),
(51, 1, 33, 'Eum labore explicabo reiciendis voluptatem perferendis impedit.', 0, 5, '0.00', '1800.00', 1, '2017-07-27 19:51:22', '2017-10-04 13:01:13'),
(52, 1, 24, 'Qui qui et illum unde beatae ut ducimus.', 10, 1, '0.00', '3100.00', 1, '2017-08-01 12:39:08', '2017-10-04 13:01:13'),
(53, 1, 34, 'Repudiandae repellat omnis ratione dolore voluptas cumque.', 0, 1, '0.00', '3000.00', 0, '2017-08-01 18:26:12', '2017-10-04 13:01:13'),
(54, 1, 35, 'Recusandae rerum ipsam hic.', 0, 1, '0.00', '1500.00', 1, '2017-08-01 20:01:03', '2017-10-04 13:01:13'),
(56, 1, 35, 'Vitae suscipit laboriosam quia voluptatem dignissimos omnis ab possimus.', 0, 1, '0.00', '214.00', 1, '2017-08-01 22:10:33', '2017-10-04 13:01:13'),
(57, 1, 36, 'Consequuntur ducimus vel nesciunt labore est aut.', 0, 1, '0.00', '3700.00', 0, '2017-08-03 18:38:17', '2017-10-04 13:01:13'),
(58, 1, 37, 'Neque qui non minus ratione.', 0, 7, '0.00', '9000.00', 0, '2017-08-03 19:39:09', '2017-10-04 13:01:13'),
(59, 1, 37, 'Accusamus voluptatum possimus quae voluptas fugiat illum natus.', 0, 7, '0.00', '9000.00', 0, '2017-08-03 20:09:33', '2017-10-04 13:01:13'),
(60, 1, 2, 'Temporibus quisquam eum voluptatem.', 0, 1, '0.00', '1150.00', 1, '2017-08-04 17:56:14', '2017-10-04 13:01:13'),
(61, 1, 38, 'Nemo sit consequatur ea eum ullam dolorem ut libero.', 0, 1, '0.00', '3800.00', 1, '2017-08-04 18:01:54', '2017-10-04 13:01:13'),
(62, 1, 22, 'Aliquam voluptatibus quibusdam odio perferendis eum consequatur laudantium.', 0, 1, '0.00', '2000.00', 1, '2017-08-15 14:52:47', '2017-10-04 13:01:13'),
(63, 1, 39, 'Non qui aut quia aliquam incidunt sit voluptas.', 0, 1, '0.00', '1000.00', 0, '2017-08-15 14:58:29', '2017-10-04 13:01:13'),
(64, 1, 2, 'Dolorum qui omnis qui odit reiciendis qui doloribus.', 0, 1, '0.00', '180.00', 1, '2017-08-15 17:32:33', '2017-10-04 13:01:13'),
(65, 1, 41, 'Mollitia ut exercitationem minima et nam sint.', 0, 1, '0.00', '2000.00', 0, '2017-08-22 18:06:37', '2017-10-04 13:01:13'),
(66, 1, 43, 'Sed voluptatem reprehenderit eligendi sunt aut quae.', 0, 1, '0.00', '8500.00', 0, '2017-08-24 12:58:18', '2017-10-04 13:01:13'),
(67, 1, 43, 'Quisquam ratione autem hic aut.', 0, 1, '0.00', '3000.00', 0, '2017-08-24 13:00:26', '2017-10-04 13:01:13'),
(68, 1, 7, 'Pariatur ea et est tempora eos aliquam ipsa ab.', 0, 1, '0.00', '6500.00', 1, '2017-08-25 14:26:06', '2017-10-04 13:01:13'),
(69, 1, 47, 'Sed officiis ut aperiam et occaecati et.', 20, 4, '1200.00', '4150.00', 1, '2017-09-21 19:54:37', '2017-10-04 13:01:13'),
(70, 1, 48, 'Est alias eum quas qui.', 0, 1, '0.00', '1000.00', 0, '2017-09-26 14:59:54', '2017-10-04 13:01:13'),
(71, 1, 21, 'Hic id doloribus commodi odio nemo possimus porro.', 0, 1, '4000.00', '8500.00', 0, '2017-09-26 19:39:18', '2017-10-04 13:01:13'),
(72, 1, 21, 'Ipsum eos sit sed quo delectus quas ea.', 11, 1, '2798.17', '5953.00', 0, '2017-09-26 19:44:07', '2017-10-04 13:01:13'),
(73, 1, 21, 'Ipsa officiis repellat corrupti et qui.', 0, 1, '0.00', '5400.00', 0, '2017-09-26 19:46:32', '2017-10-04 13:01:14'),
(74, 1, 49, 'Harum dolor aut at quaerat.', 0, 1, '0.00', '995.00', 1, '2017-09-27 18:57:37', '2017-10-04 13:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(10) UNSIGNED NOT NULL,
  `idplano` int(10) UNSIGNED NOT NULL,
  `idprofissional_criador` int(10) UNSIGNED NOT NULL,
  `idcontato` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` tinyint(1) UNSIGNED NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `idplano`, `idprofissional_criador`, `idcontato`, `nome`, `cpf`, `rg`, `sexo`, `data_nascimento`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 4, 'Dr. Ricardo Batista', '44700009730', '044000642', 0, '1986-06-18', NULL, '2017-03-29 03:06:57', '2017-10-04 13:01:01', NULL),
(2, 2, 1, 8, 'Dr. Felipe de Souza', '20337635528', '271989556', 0, '1947-01-03', NULL, '2017-05-05 18:58:39', '2017-10-04 13:01:01', NULL),
(3, 2, 1, 9, 'Sr. Paulo Estêvão Lira', '25439279997', '110304349', 0, '1956-04-23', NULL, '2017-05-05 19:07:58', '2017-10-04 13:01:01', NULL),
(4, 2, 1, 10, 'Dr. Luzia Sabrina Soto', '73899302680', '017153867', 0, '1984-10-05', NULL, '2017-05-09 16:51:12', '2017-10-04 13:01:01', NULL),
(5, 2, 1, 11, 'Sabrina Garcia Matos Filho', '27520183203', '679427805', 0, '1974-02-08', NULL, '2017-05-09 17:32:11', '2017-10-04 13:01:01', NULL),
(6, 2, 1, 12, 'Srta. Violeta Josefina Delvalle', '27748857016', '225693321', 0, '1958-08-08', NULL, '2017-05-12 13:49:46', '2017-10-04 13:01:01', NULL),
(7, 2, 1, 14, 'Helena Colaço', '93473494704', '196543410', 0, '1930-12-28', NULL, '2017-05-16 18:01:46', '2017-10-04 13:01:01', NULL),
(8, 3, 1, 15, 'Dr. Mateus Ferreira Jr.', '29122370765', '022382208', 0, '1974-06-15', NULL, '2017-05-18 17:26:20', '2017-10-04 13:01:01', NULL),
(9, 3, 1, 16, 'Dr. Everton Ortega Neto', '39179609317', '026617919', 0, '1965-06-02', NULL, '2017-05-18 17:37:23', '2017-10-04 13:01:02', NULL),
(10, 2, 1, 17, 'Sr. Eduardo Rios Neto', '25176981807', '536401381', 0, '1987-12-03', NULL, '2017-05-26 13:23:16', '2017-10-04 13:01:02', NULL),
(11, 2, 1, 18, 'Sra. Michele Ariadna Matos', '49996688232', '444975900', 0, '1963-08-31', NULL, '2017-05-30 17:11:53', '2017-10-04 13:01:02', NULL),
(12, 2, 1, 19, 'Fátima Camacho Santana', '76986135424', '069041784', 0, '1948-03-07', NULL, '2017-05-30 18:16:34', '2017-10-04 13:01:02', NULL),
(13, 3, 1, 20, 'Luzia Abreu Bonilha Neto', '24476385745', '722772238', 0, '1983-02-02', NULL, '2017-06-01 18:11:12', '2017-10-04 13:01:02', NULL),
(14, 2, 1, 21, 'Srta. Paulina Casanova', '20913346500', '838020240', 0, '1980-08-28', NULL, '2017-06-02 13:52:53', '2017-10-04 13:01:02', NULL),
(15, 2, 1, 22, 'Isabella Santacruz Toledo', '64942742854', '865576807', 0, '1960-01-14', NULL, '2017-06-02 17:39:35', '2017-10-04 13:01:02', NULL),
(16, 2, 1, 23, 'Thalissa Padilha Rivera', '25877547399', '809237350', 0, '1977-04-21', NULL, '2017-06-02 20:52:50', '2017-10-04 13:01:02', NULL),
(17, 2, 1, 24, 'Olívia Marés', '26867367550', '332127222', 0, '1953-06-13', NULL, '2017-06-06 13:13:07', '2017-10-04 13:01:02', NULL),
(18, 2, 1, 25, 'Tessália Uchoa Filho', '92495803393', '843447460', 0, '1962-01-02', NULL, '2017-06-06 14:14:43', '2017-10-04 13:01:02', NULL),
(19, 2, 1, 26, 'Paulina Clara Zamana', '62425241558', '031471757', 0, '1951-03-20', NULL, '2017-06-06 18:53:55', '2017-10-04 13:01:02', NULL),
(20, 3, 1, 27, 'Sr. Everton Carmona Jr.', '66256123328', '506124444', 0, '1992-10-05', NULL, '2017-06-08 17:25:22', '2017-10-04 13:01:02', NULL),
(21, 2, 1, 28, 'Emanuel Sebastião Neves Neto', '95559325228', '496757261', 0, '1965-01-31', NULL, '2017-06-09 19:00:52', '2017-10-04 13:01:02', NULL),
(22, 2, 1, 29, 'Sr. Jácomo Rios', '61612103391', '503914606', 0, '1959-05-22', NULL, '2017-06-14 12:54:06', '2017-10-04 13:01:02', NULL),
(23, 3, 1, 30, 'Sra. Fabiana Velasques Ferminiano', '04334548148', '668892862', 0, '1956-12-14', NULL, '2017-06-22 20:13:02', '2017-10-04 13:01:02', NULL),
(24, 2, 1, 31, 'Dr. Franco da Cruz Neves', '62641427273', '630275106', 0, '1947-02-04', NULL, '2017-06-27 12:00:55', '2017-10-04 13:01:02', NULL),
(25, 2, 1, 32, 'Srta. Emília Paes', '67259005858', '466192509', 0, '1969-12-20', NULL, '2017-06-27 18:28:37', '2017-10-04 13:01:02', NULL),
(26, 2, 1, 33, 'Suzana Bonilha Rezende', '85451548609', '858764873', 0, '1952-07-16', NULL, '2017-07-04 14:06:28', '2017-10-04 13:01:02', NULL),
(27, 3, 1, 34, 'Pâmela Delgado Gomes', '68496065499', '618297448', 0, '1941-04-11', NULL, '2017-07-06 18:02:27', '2017-10-04 13:01:02', NULL),
(28, 3, 1, 35, 'Dr. Inácio Rosa Martines', '19902163238', '750683309', 0, '1980-06-14', NULL, '2017-07-06 18:20:47', '2017-10-04 13:01:02', NULL),
(29, 2, 1, 36, 'Agustina Luna Galindo', '79209233280', '381194353', 0, '1980-05-22', NULL, '2017-07-07 13:17:32', '2017-10-04 13:01:02', NULL),
(30, 3, 1, 38, 'Dr. Josefina Torres', '28234157345', '562224092', 0, '1953-04-06', NULL, '2017-07-13 19:14:18', '2017-10-04 13:01:02', NULL),
(31, 2, 1, 39, 'Mia Madalena Faro Jr.', '53219476198', '772382220', 0, '1958-09-24', NULL, '2017-07-18 14:15:35', '2017-10-04 13:01:02', NULL),
(32, 3, 1, 40, 'Ketlin Malena Mascarenhas', '97981509025', '445729058', 0, '1960-12-12', NULL, '2017-07-18 16:57:24', '2017-10-04 13:01:02', NULL),
(33, 3, 1, 41, 'Dr. Micaela Cruz Montenegro Jr.', '10749335084', '326194070', 0, '1966-06-27', NULL, '2017-07-27 19:48:55', '2017-10-04 13:01:02', NULL),
(34, 4, 1, 42, 'Sr. Leonardo Quintana Madeira', '26469871704', '864578539', 0, '1991-04-16', NULL, '2017-08-01 18:24:54', '2017-10-04 13:01:02', NULL),
(35, 4, 1, 43, 'Simon Sanches', '56691428021', '893158801', 0, '1958-12-25', NULL, '2017-08-01 19:56:40', '2017-10-04 13:01:03', NULL),
(36, 3, 1, 44, 'Srta. Melissa Padrão', '48202330920', '906560152', 0, '1981-12-20', NULL, '2017-08-03 18:30:29', '2017-10-04 13:01:03', NULL),
(37, 3, 1, 45, 'Dr. Emílio Andres Meireles', '11230243321', '518688798', 0, '1954-05-06', NULL, '2017-08-03 19:37:26', '2017-10-04 13:01:03', NULL),
(38, 2, 1, 46, 'Michele Vieira Pena Filho', '68124373876', '810635291', 0, NULL, NULL, '2017-08-04 18:01:20', '2017-10-04 13:01:03', NULL),
(39, 2, 1, 47, 'Dr. Samuel da Silva Lutero Filho', '58359722617', '382408071', 0, '1957-09-25', NULL, '2017-08-15 14:57:28', '2017-10-04 13:01:03', NULL),
(40, 2, 1, 48, 'Dr. Estêvão Perez Assunção Jr.', '87853129165', '399978089', 0, '1968-05-19', NULL, '2017-08-18 13:08:07', '2017-10-04 13:01:03', NULL),
(41, 2, 1, 49, 'Dr. Luara Rico Neto', '05375314673', '550595961', 0, '1948-10-23', NULL, '2017-08-22 17:56:53', '2017-10-04 13:01:03', NULL),
(42, 2, 1, 51, 'Dr. Abgail Feliciano Uchoa Filho', '61968052070', '015431851', 0, '1958-03-24', NULL, '2017-08-22 20:50:46', '2017-10-04 13:01:03', NULL),
(43, 3, 1, 52, 'Dr. Malena Vila Neto', '43486184024', '437353028', 0, '1979-10-03', NULL, '2017-08-24 12:57:09', '2017-10-04 13:01:03', NULL),
(44, 2, 1, 53, 'Dr. Teobaldo Gusmão Ferreira Filho', '71842533290', '774496983', 0, '1987-06-16', NULL, '2017-09-19 21:40:54', '2017-10-04 13:01:03', NULL),
(45, 3, 1, 54, 'Sr. Jácomo Paes', '48558161160', '672247780', 0, '1960-08-10', NULL, '2017-09-21 19:19:40', '2017-10-04 13:01:03', NULL),
(46, 3, 1, 55, 'Fernando Miguel Aranda Jr.', '45201843123', '374063010', 0, '1980-09-15', NULL, '2017-09-21 19:46:51', '2017-10-04 13:01:03', NULL),
(47, 3, 1, 56, 'Sr. Jorge Burgos Vieira Filho', '23990418521', '087154846', 0, '1958-06-21', NULL, '2017-09-21 19:51:45', '2017-10-04 13:01:03', NULL),
(48, 4, 1, 57, 'Sra. Ariadna Fonseca Grego Jr.', '37444797498', '485977087', 0, '1981-08-24', NULL, '2017-09-26 14:48:49', '2017-10-04 13:01:03', NULL),
(49, 4, 1, 58, 'Sra. Carla Madeira', '62472036400', '713873655', 0, '2017-01-01', NULL, '2017-09-27 18:17:57', '2017-10-04 13:01:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paciente_documentos`
--

CREATE TABLE `paciente_documentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `idprofissional_criador` int(10) UNSIGNED NOT NULL,
  `idpaciente` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paciente_images`
--

CREATE TABLE `paciente_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `idprofissional_criador` int(10) UNSIGNED NOT NULL,
  `idpaciente` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paciente_images`
--

INSERT INTO `paciente_images` (`id`, `idprofissional_criador`, `idpaciente`, `titulo`, `descricao`, `link`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 34, 'Implante 22', 'Unitite 2.9', '50d696a95bf350af7de34451d82a8eb1.jpg', NULL, '2017-08-01 19:19:45', '2017-08-01 19:19:45'),
(2, 1, 22, 'Implantes dia 22/08/2017', 'Implantes', '179b66f133ead75d47a3fb145879b7a6.jpg', NULL, '2017-08-22 18:44:52', '2017-08-22 18:44:52'),
(3, 1, 21, 'Planejamento', 'Plnao', 'e841141651ca98ffaac8d18de353d991.jpg', NULL, '2017-09-19 18:07:35', '2017-09-19 18:07:35'),
(4, 1, 48, 'Implante 21', 'Sem carga', 'e9a1aa1d32c3d0598fd12a990dec16a9.jpg', NULL, '2017-09-26 14:51:09', '2017-09-26 14:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `pagamento`
--

CREATE TABLE `pagamento` (
  `idpagamento` int(10) UNSIGNED NOT NULL,
  `idorcamento` int(10) UNSIGNED NOT NULL,
  `idpaciente` int(10) UNSIGNED NOT NULL,
  `pagamento` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pagamento`
--

INSERT INTO `pagamento` (`idpagamento`, `idorcamento`, `idpaciente`, `pagamento`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 5, 2, 0, '2017-05-05 19:01:39', '2017-05-05 19:01:39', NULL),
(5, 6, 2, 0, '2017-05-05 19:05:04', '2017-05-05 19:05:04', NULL),
(6, 7, 4, 0, '2017-05-09 16:57:44', '2017-05-09 16:57:44', NULL),
(7, 9, 6, 0, '2017-05-16 16:44:10', '2017-05-16 16:44:10', NULL),
(8, 10, 8, 0, '2017-05-18 17:30:08', '2017-05-18 17:30:08', NULL),
(9, 11, 9, 0, '2017-05-18 17:42:02', '2017-05-18 17:42:02', NULL),
(10, 8, 5, 0, '2017-05-19 18:20:41', '2017-05-19 18:20:41', NULL),
(11, 14, 10, 0, '2017-05-26 13:47:51', '2017-05-26 13:47:51', NULL),
(12, 16, 12, 0, '2017-05-30 18:31:55', '2017-05-30 18:31:55', NULL),
(13, 17, 12, 0, '2017-05-30 18:31:58', '2017-05-30 18:31:58', NULL),
(14, 18, 12, 0, '2017-05-30 18:32:07', '2017-05-30 18:32:07', NULL),
(15, 15, 11, 0, '2017-06-02 16:44:03', '2017-06-02 16:44:03', NULL),
(16, 23, 16, 0, '2017-06-02 20:59:31', '2017-06-02 20:59:31', NULL),
(17, 22, 16, 0, '2017-06-02 20:59:33', '2017-06-02 20:59:33', NULL),
(18, 24, 17, 0, '2017-06-06 13:35:32', '2017-06-06 13:35:32', NULL),
(19, 27, 19, 0, '2017-06-06 18:55:20', '2017-06-06 18:55:20', NULL),
(20, 30, 21, 0, '2017-06-09 19:08:51', '2017-06-09 19:08:51', NULL),
(21, 31, 22, 0, '2017-06-14 12:58:46', '2017-06-14 12:58:46', NULL),
(22, 33, 23, 0, '2017-06-22 20:14:33', '2017-06-22 20:14:33', NULL),
(23, 21, 15, 0, '2017-06-23 17:35:16', '2017-06-23 17:35:16', NULL),
(24, 34, 24, 0, '2017-06-27 12:56:18', '2017-06-27 12:56:18', NULL),
(25, 35, 24, 0, '2017-06-27 12:58:12', '2017-06-27 12:58:12', NULL),
(26, 36, 24, 0, '2017-06-27 13:01:10', '2017-06-27 13:01:10', NULL),
(27, 37, 25, 0, '2017-06-27 18:35:45', '2017-06-27 18:35:45', NULL),
(28, 38, 20, 0, '2017-06-29 18:26:00', '2017-06-29 18:26:00', NULL),
(29, 20, 14, 0, '2017-07-04 13:24:01', '2017-07-04 13:24:01', NULL),
(30, 44, 14, 0, '2017-07-10 12:15:11', '2017-07-10 12:15:11', NULL),
(31, 40, 28, 0, '2017-07-13 20:58:08', '2017-07-13 20:58:08', NULL),
(32, 25, 18, 0, '2017-07-14 18:49:22', '2017-07-14 18:49:22', NULL),
(33, 32, 22, 0, '2017-07-18 12:54:39', '2017-07-18 12:54:39', NULL),
(34, 50, 32, 0, '2017-07-18 17:00:16', '2017-07-18 17:00:16', NULL),
(35, 45, 30, 0, '2017-07-20 13:50:13', '2017-07-20 13:50:13', NULL),
(36, 47, 31, 0, '2017-07-26 18:32:11', '2017-07-26 18:32:11', NULL),
(37, 48, 31, 0, '2017-07-26 18:34:18', '2017-07-26 18:34:18', NULL),
(38, 52, 24, 0, '2017-08-01 12:43:57', '2017-08-01 12:43:57', NULL),
(39, 54, 35, 0, '2017-08-01 20:01:19', '2017-08-01 20:01:19', NULL),
(40, 42, 26, 0, '2017-08-01 21:48:15', '2017-08-01 21:48:15', NULL),
(41, 56, 35, 0, '2017-08-01 22:11:14', '2017-08-01 22:11:14', NULL),
(43, 51, 33, 0, '2017-08-03 22:24:15', '2017-08-03 22:24:15', NULL),
(44, 60, 2, 0, '2017-08-04 17:56:58', '2017-08-04 17:56:58', NULL),
(45, 61, 38, 0, '2017-08-04 18:01:59', '2017-08-04 18:01:59', NULL),
(46, 12, 9, 0, '2017-08-10 17:50:33', '2017-08-10 17:50:33', NULL),
(47, 64, 2, 0, '2017-08-15 17:32:43', '2017-08-15 17:32:43', NULL),
(48, 62, 22, 0, '2017-08-22 17:45:40', '2017-08-22 17:45:40', NULL),
(49, 68, 7, 0, '2017-08-25 14:26:14', '2017-08-25 14:26:14', NULL),
(50, 74, 49, 0, '2017-09-27 18:58:48', '2017-09-27 18:58:48', NULL),
(51, 69, 47, 0, '2017-09-29 15:12:07', '2017-09-29 15:12:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parcela`
--

CREATE TABLE `parcela` (
  `idparcela` int(10) UNSIGNED NOT NULL,
  `idpagamento` int(10) UNSIGNED NOT NULL,
  `numero` tinyint(3) UNSIGNED NOT NULL,
  `pago` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `data_vencimento` date NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parcela`
--

INSERT INTO `parcela` (`idparcela`, `idpagamento`, `numero`, `pago`, `data_vencimento`, `data_pagamento`, `valor`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 4, 0, 1, '2017-05-05', '2017-05-05', '180.00', '2017-05-05 19:01:39', '2017-05-05 19:01:52', NULL),
(15, 5, 0, 1, '2017-05-05', '2017-05-05', '358.00', '2017-05-05 19:05:04', '2017-06-02 21:03:44', NULL),
(16, 6, 0, 1, '2017-05-09', '2017-07-03', '12008.00', '2017-05-09 16:57:44', '2017-07-03 17:13:22', NULL),
(17, 7, 0, 1, '2017-05-16', '2017-05-16', '1800.00', '2017-05-16 16:44:10', '2017-05-16 16:44:30', NULL),
(18, 7, 1, 1, '2017-06-16', '2017-06-23', '668.00', '2017-05-16 16:44:10', '2017-06-23 12:11:17', NULL),
(19, 7, 2, 0, '2017-07-16', NULL, '668.00', '2017-05-16 16:44:10', '2017-05-16 16:44:10', NULL),
(20, 7, 3, 1, '2017-08-16', '2017-06-14', '668.00', '2017-05-16 16:44:10', '2017-07-14 18:22:39', NULL),
(21, 7, 4, 1, '2017-09-16', '2017-07-14', '668.00', '2017-05-16 16:44:10', '2017-07-14 18:22:07', NULL),
(22, 7, 5, 0, '2017-10-16', NULL, '668.00', '2017-05-16 16:44:10', '2017-05-16 16:44:10', NULL),
(23, 7, 6, 0, '2017-11-16', NULL, '668.00', '2017-05-16 16:44:10', '2017-05-16 16:44:10', NULL),
(24, 7, 7, 0, '2017-12-16', NULL, '668.00', '2017-05-16 16:44:10', '2017-05-16 16:44:10', NULL),
(25, 7, 8, 0, '2018-01-16', NULL, '668.00', '2017-05-16 16:44:10', '2017-05-16 16:44:10', NULL),
(26, 7, 9, 0, '2018-02-16', NULL, '668.00', '2017-05-16 16:44:10', '2017-05-16 16:44:10', NULL),
(27, 7, 10, 0, '2018-03-16', NULL, '668.00', '2017-05-16 16:44:10', '2017-05-16 16:44:10', NULL),
(28, 8, 0, 1, '2017-05-18', '2017-05-18', '1721.00', '2017-05-18 17:30:08', '2017-05-18 17:30:57', NULL),
(29, 9, 0, 1, '2017-05-18', '2017-03-08', '1000.00', '2017-05-18 17:42:02', '2017-05-18 17:43:00', NULL),
(30, 9, 1, 1, '2017-06-18', '2017-05-18', '1166.67', '2017-05-18 17:42:02', '2017-05-18 17:47:49', NULL),
(31, 9, 2, 1, '2017-07-18', '2017-06-18', '1166.67', '2017-05-18 17:42:02', '2017-05-18 17:48:11', NULL),
(32, 9, 3, 1, '2017-08-18', '2017-08-18', '1166.67', '2017-05-18 17:42:02', '2017-05-18 17:48:32', NULL),
(33, 10, 0, 0, '2017-05-19', NULL, '1000.00', '2017-05-19 18:20:41', '2017-05-19 18:20:41', NULL),
(34, 11, 0, 1, '2017-05-26', '2017-06-02', '660.00', '2017-05-26 13:47:51', '2017-06-02 13:25:53', NULL),
(35, 12, 0, 1, '2017-05-30', '2016-09-12', '2500.00', '2017-05-30 18:31:55', '2017-06-02 02:28:15', NULL),
(36, 12, 1, 0, '2017-06-30', NULL, '8013.80', '2017-05-30 18:31:55', '2017-05-30 18:31:55', NULL),
(37, 13, 0, 1, '2016-12-13', '2017-06-02', '9548.00', '2017-05-30 18:31:58', '2017-06-02 19:25:08', NULL),
(38, 14, 0, 0, '2017-05-30', NULL, '14310.00', '2017-05-30 18:32:07', '2017-06-02 19:26:28', NULL),
(39, 15, 0, 1, '2017-06-02', '2017-09-15', '600.00', '2017-06-02 16:44:03', '2017-09-15 19:08:00', NULL),
(40, 16, 0, 1, '2017-05-09', '2017-05-09', '400.00', '2017-06-02 20:59:31', '2017-06-02 21:00:29', NULL),
(41, 16, 1, 1, '2017-06-09', '2017-06-02', '400.00', '2017-06-02 20:59:31', '2017-06-02 21:01:04', NULL),
(42, 17, 0, 1, '2017-07-05', '2017-07-07', '350.00', '2017-06-02 20:59:33', '2017-07-07 13:41:01', NULL),
(43, 18, 0, 1, '2017-06-06', '2017-06-06', '245.00', '2017-06-06 13:35:32', '2017-06-06 13:36:51', NULL),
(44, 19, 0, 1, '2017-04-25', '2017-04-25', '300.00', '2017-06-06 18:55:20', '2017-06-06 18:56:46', NULL),
(45, 19, 1, 1, '2017-05-25', '2017-05-25', '300.00', '2017-06-06 18:55:20', '2017-06-06 18:57:04', NULL),
(46, 19, 2, 1, '2017-06-26', '2017-06-26', '300.00', '2017-06-06 18:55:20', '2017-06-06 18:57:39', NULL),
(47, 19, 3, 1, '2017-07-25', '2017-07-25', '300.00', '2017-06-06 18:55:20', '2017-06-06 18:57:54', NULL),
(48, 20, 0, 1, '2017-06-09', '2017-06-09', '280.00', '2017-06-09 19:08:51', '2017-06-09 22:00:40', NULL),
(49, 21, 0, 1, '2017-06-14', '2017-10-03', '8097.50', '2017-06-14 12:58:46', '2017-10-03 12:46:50', NULL),
(50, 22, 0, 0, '2017-06-22', NULL, '800.00', '2017-06-22 20:14:33', '2017-06-22 20:14:33', NULL),
(51, 23, 0, 1, '2017-06-23', '2017-07-15', '333.33', '2017-06-23 17:35:16', '2017-06-24 16:20:25', NULL),
(52, 23, 1, 0, '2017-08-15', NULL, '333.33', '2017-06-23 17:35:16', '2017-06-28 11:48:18', NULL),
(53, 23, 2, 0, '2017-09-15', NULL, '333.33', '2017-06-23 17:35:16', '2017-06-28 11:48:47', NULL),
(54, 23, 3, 0, '2017-10-15', NULL, '333.33', '2017-06-23 17:35:16', '2017-06-28 11:49:19', NULL),
(55, 23, 4, 0, '2017-11-15', NULL, '333.33', '2017-06-23 17:35:16', '2017-06-28 11:49:47', NULL),
(56, 23, 5, 0, '2017-12-15', NULL, '333.33', '2017-06-23 17:35:16', '2017-06-28 11:50:23', NULL),
(57, 24, 0, 1, '2017-04-11', '2017-04-25', '1300.00', '2017-06-27 12:56:18', '2017-06-27 12:57:14', NULL),
(58, 25, 0, 1, '2017-03-07', '2017-04-11', '1350.00', '2017-06-27 12:58:12', '2017-06-27 12:59:41', NULL),
(59, 26, 0, 1, '2017-01-03', '2017-01-03', '1188.00', '2017-06-27 13:01:10', '2017-06-27 13:01:58', NULL),
(60, 27, 0, 1, '2017-06-27', '2017-06-28', '180.00', '2017-06-27 18:35:45', '2017-06-28 20:26:39', NULL),
(61, 28, 0, 1, '2017-06-20', '2017-06-20', '1755.00', '2017-06-29 18:26:00', '2017-06-29 18:26:46', NULL),
(62, 29, 0, 0, '2017-07-05', NULL, '1750.00', '2017-07-04 13:24:01', '2017-07-10 12:17:00', NULL),
(63, 30, 0, 1, '2017-04-07', '2017-04-07', '1750.00', '2017-07-10 12:15:11', '2017-07-10 12:16:42', NULL),
(64, 31, 0, 0, '2017-07-13', NULL, '1000.00', '2017-07-13 20:58:08', '2017-07-13 20:58:08', NULL),
(65, 32, 0, 1, '2017-07-14', '2017-07-14', '250.00', '2017-07-14 18:49:22', '2017-07-14 18:49:46', NULL),
(66, 32, 1, 1, '2017-08-14', '2017-08-14', '250.00', '2017-07-14 18:49:22', '2017-07-14 18:50:33', NULL),
(67, 32, 2, 1, '2017-09-14', '2017-09-14', '250.00', '2017-07-14 18:49:22', '2017-07-14 18:51:01', NULL),
(68, 32, 3, 1, '2017-10-14', '2017-10-14', '250.00', '2017-07-14 18:49:22', '2017-07-14 18:51:25', NULL),
(69, 32, 4, 1, '2017-11-14', '2017-11-14', '250.00', '2017-07-14 18:49:22', '2017-07-14 18:51:45', NULL),
(70, 32, 5, 1, '2017-12-14', '2017-12-14', '250.00', '2017-07-14 18:49:22', '2017-07-14 18:52:03', NULL),
(71, 33, 0, 0, '2017-07-18', NULL, '3375.00', '2017-07-18 12:54:39', '2017-07-18 12:54:39', NULL),
(72, 34, 0, 0, '2017-03-16', NULL, '8000.00', '2017-07-18 17:00:16', '2017-07-18 17:00:38', NULL),
(73, 35, 0, 1, '2017-07-20', '2017-07-24', '3000.00', '2017-07-20 13:50:13', '2017-07-24 20:25:54', NULL),
(74, 35, 1, 1, '2017-08-20', '2017-08-15', '1000.00', '2017-07-20 13:50:13', '2017-08-17 18:16:48', NULL),
(75, 35, 2, 1, '2017-09-20', '2017-09-15', '1000.00', '2017-07-20 13:50:13', '2017-08-17 18:17:18', NULL),
(76, 35, 3, 1, '2017-10-20', '2017-10-15', '1000.00', '2017-07-20 13:50:13', '2017-08-17 18:17:54', NULL),
(77, 35, 4, 1, '2017-11-20', '2017-11-17', '1000.00', '2017-07-20 13:50:13', '2017-08-17 18:18:28', NULL),
(78, 35, 5, 1, '2017-12-20', '2017-12-17', '1000.00', '2017-07-20 13:50:13', '2017-08-17 18:19:21', NULL),
(79, 35, 6, 1, '2018-01-20', '2018-01-20', '1000.00', '2017-07-20 13:50:13', '2017-08-17 18:19:51', NULL),
(80, 36, 0, 1, '2015-10-27', '2015-12-27', '7200.00', '2017-07-26 18:32:11', '2017-07-26 18:34:00', NULL),
(81, 37, 0, 1, '2016-03-18', '2017-07-26', '5200.00', '2017-07-26 18:34:18', '2017-07-26 18:35:26', NULL),
(82, 38, 0, 0, '2017-08-01', NULL, '2790.00', '2017-08-01 12:43:57', '2017-08-01 12:43:57', NULL),
(83, 39, 0, 1, '2017-08-01', '2017-08-01', '1500.00', '2017-08-01 20:01:19', '2017-08-01 20:01:52', NULL),
(84, 40, 0, 1, '2017-08-01', '2017-08-15', '3000.00', '2017-08-01 21:48:15', '2017-08-01 21:49:02', NULL),
(85, 40, 1, 1, '2017-09-15', '2017-09-15', '1075.00', '2017-08-01 21:48:15', '2017-08-01 21:50:41', NULL),
(86, 40, 2, 1, '2017-10-01', '2017-10-15', '1075.00', '2017-08-01 21:48:15', '2017-08-01 21:51:09', NULL),
(87, 40, 3, 1, '2017-11-01', '2017-11-15', '1075.00', '2017-08-01 21:48:15', '2017-08-01 21:51:41', NULL),
(88, 40, 4, 1, '2017-12-01', '2017-12-01', '1075.00', '2017-08-01 21:48:15', '2017-08-01 21:52:14', NULL),
(89, 40, 5, 1, '2018-01-01', '2018-01-01', '1075.00', '2017-08-01 21:48:15', '2017-08-01 21:53:48', NULL),
(90, 40, 6, 1, '2018-02-01', '2018-02-01', '1075.00', '2017-08-01 21:48:15', '2017-08-01 21:54:13', NULL),
(91, 41, 0, 1, '2017-08-01', '2017-08-01', '214.00', '2017-08-01 22:11:14', '2017-08-01 22:11:31', NULL),
(93, 43, 0, 1, '2017-08-03', '2017-08-03', '360.00', '2017-08-03 22:24:15', '2017-08-03 22:24:40', NULL),
(94, 43, 1, 1, '2017-09-03', '2017-09-03', '360.00', '2017-08-03 22:24:15', '2017-08-03 22:25:09', NULL),
(95, 43, 2, 1, '2017-10-03', '2017-10-03', '360.00', '2017-08-03 22:24:15', '2017-08-03 22:25:35', NULL),
(96, 43, 3, 1, '2017-11-03', '2017-11-03', '360.00', '2017-08-03 22:24:15', '2017-08-03 22:26:19', NULL),
(97, 43, 4, 1, '2017-12-03', '2017-12-03', '360.00', '2017-08-03 22:24:15', '2017-08-03 22:26:52', NULL),
(98, 44, 0, 1, '2017-05-09', '2017-07-07', '1150.00', '2017-08-04 17:56:58', '2017-08-04 17:58:34', NULL),
(99, 45, 0, 1, '2017-02-03', '2017-02-03', '3800.00', '2017-08-04 18:01:59', '2017-08-04 18:02:34', NULL),
(100, 46, 0, 0, '2017-07-05', NULL, '4500.00', '2017-08-10 17:50:33', '2017-08-10 17:52:19', NULL),
(101, 47, 0, 0, '2017-08-15', NULL, '180.00', '2017-08-15 17:32:43', '2017-08-15 17:32:43', NULL),
(102, 48, 0, 0, '2017-08-22', NULL, '2000.00', '2017-08-22 17:45:40', '2017-08-22 17:45:40', NULL),
(103, 49, 0, 0, '2017-08-25', NULL, '6500.00', '2017-08-25 14:26:14', '2017-08-25 14:26:14', NULL),
(104, 50, 0, 0, '2017-09-27', NULL, '995.00', '2017-09-27 18:58:48', '2017-09-27 18:58:48', NULL),
(105, 51, 0, 1, '2017-09-29', '2017-10-05', '1200.00', '2017-09-29 15:12:08', '2017-09-29 15:12:34', NULL),
(106, 51, 1, 1, '2017-10-29', '2017-11-05', '530.00', '2017-09-29 15:12:08', '2017-09-29 15:13:02', NULL),
(107, 51, 2, 1, '2017-11-29', '2017-12-05', '530.00', '2017-09-29 15:12:08', '2017-09-29 15:13:33', NULL),
(108, 51, 3, 1, '2017-12-29', '2018-01-05', '530.00', '2017-09-29 15:12:08', '2017-09-29 15:13:54', NULL),
(109, 51, 4, 1, '2018-01-29', '2017-02-05', '530.00', '2017-09-29 15:12:08', '2017-09-29 15:14:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parcela_pagamentos`
--

CREATE TABLE `parcela_pagamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `idparcela` int(10) UNSIGNED NOT NULL,
  `idtipo_pagamento` int(10) UNSIGNED DEFAULT NULL,
  `data_pagamento` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `recibo_em` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parcela_pagamentos`
--

INSERT INTO `parcela_pagamentos` (`id`, `idparcela`, `idtipo_pagamento`, `data_pagamento`, `valor`, `recibo_em`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 14, 3, '2017-05-05', '180.00', '2017-08-04 14:49:58', '2017-05-05 19:01:52', '2017-08-04 17:49:58', NULL),
(11, 16, 3, '2017-05-05', '1508.00', NULL, '2017-05-09 16:58:23', '2017-05-09 16:58:23', NULL),
(12, 16, 5, '2017-05-05', '4000.00', NULL, '2017-05-12 02:11:57', '2017-05-12 02:11:57', NULL),
(13, 16, 3, '2017-05-12', '1000.00', NULL, '2017-05-12 11:37:35', '2017-05-12 11:37:35', NULL),
(14, 17, 3, '2017-05-16', '1800.00', NULL, '2017-05-16 16:44:30', '2017-05-16 16:44:30', NULL),
(15, 28, 2, '2017-01-26', '1000.00', NULL, '2017-05-18 17:30:47', '2017-05-18 17:30:47', NULL),
(16, 28, 1, '2017-05-18', '721.00', NULL, '2017-05-18 17:30:57', '2017-05-18 17:30:57', NULL),
(17, 29, 3, '2017-03-08', '1000.00', NULL, '2017-05-18 17:43:00', '2017-05-18 17:43:00', NULL),
(18, 30, 1, '2017-05-18', '1166.67', NULL, '2017-05-18 17:47:49', '2017-05-18 17:47:49', NULL),
(19, 31, 1, '2017-06-18', '1166.67', NULL, '2017-05-18 17:48:11', '2017-05-18 17:48:11', NULL),
(20, 32, 1, '2017-08-18', '1166.67', NULL, '2017-05-18 17:48:32', '2017-05-18 17:48:32', NULL),
(24, 36, 5, '2015-10-30', '1000.00', NULL, '2017-05-30 18:35:30', '2017-05-30 18:35:30', NULL),
(25, 36, 5, '2016-02-23', '1000.00', NULL, '2017-05-30 18:36:16', '2017-05-30 18:36:16', NULL),
(26, 36, 5, '2016-02-23', '1000.00', NULL, '2017-05-30 18:36:44', '2017-05-30 18:36:44', NULL),
(27, 36, 1, '2016-05-24', '1000.00', NULL, '2017-05-30 18:37:10', '2017-05-30 18:37:10', NULL),
(28, 36, 1, '2016-05-24', '1000.00', NULL, '2017-05-30 18:37:52', '2017-05-30 18:37:52', NULL),
(31, 37, 1, '2016-06-24', '4800.00', NULL, '2017-05-30 18:39:59', '2017-05-30 18:39:59', NULL),
(32, 35, 5, '2016-09-12', '2500.00', NULL, '2017-06-02 02:28:15', '2017-06-02 02:28:15', NULL),
(34, 34, 3, '2017-06-02', '660.00', NULL, '2017-06-02 13:25:53', '2017-06-02 13:25:53', NULL),
(35, 39, 3, '2017-06-02', '200.00', NULL, '2017-06-02 16:44:26', '2017-06-02 16:44:26', NULL),
(36, 37, 1, '2016-12-13', '3000.00', NULL, '2017-06-02 18:33:44', '2017-06-02 18:33:44', NULL),
(37, 37, 5, '2017-06-02', '1748.00', NULL, '2017-06-02 19:25:08', '2017-06-02 19:25:08', NULL),
(40, 38, 5, '2017-06-02', '2310.00', NULL, '2017-06-02 19:26:45', '2017-06-02 19:26:45', NULL),
(41, 40, 5, '2017-05-09', '400.00', NULL, '2017-06-02 21:00:29', '2017-06-02 21:00:29', NULL),
(42, 41, 5, '2017-06-02', '400.00', NULL, '2017-06-02 21:01:04', '2017-06-02 21:01:04', NULL),
(43, 15, 5, '2017-05-05', '358.00', '2017-08-04 14:49:21', '2017-06-02 21:03:44', '2017-08-04 17:49:21', NULL),
(45, 43, 5, '2017-06-06', '245.00', NULL, '2017-06-06 13:36:51', '2017-06-06 13:36:51', NULL),
(46, 44, 2, '2017-04-25', '300.00', '2017-08-01 11:37:23', '2017-06-06 18:56:46', '2017-08-01 14:37:23', NULL),
(47, 45, 2, '2017-05-25', '300.00', '2017-08-01 11:37:26', '2017-06-06 18:57:04', '2017-08-01 14:37:26', NULL),
(48, 46, 2, '2017-06-26', '300.00', '2017-08-01 11:37:29', '2017-06-06 18:57:39', '2017-08-01 14:37:29', NULL),
(49, 47, 1, '2017-07-25', '300.00', '2017-08-01 11:37:31', '2017-06-06 18:57:54', '2017-08-01 14:37:31', NULL),
(50, 48, 5, '2017-06-09', '280.00', NULL, '2017-06-09 22:00:40', '2017-06-09 22:00:40', NULL),
(51, 16, 3, '2017-06-12', '2500.00', NULL, '2017-06-12 16:45:38', '2017-06-12 16:45:38', NULL),
(52, 49, 3, '2016-11-04', '500.00', NULL, '2017-06-14 12:59:50', '2017-06-14 12:59:50', NULL),
(53, 49, 3, '2016-11-11', '1000.00', NULL, '2017-06-14 13:00:30', '2017-06-14 13:00:30', NULL),
(54, 49, 3, '2016-11-18', '500.00', NULL, '2017-06-14 13:01:21', '2017-06-14 13:01:21', NULL),
(55, 49, 3, '2017-01-13', '1000.00', NULL, '2017-06-14 13:02:10', '2017-06-14 13:02:10', NULL),
(56, 49, 3, '2017-02-17', '1000.00', NULL, '2017-06-14 13:03:39', '2017-06-14 13:03:39', NULL),
(57, 49, 5, '2017-06-14', '1000.00', NULL, '2017-06-14 13:03:51', '2017-06-14 13:03:51', NULL),
(58, 18, 1, '2017-06-23', '668.00', NULL, '2017-06-23 12:11:17', '2017-06-23 12:11:17', NULL),
(59, 51, 2, '2017-07-15', '333.33', NULL, '2017-06-24 16:20:25', '2017-06-24 16:20:25', NULL),
(60, 57, 2, '2017-04-25', '1300.00', '2017-08-04 14:53:09', '2017-06-27 12:57:14', '2017-08-04 17:53:09', NULL),
(61, 58, 2, '2017-03-07', '700.00', '2017-08-04 14:53:19', '2017-06-27 12:59:17', '2017-08-04 17:53:19', NULL),
(62, 58, 2, '2017-04-11', '650.00', '2017-08-04 14:53:22', '2017-06-27 12:59:41', '2017-08-04 17:53:22', NULL),
(63, 59, 2, '2017-01-03', '1188.00', '2017-08-04 14:53:32', '2017-06-27 13:01:57', '2017-08-04 17:53:32', NULL),
(64, 60, 5, '2017-06-28', '180.00', NULL, '2017-06-28 20:26:39', '2017-06-28 20:26:39', NULL),
(65, 61, 3, '2017-06-20', '1755.00', NULL, '2017-06-29 18:26:46', '2017-06-29 18:26:46', NULL),
(66, 16, 3, '2017-07-03', '3000.00', NULL, '2017-07-03 17:13:22', '2017-07-03 17:13:22', NULL),
(67, 38, 5, '2017-07-04', '2000.00', NULL, '2017-07-04 19:53:10', '2017-07-04 19:53:10', NULL),
(69, 42, 5, '2017-07-07', '350.00', NULL, '2017-07-07 13:41:01', '2017-07-07 13:41:01', NULL),
(70, 39, 1, '2017-07-07', '150.00', NULL, '2017-07-07 17:26:10', '2017-07-07 17:26:10', NULL),
(71, 50, 3, '2017-07-07', '0.00', NULL, '2017-07-07 18:24:21', '2017-07-07 18:24:21', NULL),
(72, 63, 5, '2017-04-07', '1750.00', NULL, '2017-07-10 12:16:42', '2017-07-10 12:16:42', NULL),
(73, 64, 5, '2017-07-13', '333.34', NULL, '2017-07-13 20:58:42', '2017-07-13 20:58:42', NULL),
(74, 21, 3, '2017-07-14', '668.00', NULL, '2017-07-14 18:22:07', '2017-07-14 18:22:07', NULL),
(75, 20, 3, '2017-06-14', '668.00', NULL, '2017-07-14 18:22:39', '2017-07-14 18:22:39', NULL),
(76, 65, 2, '2017-07-14', '250.00', NULL, '2017-07-14 18:49:46', '2017-07-14 18:49:46', NULL),
(77, 66, 2, '2017-08-14', '250.00', NULL, '2017-07-14 18:50:33', '2017-07-14 18:50:33', NULL),
(78, 67, 2, '2017-09-14', '250.00', NULL, '2017-07-14 18:51:01', '2017-07-14 18:51:01', NULL),
(79, 68, 2, '2017-10-14', '250.00', NULL, '2017-07-14 18:51:25', '2017-07-14 18:51:25', NULL),
(80, 69, 2, '2017-11-14', '250.00', NULL, '2017-07-14 18:51:45', '2017-07-14 18:51:45', NULL),
(81, 70, 2, '2017-12-14', '250.00', NULL, '2017-07-14 18:52:03', '2017-07-19 16:53:27', NULL),
(82, 72, 2, '2017-03-23', '1500.00', '2017-07-19 12:29:17', '2017-07-18 17:01:27', '2017-07-19 15:29:17', NULL),
(83, 72, 2, '2017-04-27', '1100.00', NULL, '2017-07-18 17:01:56', '2017-07-18 17:01:56', NULL),
(84, 72, 2, '2017-06-01', '1000.00', NULL, '2017-07-18 17:02:19', '2017-07-18 17:02:19', NULL),
(85, 72, 2, '2017-07-18', '1000.00', NULL, '2017-07-18 17:02:38', '2017-07-18 17:02:38', NULL),
(86, 73, 5, '2017-07-24', '3000.00', NULL, '2017-07-24 20:25:54', '2017-07-24 20:25:54', NULL),
(87, 80, 3, '2015-10-27', '2400.00', NULL, '2017-07-26 18:33:10', '2017-07-26 18:33:10', NULL),
(88, 80, 3, '2015-11-27', '2400.00', NULL, '2017-07-26 18:33:37', '2017-07-26 18:33:37', NULL),
(89, 80, 3, '2015-12-27', '2400.00', NULL, '2017-07-26 18:34:00', '2017-07-26 18:34:00', NULL),
(90, 81, 3, '2016-03-18', '2500.00', NULL, '2017-07-26 18:34:59', '2017-07-26 18:34:59', NULL),
(91, 81, 3, '2017-07-26', '2700.00', NULL, '2017-07-26 18:35:26', '2017-07-26 18:35:26', NULL),
(92, 82, 3, '2017-08-01', '900.00', '2017-08-01 09:45:27', '2017-08-01 12:44:39', '2017-08-01 12:45:27', NULL),
(93, 83, 2, '2017-08-01', '1500.00', '2017-08-01 17:02:08', '2017-08-01 20:01:52', '2017-08-01 20:02:08', NULL),
(94, 84, 2, '2017-08-15', '3000.00', NULL, '2017-08-01 21:49:02', '2017-08-01 21:49:02', NULL),
(95, 85, 2, '2017-09-15', '1075.00', NULL, '2017-08-01 21:50:41', '2017-08-01 21:50:41', NULL),
(96, 86, 2, '2017-10-15', '1075.00', NULL, '2017-08-01 21:51:09', '2017-08-01 21:51:09', NULL),
(97, 87, 2, '2017-11-15', '1075.00', NULL, '2017-08-01 21:51:41', '2017-08-01 21:51:41', NULL),
(98, 88, 2, '2017-12-01', '1075.00', NULL, '2017-08-01 21:52:14', '2017-08-01 21:52:14', NULL),
(99, 89, 2, '2018-01-01', '1075.00', NULL, '2017-08-01 21:53:48', '2017-08-01 21:53:48', NULL),
(100, 90, 2, '2018-02-01', '1075.00', NULL, '2017-08-01 21:54:13', '2017-08-01 21:54:13', NULL),
(101, 91, 2, '2017-08-01', '214.00', NULL, '2017-08-01 22:11:31', '2017-08-01 22:11:31', NULL),
(102, 38, 5, '2017-08-03', '1400.00', NULL, '2017-08-03 20:10:47', '2017-08-03 20:10:47', NULL),
(103, 93, 2, '2017-08-03', '360.00', '2017-08-03 19:27:05', '2017-08-03 22:24:40', '2017-08-03 22:27:05', NULL),
(104, 94, 2, '2017-09-03', '360.00', '2017-08-03 19:27:09', '2017-08-03 22:25:09', '2017-08-03 22:27:09', NULL),
(105, 95, 2, '2017-10-03', '360.00', '2017-08-03 19:27:11', '2017-08-03 22:25:35', '2017-08-03 22:27:11', NULL),
(106, 96, 2, '2017-11-03', '360.00', '2017-08-03 19:27:13', '2017-08-03 22:26:19', '2017-08-03 22:27:13', NULL),
(107, 97, 2, '2017-12-03', '360.00', '2017-08-03 19:27:16', '2017-08-03 22:26:52', '2017-08-03 22:27:16', NULL),
(108, 39, 3, '2017-08-04', '150.00', NULL, '2017-08-04 16:43:07', '2017-08-04 16:43:07', NULL),
(109, 98, 5, '2017-05-08', '400.00', '2017-08-04 14:58:41', '2017-08-04 17:57:48', '2017-08-04 17:58:41', NULL),
(110, 98, 5, '2017-06-02', '400.00', '2017-08-04 14:58:45', '2017-08-04 17:58:10', '2017-08-04 17:58:45', NULL),
(111, 98, 5, '2017-07-07', '350.00', '2017-08-04 14:58:48', '2017-08-04 17:58:34', '2017-08-04 17:58:48', NULL),
(112, 99, 2, '2017-02-03', '3800.00', '2017-08-04 15:02:43', '2017-08-04 18:02:34', '2017-08-04 18:02:43', NULL),
(113, 49, 3, '2017-08-08', '2000.00', NULL, '2017-08-08 12:06:42', '2017-08-08 12:06:42', NULL),
(114, 100, 5, '2017-07-05', '1500.00', NULL, '2017-08-10 17:52:41', '2017-08-10 17:52:41', NULL),
(115, 74, 2, '2017-08-15', '1000.00', NULL, '2017-08-17 18:16:48', '2017-08-17 18:16:48', NULL),
(116, 75, 2, '2017-09-15', '1000.00', NULL, '2017-08-17 18:17:18', '2017-08-17 18:17:18', NULL),
(117, 76, 2, '2017-10-15', '1000.00', NULL, '2017-08-17 18:17:54', '2017-08-17 18:17:54', NULL),
(118, 77, 2, '2017-11-17', '1000.00', NULL, '2017-08-17 18:18:28', '2017-08-17 18:18:28', NULL),
(119, 78, 2, '2017-12-17', '1000.00', NULL, '2017-08-17 18:19:21', '2017-08-17 18:19:21', NULL),
(120, 79, 2, '2018-01-20', '1000.00', NULL, '2017-08-17 18:19:51', '2017-08-17 18:19:51', NULL),
(121, 82, 2, '2017-08-22', '890.00', '2017-08-22 10:56:24', '2017-08-22 13:45:10', '2017-08-22 13:56:24', NULL),
(122, 103, 2, '2017-08-25', '1500.00', NULL, '2017-08-25 14:26:31', '2017-08-25 14:26:31', NULL),
(123, 72, 2, '2017-09-15', '1000.00', NULL, '2017-09-15 15:42:54', '2017-09-15 15:42:54', NULL),
(124, 39, 3, '2017-09-15', '100.00', NULL, '2017-09-15 19:08:00', '2017-09-15 19:08:00', NULL),
(125, 49, 3, '2017-09-22', '1000.00', NULL, '2017-09-22 13:53:04', '2017-09-22 13:53:04', NULL),
(126, 38, 5, '2017-09-04', '1400.00', NULL, '2017-09-26 16:44:41', '2017-09-26 16:44:41', NULL),
(127, 38, 5, '2017-09-21', '1400.00', NULL, '2017-09-26 16:45:03', '2017-09-26 16:45:03', NULL),
(128, 105, 2, '2017-10-05', '1200.00', NULL, '2017-09-29 15:12:34', '2017-09-29 15:12:34', NULL),
(129, 106, 2, '2017-11-05', '530.00', NULL, '2017-09-29 15:13:02', '2017-09-29 15:13:02', NULL),
(130, 107, 2, '2017-12-05', '530.00', NULL, '2017-09-29 15:13:33', '2017-09-29 15:13:33', NULL),
(131, 108, 2, '2018-01-05', '530.00', NULL, '2017-09-29 15:13:54', '2017-09-29 15:13:54', NULL),
(132, 109, 2, '2017-02-05', '530.00', NULL, '2017-09-29 15:14:15', '2017-09-29 15:14:15', NULL),
(133, 49, 3, '2017-10-03', '97.50', NULL, '2017-10-03 12:46:50', '2017-10-03 12:46:50', NULL),
(134, 71, 3, '2017-10-03', '903.00', NULL, '2017-10-03 12:47:58', '2017-10-03 12:47:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pergunta`
--

CREATE TABLE `pergunta` (
  `idpergunta` int(10) UNSIGNED NOT NULL,
  `idanamnese` int(10) UNSIGNED NOT NULL,
  `numero_ordem` tinyint(3) UNSIGNED NOT NULL,
  `tipo_pergunta` tinyint(3) UNSIGNED NOT NULL,
  `tipo_resposta` tinyint(3) UNSIGNED NOT NULL,
  `texto_pergunta` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `msg_alerta` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pergunta`
--

INSERT INTO `pergunta` (`idpergunta`, `idanamnese`, `numero_ordem`, `tipo_pergunta`, `tipo_resposta`, `texto_pergunta`, `msg_alerta`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 'Possui algum problema de saúde?', '', '2017-03-28 20:17:01', '2017-03-28 20:17:01', NULL),
(2, 1, 2, 0, 0, 'Possui problemas cardíacos?', 'Problemas Cardíacos', '2017-03-28 20:17:54', '2017-03-28 20:17:54', NULL),
(3, 1, 3, 0, 0, 'Possui Diabetes?', 'Diabético', '2017-03-28 20:18:17', '2017-03-28 20:18:27', NULL),
(4, 1, 4, 1, 1, 'Algum problema com anestesia?', 'Problemas com anestesia', '2017-03-28 20:19:02', '2017-03-28 20:19:02', NULL),
(5, 1, 5, 1, 1, 'Faz uso de algum rémedio de uso diário?', 'Utiliza remédios de uso diário', '2017-03-28 20:19:39', '2017-03-28 20:19:39', NULL),
(6, 1, 6, 0, 0, 'Faz uso de bifosfonato?', 'Utiliza Bifosfonato', '2017-03-28 20:20:12', '2017-03-28 20:20:12', NULL),
(7, 1, 7, 0, 0, 'Esta fazendo algum tratamento médico?', 'Em tratamento médico', '2017-03-28 20:20:58', '2017-05-02 14:05:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plano`
--

CREATE TABLE `plano` (
  `idplano` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `plano_status` tinyint(1) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plano`
--

INSERT INTO `plano` (`idplano`, `nome`, `plano_status`, `created_at`, `updated_at`) VALUES
(1, 'Particular', 1, NULL, NULL),
(2, 'Copacabana', 1, '2017-04-28 19:50:10', '2017-04-28 19:50:10'),
(3, 'Ilha do Governador', 1, '2017-04-28 19:50:30', '2017-04-28 19:50:30'),
(4, 'Prestador', 1, '2017-04-28 19:51:07', '2017-04-28 19:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `plano_intervencao`
--

CREATE TABLE `plano_intervencao` (
  `idplano_intervencao` int(10) UNSIGNED NOT NULL,
  `idintervencao` int(10) UNSIGNED NOT NULL,
  `idplano` int(10) UNSIGNED NOT NULL,
  `valor_plano` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plano_intervencao`
--

INSERT INTO `plano_intervencao` (`idplano_intervencao`, `idintervencao`, `idplano`, `valor_plano`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '400.00', '2017-03-28 13:00:00', NULL),
(2, 2, 1, '2500.00', '2017-03-28 13:00:00', NULL),
(3, 3, 1, '3000.00', '2017-03-28 13:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profissional`
--

CREATE TABLE `profissional` (
  `idprofissional` int(10) UNSIGNED NOT NULL,
  `idusers` int(10) UNSIGNED NOT NULL,
  `idcontato` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `cro` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profissional`
--

INSERT INTO `profissional` (`idprofissional`, `idusers`, `idcontato`, `nome`, `cpf`, `cro`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Dr. Dolittle', '00111122331', '00122', NULL, '2017-01-01 12:00:00', '2017-04-27 18:28:40', NULL),
(2, 2, 2, 'Administrador do Sistema', '00111122441', '11211', NULL, '2017-01-01 12:00:00', '2017-04-28 19:48:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recibo`
--

CREATE TABLE `recibo` (
  `idrecibo` int(10) UNSIGNED NOT NULL,
  `idparcela` int(10) UNSIGNED NOT NULL,
  `data_recibo` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `observacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resposta`
--

CREATE TABLE `resposta` (
  `idresposta` int(10) UNSIGNED NOT NULL,
  `idpergunta` int(10) UNSIGNED NOT NULL,
  `idpaciente` int(10) UNSIGNED NOT NULL,
  `resposta` tinyint(1) DEFAULT NULL,
  `texto_resposta` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resposta`
--

INSERT INTO `resposta` (`idresposta`, `idpergunta`, `idpaciente`, `resposta`, `texto_resposta`, `created_at`, `updated_at`) VALUES
(8, 2, 26, 1, NULL, '2017-07-04 14:09:27', '2017-07-04 14:09:27'),
(9, 3, 26, 0, NULL, '2017-07-04 14:09:27', '2017-07-04 14:09:27'),
(10, 4, 26, 0, '', '2017-07-04 14:09:27', '2017-07-04 14:09:27'),
(11, 5, 26, 1, 'Benicar 40, Omeprazol', '2017-07-04 14:09:27', '2017-07-04 14:09:27'),
(12, 6, 26, 0, 'Benicar 40, Omeprazol', '2017-07-04 14:09:27', '2017-07-04 14:09:27'),
(13, 7, 26, 1, 'Benicar 40, Omeprazol', '2017-07-04 14:09:27', '2017-07-04 14:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `retorno`
--

CREATE TABLE `retorno` (
  `idretorno` int(10) UNSIGNED NOT NULL,
  `idprofissional_criador` int(10) UNSIGNED NOT NULL,
  `idprofissional` int(10) UNSIGNED NOT NULL,
  `idpaciente` int(10) UNSIGNED NOT NULL,
  `data_retorno` date NOT NULL,
  `motivo_retorno` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacao` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `retorno`
--

INSERT INTO `retorno` (`idretorno`, `idprofissional_criador`, `idprofissional`, `idpaciente`, `data_retorno`, `motivo_retorno`, `observacao`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 16, '2017-12-08', 'Consulta de manutenção', 'Revisão de 6 meses', '2017-06-09 19:47:36', '2017-06-09 19:47:36'),
(4, 1, 1, 3, '2018-06-05', 'Consulta de 1 Ano', '', '2017-06-21 13:00:30', '2017-06-21 13:00:30'),
(5, 1, 1, 20, '2017-09-21', 'Confecção de coroa el 35', '', '2017-06-29 18:32:04', '2017-06-29 18:32:04'),
(6, 1, 1, 28, '2017-10-19', 'Colocação de Coroa no Implante do 46', '', '2017-07-13 20:59:30', '2017-07-13 20:59:30'),
(7, 1, 1, 18, '2017-10-24', 'Cirurgia do 15 e Instalação de coro do 36', '', '2017-07-26 17:26:17', '2017-07-26 17:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'profissional', 'Profissional', 'Acesso total ao sistema', '2017-03-28 22:49:32', '2017-03-28 22:49:32'),
(2, 'dentista', 'Dentista', 'Acesso restrito ao sistema', '2017-03-28 22:49:32', '2017-03-28 22:49:32'),
(3, 'equipe', 'Equipe', 'Acesso restrito ao sistema', '2017-03-28 22:49:32', '2017-03-28 22:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_pagamento`
--

CREATE TABLE `tipo_pagamento` (
  `idtipo_pagamento` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipo_pagamento`
--

INSERT INTO `tipo_pagamento` (`idtipo_pagamento`, `nome`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cartão de Crédito', '2017-01-01 12:00:00', NULL, NULL),
(2, 'Cheque', '2017-01-01 12:00:00', NULL, NULL),
(3, 'Dinheiro', '2017-01-01 12:00:00', NULL, NULL),
(4, 'Outros', '2017-05-02 14:04:12', '2017-05-02 14:04:12', NULL),
(5, 'Depósito Bancário', '2017-05-12 02:11:21', '2017-05-12 02:11:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `idprofissional_criador` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `idprofissional_criador`, `nome`, `descricao`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Receita para implante', 'Pré-operatório', 'a524428b0beb93c4f21fc9cea35c8da9.pdf', '2017-07-06 00:35:56', '2017-07-06 00:35:56', NULL),
(2, 1, 'Recomendação pré e pós', 'Pre e Pos operatório', 'b8ab551b85b524aeb808b7f098fde2f8.pdf', '2017-07-13 02:30:42', '2017-07-13 02:30:42', NULL),
(3, 1, 'Receituario', 'Em branco', '5f9bf38545961034f662561291b153f3.pdf', '2017-07-13 02:32:03', '2017-07-13 02:32:03', NULL),
(4, 1, 'Ficha de evolução', 'Em branco', 'dff720979ba7a71cc19b2e09b2424d38.pdf', '2017-08-11 19:05:59', '2017-08-11 19:05:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@cdental.com', '$2y$10$wP.wmdkfTBncC1pZZb1it.AE8IXKg.yUCl0rGDmbU4xsw31rImgoG', 'n57ZtGtzWmTYEDLx3vvaYcKaHA17ZJkHOkSAHCPbkO2oPtcsDIg6fTV6huDm', '2017-01-01 12:00:00', '2017-10-04 12:26:43'),
(2, 'silva.zanin@gmail.com', '$2y$10$wP.wmdkfTBncC1pZZb1it.AE8IXKg.yUCl0rGDmbU4xsw31rImgoG', '8wwqfwEOTLLmKxEuHoUofq1Dzf1OzWmmJRBEvFzA0kzua53wH7UxG8AE84YO', '2017-01-01 12:00:00', '2017-09-13 13:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `valores`
--

CREATE TABLE `valores` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `data` date NOT NULL,
  `fonte` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `documento` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `valores`
--

INSERT INTO `valores` (`id`, `tipo`, `data`, `fonte`, `documento`, `valor`, `created_at`, `updated_at`) VALUES
(4, 0, '2017-07-19', 'MATERIAIS LIMPEZA LTDA', '55544/000744470', '420.96', '2017-07-19 15:31:37', '2017-07-19 15:35:35'),
(5, 0, '2017-07-19', 'CONSTRUÇÃO', '004481537/0001-06', '504.00', '2017-07-19 15:33:23', '2017-07-19 15:33:23'),
(6, 0, '2017-07-19', 'MAteriais', '11115/00444', '851.57', '2017-07-19 15:56:02', '2017-07-19 15:56:02'),
(7, 0, '2017-07-24', 'Material', 'Não declarar', '0.00', '2017-07-24 20:26:45', '2017-07-24 20:27:12'),
(8, 0, '2017-07-26', 'MANUTENÇÃO', 'Nao declarar', '35.00', '2017-07-26 18:45:40', '2017-07-26 18:45:40'),
(9, 0, '2017-07-26', 'PLANO', '1213142/11-01', '3000.00', '2017-07-26 19:12:07', '2017-07-26 19:12:07'),
(10, 0, '2017-08-01', 'TRANSFERÊNCIA', 'Ver nos outros', '429.00', '2017-08-01 20:35:20', '2017-08-01 20:35:20'),
(11, 0, '2017-08-10', 'SIN', '145666/0026-223', '339.00', '2017-08-04 17:37:59', '2017-08-04 17:37:59'),
(12, 0, '2017-09-02', 'SIN', 'cc23233/00222', '339.00', '2017-08-04 17:38:29', '2017-08-04 17:38:29'),
(13, 1, '2017-08-08', 'Despesas', 'n/A', '700.00', '2017-08-08 15:58:46', '2017-08-08 15:58:46'),
(14, 0, '2017-08-08', 'Clínica', 'N/A', '68.59', '2017-08-08 17:05:44', '2017-08-08 17:05:44'),
(15, 1, '2017-09-20', 'SITUAÇÃO', '21E2ERR', '625.00', '2017-09-22 14:19:00', '2017-09-22 14:19:00'),
(16, 1, '2017-09-20', 'CLINICA ODONTOLOGICA', '23AS416541-SFD', '2640.00', '2017-09-22 14:20:26', '2017-09-22 14:20:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anamnese`
--
ALTER TABLE `anamnese`
  ADD PRIMARY KEY (`idanamnese`),
  ADD KEY `anamnese_idprofissional_criador_foreign` (`idprofissional_criador`);

--
-- Indexes for table `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cheques_idplano_foreign` (`idplano`);

--
-- Indexes for table `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`idclinica`),
  ADD UNIQUE KEY `clinica_nome_unique` (`nome`),
  ADD UNIQUE KEY `clinica_email_unique` (`email`),
  ADD KEY `clinica_idresponsavel_foreign` (`idresponsavel`),
  ADD KEY `clinica_idcontato_foreign` (`idcontato`);

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `consulta_idprofissional_criador_foreign` (`idprofissional_criador`),
  ADD KEY `consulta_idprofissional_foreign` (`idprofissional`),
  ADD KEY `consulta_idpaciente_foreign` (`idpaciente`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idcontato`);

--
-- Indexes for table `evolucao`
--
ALTER TABLE `evolucao`
  ADD PRIMARY KEY (`idevolucao`),
  ADD KEY `evolucao_idprofissional_criador_foreign` (`idprofissional_criador`),
  ADD KEY `evolucao_idpaciente_foreign` (`idpaciente`);

--
-- Indexes for table `impressos`
--
ALTER TABLE `impressos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `impressos_idprofissional_criador_foreign` (`idprofissional_criador`);

--
-- Indexes for table `intervencao`
--
ALTER TABLE `intervencao`
  ADD PRIMARY KEY (`idintervencao`),
  ADD UNIQUE KEY `intervencao_nome_unique` (`nome`);

--
-- Indexes for table `item_orcamento`
--
ALTER TABLE `item_orcamento`
  ADD PRIMARY KEY (`iditem_orcamento`),
  ADD KEY `item_orcamento_idorcamento_foreign` (`idorcamento`),
  ADD KEY `item_orcamento_idintervencao_foreign` (`idintervencao`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`idorcamento`),
  ADD KEY `orcamento_idprofissional_foreign` (`idprofissional`),
  ADD KEY `orcamento_idpaciente_foreign` (`idpaciente`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`),
  ADD UNIQUE KEY `paciente_idcontato_unique` (`idcontato`),
  ADD KEY `paciente_idplano_foreign` (`idplano`),
  ADD KEY `paciente_idprofissional_criador_foreign` (`idprofissional_criador`);

--
-- Indexes for table `paciente_documentos`
--
ALTER TABLE `paciente_documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_documentos_idprofissional_criador_foreign` (`idprofissional_criador`),
  ADD KEY `paciente_documentos_idpaciente_foreign` (`idpaciente`);

--
-- Indexes for table `paciente_images`
--
ALTER TABLE `paciente_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_images_idprofissional_criador_foreign` (`idprofissional_criador`),
  ADD KEY `paciente_images_idpaciente_foreign` (`idpaciente`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idpagamento`),
  ADD KEY `pagamento_idorcamento_foreign` (`idorcamento`),
  ADD KEY `pagamento_idpaciente_foreign` (`idpaciente`);

--
-- Indexes for table `parcela`
--
ALTER TABLE `parcela`
  ADD PRIMARY KEY (`idparcela`),
  ADD KEY `parcela_idpagamento_foreign` (`idpagamento`);

--
-- Indexes for table `parcela_pagamentos`
--
ALTER TABLE `parcela_pagamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parcela_pagamentos_idparcela_foreign` (`idparcela`),
  ADD KEY `parcela_pagamentos_idtipo_pagamento_foreign` (`idtipo_pagamento`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`idpergunta`),
  ADD KEY `pergunta_idanamnese_foreign` (`idanamnese`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`idplano`),
  ADD UNIQUE KEY `plano_nome_unique` (`nome`);

--
-- Indexes for table `plano_intervencao`
--
ALTER TABLE `plano_intervencao`
  ADD PRIMARY KEY (`idplano_intervencao`),
  ADD KEY `plano_intervencao_idintervencao_foreign` (`idintervencao`),
  ADD KEY `plano_intervencao_idplano_foreign` (`idplano`);

--
-- Indexes for table `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`idprofissional`),
  ADD UNIQUE KEY `profissional_cpf_unique` (`cpf`),
  ADD KEY `profissional_idusers_foreign` (`idusers`),
  ADD KEY `profissional_idcontato_foreign` (`idcontato`);

--
-- Indexes for table `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`idrecibo`),
  ADD KEY `recibo_idparcela_foreign` (`idparcela`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`idresposta`),
  ADD KEY `resposta_idpergunta_foreign` (`idpergunta`),
  ADD KEY `resposta_idpaciente_foreign` (`idpaciente`);

--
-- Indexes for table `retorno`
--
ALTER TABLE `retorno`
  ADD PRIMARY KEY (`idretorno`),
  ADD KEY `retorno_idprofissional_criador_foreign` (`idprofissional_criador`),
  ADD KEY `retorno_idprofissional_foreign` (`idprofissional`),
  ADD KEY `retorno_idpaciente_foreign` (`idpaciente`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  ADD PRIMARY KEY (`idtipo_pagamento`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_idprofissional_criador_foreign` (`idprofissional_criador`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anamnese`
--
ALTER TABLE `anamnese`
  MODIFY `idanamnese` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `clinica`
--
ALTER TABLE `clinica`
  MODIFY `idclinica` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idconsulta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `idcontato` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `evolucao`
--
ALTER TABLE `evolucao`
  MODIFY `idevolucao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `impressos`
--
ALTER TABLE `impressos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `intervencao`
--
ALTER TABLE `intervencao`
  MODIFY `idintervencao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `item_orcamento`
--
ALTER TABLE `item_orcamento`
  MODIFY `iditem_orcamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `idorcamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `paciente_images`
--
ALTER TABLE `paciente_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idpagamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `parcela`
--
ALTER TABLE `parcela`
  MODIFY `idparcela` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `parcela_pagamentos`
--
ALTER TABLE `parcela_pagamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `idpergunta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plano`
--
ALTER TABLE `plano`
  MODIFY `idplano` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `plano_intervencao`
--
ALTER TABLE `plano_intervencao`
  MODIFY `idplano_intervencao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profissional`
--
ALTER TABLE `profissional`
  MODIFY `idprofissional` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `recibo`
--
ALTER TABLE `recibo`
  MODIFY `idrecibo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `idresposta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `retorno`
--
ALTER TABLE `retorno`
  MODIFY `idretorno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  MODIFY `idtipo_pagamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `valores`
--
ALTER TABLE `valores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anamnese`
--
ALTER TABLE `anamnese`
  ADD CONSTRAINT `anamnese_idprofissional_criador_foreign` FOREIGN KEY (`idprofissional_criador`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `cheques`
--
ALTER TABLE `cheques`
  ADD CONSTRAINT `cheques_idplano_foreign` FOREIGN KEY (`idplano`) REFERENCES `plano` (`idplano`) ON DELETE CASCADE;

--
-- Constraints for table `clinica`
--
ALTER TABLE `clinica`
  ADD CONSTRAINT `clinica_idcontato_foreign` FOREIGN KEY (`idcontato`) REFERENCES `contato` (`idcontato`),
  ADD CONSTRAINT `clinica_idresponsavel_foreign` FOREIGN KEY (`idresponsavel`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_idpaciente_foreign` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`),
  ADD CONSTRAINT `consulta_idprofissional_criador_foreign` FOREIGN KEY (`idprofissional_criador`) REFERENCES `profissional` (`idprofissional`),
  ADD CONSTRAINT `consulta_idprofissional_foreign` FOREIGN KEY (`idprofissional`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `evolucao`
--
ALTER TABLE `evolucao`
  ADD CONSTRAINT `evolucao_idpaciente_foreign` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`),
  ADD CONSTRAINT `evolucao_idprofissional_criador_foreign` FOREIGN KEY (`idprofissional_criador`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `impressos`
--
ALTER TABLE `impressos`
  ADD CONSTRAINT `impressos_idprofissional_criador_foreign` FOREIGN KEY (`idprofissional_criador`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `item_orcamento`
--
ALTER TABLE `item_orcamento`
  ADD CONSTRAINT `item_orcamento_idintervencao_foreign` FOREIGN KEY (`idintervencao`) REFERENCES `intervencao` (`idintervencao`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_orcamento_idorcamento_foreign` FOREIGN KEY (`idorcamento`) REFERENCES `orcamento` (`idorcamento`) ON DELETE CASCADE;

--
-- Constraints for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD CONSTRAINT `orcamento_idpaciente_foreign` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`),
  ADD CONSTRAINT `orcamento_idprofissional_foreign` FOREIGN KEY (`idprofissional`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_idcontato_foreign` FOREIGN KEY (`idcontato`) REFERENCES `contato` (`idcontato`),
  ADD CONSTRAINT `paciente_idplano_foreign` FOREIGN KEY (`idplano`) REFERENCES `plano` (`idplano`),
  ADD CONSTRAINT `paciente_idprofissional_criador_foreign` FOREIGN KEY (`idprofissional_criador`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `paciente_documentos`
--
ALTER TABLE `paciente_documentos`
  ADD CONSTRAINT `paciente_documentos_idpaciente_foreign` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `paciente_documentos_idprofissional_criador_foreign` FOREIGN KEY (`idprofissional_criador`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `paciente_images`
--
ALTER TABLE `paciente_images`
  ADD CONSTRAINT `paciente_images_idpaciente_foreign` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `paciente_images_idprofissional_criador_foreign` FOREIGN KEY (`idprofissional_criador`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_idorcamento_foreign` FOREIGN KEY (`idorcamento`) REFERENCES `orcamento` (`idorcamento`) ON DELETE CASCADE,
  ADD CONSTRAINT `pagamento_idpaciente_foreign` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE;

--
-- Constraints for table `parcela`
--
ALTER TABLE `parcela`
  ADD CONSTRAINT `parcela_idpagamento_foreign` FOREIGN KEY (`idpagamento`) REFERENCES `pagamento` (`idpagamento`) ON DELETE CASCADE;

--
-- Constraints for table `parcela_pagamentos`
--
ALTER TABLE `parcela_pagamentos`
  ADD CONSTRAINT `parcela_pagamentos_idparcela_foreign` FOREIGN KEY (`idparcela`) REFERENCES `parcela` (`idparcela`) ON DELETE CASCADE,
  ADD CONSTRAINT `parcela_pagamentos_idtipo_pagamento_foreign` FOREIGN KEY (`idtipo_pagamento`) REFERENCES `tipo_pagamento` (`idtipo_pagamento`) ON DELETE CASCADE;

--
-- Constraints for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `pergunta_idanamnese_foreign` FOREIGN KEY (`idanamnese`) REFERENCES `anamnese` (`idanamnese`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plano_intervencao`
--
ALTER TABLE `plano_intervencao`
  ADD CONSTRAINT `plano_intervencao_idintervencao_foreign` FOREIGN KEY (`idintervencao`) REFERENCES `intervencao` (`idintervencao`),
  ADD CONSTRAINT `plano_intervencao_idplano_foreign` FOREIGN KEY (`idplano`) REFERENCES `plano` (`idplano`) ON DELETE CASCADE;

--
-- Constraints for table `profissional`
--
ALTER TABLE `profissional`
  ADD CONSTRAINT `profissional_idcontato_foreign` FOREIGN KEY (`idcontato`) REFERENCES `contato` (`idcontato`),
  ADD CONSTRAINT `profissional_idusers_foreign` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`);

--
-- Constraints for table `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `recibo_idparcela_foreign` FOREIGN KEY (`idparcela`) REFERENCES `parcela` (`idparcela`) ON DELETE CASCADE;

--
-- Constraints for table `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_idpaciente_foreign` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`),
  ADD CONSTRAINT `resposta_idpergunta_foreign` FOREIGN KEY (`idpergunta`) REFERENCES `pergunta` (`idpergunta`);

--
-- Constraints for table `retorno`
--
ALTER TABLE `retorno`
  ADD CONSTRAINT `retorno_idpaciente_foreign` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`),
  ADD CONSTRAINT `retorno_idprofissional_criador_foreign` FOREIGN KEY (`idprofissional_criador`) REFERENCES `profissional` (`idprofissional`),
  ADD CONSTRAINT `retorno_idprofissional_foreign` FOREIGN KEY (`idprofissional`) REFERENCES `profissional` (`idprofissional`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`idusers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_idprofissional_criador_foreign` FOREIGN KEY (`idprofissional_criador`) REFERENCES `profissional` (`idprofissional`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
