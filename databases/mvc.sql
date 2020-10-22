-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 22, 2020 at 06:01 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispatcher`
--

CREATE TABLE `dispatcher` (
  `id` int(11) UNSIGNED NOT NULL,
  `fk_results` int(11) DEFAULT NULL,
  `fk_results_tasks` int(11) DEFAULT NULL,
  `fk_results_description` int(11) DEFAULT NULL,
  `fk_results_query` int(11) DEFAULT NULL,
  `fk_results_link` int(11) DEFAULT NULL,
  `fk_results_img` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dispatcher`
--

INSERT INTO `dispatcher` (`id`, `fk_results`, `fk_results_tasks`, `fk_results_description`, `fk_results_query`, `fk_results_link`, `fk_results_img`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL, NULL),
(3, 3, 3, NULL, NULL, NULL, NULL),
(4, 4, 4, NULL, NULL, NULL, NULL),
(5, 5, 5, NULL, NULL, NULL, NULL),
(6, 6, 6, NULL, NULL, NULL, NULL),
(7, 7, 7, NULL, NULL, NULL, NULL),
(8, 8, 8, NULL, NULL, NULL, NULL),
(9, 9, 9, NULL, NULL, NULL, NULL),
(10, 10, 10, NULL, NULL, NULL, NULL),
(11, 11, 11, NULL, NULL, NULL, NULL),
(12, 12, 12, NULL, NULL, NULL, NULL),
(13, 13, 13, NULL, NULL, NULL, NULL),
(14, 14, 14, NULL, NULL, NULL, 1),
(15, 15, 15, 1, NULL, NULL, NULL),
(16, 16, 16, 2, NULL, NULL, NULL),
(17, 17, 17, 3, NULL, NULL, NULL),
(18, 18, 18, 4, 1, NULL, NULL),
(19, 19, 19, 5, NULL, NULL, NULL),
(20, 20, 20, 6, 2, NULL, NULL),
(21, 21, 21, 7, NULL, NULL, NULL),
(22, 22, 22, 8, 3, NULL, NULL),
(23, 23, 22, 9, 4, NULL, NULL),
(24, 24, 22, 10, 5, NULL, NULL),
(25, 25, 23, 11, NULL, NULL, NULL),
(26, 26, 15, 12, NULL, NULL, NULL),
(27, 27, 16, 13, NULL, NULL, NULL),
(28, 28, 17, 13, 20, NULL, NULL),
(29, 29, 16, 13, NULL, NULL, NULL),
(30, 30, 17, 13, 21, NULL, NULL),
(31, 31, 16, 13, NULL, NULL, NULL),
(32, 32, 17, 13, 22, NULL, NULL),
(33, 33, 16, 13, NULL, NULL, NULL),
(34, 34, 17, 13, 23, NULL, NULL),
(35, 35, 25, 14, NULL, 1, NULL),
(36, 36, 25, 14, NULL, 2, NULL),
(37, 37, 26, 15, 7, NULL, NULL),
(38, 38, 18, 16, 8, NULL, NULL),
(39, 39, 18, 17, 9, NULL, NULL),
(40, 40, 26, 18, 19, NULL, NULL),
(41, 41, 26, 19, 11, NULL, NULL),
(42, 42, 18, 20, 12, NULL, NULL),
(43, 43, 18, 21, 13, NULL, NULL),
(44, 44, 18, 22, 14, NULL, NULL),
(45, 45, 27, 23, 18, NULL, NULL),
(46, 46, 28, 24, 15, NULL, NULL),
(47, 47, 27, 25, 16, NULL, NULL),
(48, 48, 28, 26, 17, NULL, NULL),
(49, 49, 29, 27, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) UNSIGNED NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `result`) VALUES
(1, 'Structured Query Language.'),
(2, 'Relationales Datenbankverwaltungssystem, weltweit verbreitet. Basiert auf einem tabellenbasierten relationalen Datenbankmodell. Relation ist der Mathematische Ausdruck der Beziehung zwischen den Elementen eine Menge und beschreibt eine Tabelle.'),
(3, 'Eine Sammlung von Tabellen, die miteinander in konstruierten Beziehungen stehen, und in der sich Tupel (Datensätze) befinden.'),
(4, 'Datensätze, Tupel, sind inhaltlich zusammenhängende Datenfelder.'),
(5, 'Datenfelder sind Eigenschaften der Datensätzen, die in unterschiedlichen Datentypen vorliegen.'),
(6, 'Ein eindeutiger, ganzzahliger Wert, der nur einmaliger in einer Tabelle auftaucht und der ein Tupel identifiziert. Wird der Primärschlüssel in einer anderen Relation verwendet, bezeichnet der Primärschlüssel als Fremdschlüssel bezeichnet.'),
(7, 'Eine Beziehung ist ein Zusammenhang zwischen zwei oder mehreren Entitäten. Es gibt 1:1 Beziehungen -> wird verwendet, um Tabelle zu teilen. 1:n Beziehungen -> ein Tupel in einer Tabelle steht in Verbindung zu mehreren Datensätzen in anderen Entitäten m:n Beziehungen: viele zu vielen Beziehungen. Mehrere Tupel einer Tabelle stehen in Zusammenhang zu einer andere Tabelle, die Beziehungen werden in einer Verbindungstabelle mittels Fremdschlüsseln realisiert.'),
(8, 'Aufteilung einer einer Datenbank in Relationen, Tabellen, die Über Fremdschlüsseln verbunden werden, um eine redundanzfreie und klare Struktur zu schaffen.'),
(9, 'Eine Sinnvolle Zerlegung von Attributen, Datenbankfeldern, die mittels Fremdschlüsseln verbunden werden.'),
(10, 'Redundanz ist das mehrfache Vorkommen von Datenfeldern in Entitäten, somit bedeutet das Vermeiden von Redundanzen: einmalige vorkommen von Datenbankfeldern.'),
(11, 'Eine Relation besteht ja aus Tupeln und Attributen. Eine Relation wird auch mit einer Tabelle beschrieben, somit bedeutet das einfach nur das Aufstellen einer Tabelle mit Datensätzen und Datenfeldern.'),
(12, 'Es ist ein Entity - Relationship-Modell, also ein Modell zur Darstellung von Dingen, Gegenständen, also Objekten und den Beziehungen und Zusammenhängen dazu.'),
(13, 'Objekte mit Eigenschaften in Beziehungen zu anderen Objekten mit dessen Eigenschaften.'),
(14, 'Entitätstyp als Rechteck, Beziehung als Raute. Attribut als Oval und Oval in geschtrichelten Linien alsAbgeleitetes Atribut .'),
(15, 'CREATE DATABASE tlnverwaltung'),
(16, 'CREATE TABLE tlnverwaltung.adressen ( id INT(50) NOT NULL AUTO_INCREMENT, name VARCHAR(30) NOT NULL, vorname VARCHAR(30) NOT NULL, email VARCHAR(60) NOT NULL, PRIMARY KEY (id) ) ENGINE = InnoDB'),
(17, 'INSERT INTO adressen (id, name, vorname, email) VALUES ( \'1\', \'Müller\', \'Tina\', \'tina@müller.de\' ), ( ‘2\', ‘Schulz\', ‘David\', \'davidSchulz@schulz.com\' ), ( ‘3\', ‘Schuster\', ‘Tom\', \'schuster.t@gmx.net\' ), ( ‘4\', ‘Lerch\', ‘Gabi\', \'glerch@freenet.de\' )'),
(18, 'SELECT * FROM adressen'),
(19, 'DELETE FROM adressen WHERE adressen . id = 1;\" . \"DELETE FROM adressen WHERE adressen . id = 2;\" . \"DELETE FROM adressen WHERE adressen . id = 3;\" . \"DELETE FROM adressen WHERE adressen . id = 4;'),
(20, 'SELECT * FROM `adressen` WHERE `email` LIKE \'%.de\''),
(21, 'UPDATE `adressen` SET `vorname` = \'Gabriele\' WHERE `vorname` LIKE \'Gabi\''),
(22, 'SELECT * FROM adressen ORDER BY `id` DESC'),
(23, 'SELECT * FROM adressen ORDER BY `id` ASC'),
(24, 'SELECT * FROM adressen ORDER BY `name` ASC'),
(25, 'DELETE FROM adressen WHERE name LIKE \'Müller\''),
(26, 'CREATE DATABASE projektverwaltung'),
(27, 'CREATE TABLE projektverwaltung.abteilung (\n	id INT(50) NOT NULL AUTO_INCREMENT,\n	name VARCHAR(30) NOT NULL,\n	Leiter INT(50) NOT NULL,\n	PRIMARY KEY (id)\n) ENGINE = InnoDB'),
(28, 'INSERT INTO abteilung (\n	`id`, `name`, `Leiter`\n) VALUES (\n	\'1\', \'Raumfahrt\', \'2\'\n), (\n	\'2\', \'Fuhrpark\', \'4\'\n), (\n	\'3\', \'Verwaltung\', \'3\'\n)'),
(29, 'CREATE TABLE projektverwaltung.arbeitet_an (\n	id INT(50) NOT NULL AUTO_INCREMENT,\n	mitarbeiter INT(50) NOT NULL,\n	projekt INT(50) NOT NULL,\n	PRIMARY KEY (id)\n) ENGINE = InnoDB'),
(30, 'INSERT INTO arbeitet_an (\n	id, mitarbeiter, projekt\n) VALUES (\n\'1\', \'2\', \'1\'\n), (\n	\'2\', \'2\', \'2\'\n), (\n	\'3\', \'3\', \'3\'\n), (\n	\'4\', \'5\', \'1\'\n), (\n	\'5\', \'1\', \'2\'\n), (\n	\'6\', \'1\', \'3\'\n)'),
(31, 'CREATE TABLE projektverwaltung.mitarbeiter (\n	id INT(50) NOT NULL AUTO_INCREMENT,\n	name VARCHAR(30) NOT NULL,\n	vorname VARCHAR(30) NOT NULL,\n    abt INT(50) NULL,\n	PRIMARY KEY (id)\n) ENGINE = InnoDB'),
(32, 'INSERT INTO mitarbeiter (\n	`id`, `name`, `vorname`, `abt`\n	) VALUES (\n		\'1\', \'Müller\', \'Anton\', NULL\n	), (\n		\'2\', \'Geiger\', \'Sven\', \'1\'\n	), (\n		\'3\', \'Schwab\', \'Anita\', \'3\'\n	), (\n		\'4\', \'Görgens\', \'Margit\', \'2\'\n	), (\n		\'5\', \'Hurz\', \'Willy\', NULL\n)'),
(33, 'CREATE TABLE projektverwaltung.projekt (\n		id INT(50) NOT NULL AUTO_INCREMENT,\n		bezeichner VARCHAR(30) NOT NULL,\n		zugeord_abt INT(50) NOT NULL,\n	    verantw_mitarb INT(50) NOT NULL,\n		PRIMARY KEY (id)\n		) ENGINE = InnoDB'),
(34, 'INSERT INTO projekt(\n	    id, bezeichner, zugeord_abt, verantw_mitarb\n	)\n	VALUES(\n		\'1\', \'Apollo13\', \'1\', \'5\'\n	),(\n		\'2\', \'Challenger\', \'1\', \'4\'\n	),(\n		\'3\', \'WebSeiten\', \'3\', \'1\'\n	)'),
(35, 'Jede Abteilung hat 1 Leiter (n:1-Kardinalität).\nJede Abteilung hat ein oder mehrere Projekte (m:n-Kardinalität).\nJedes Projekt hat einen Verantwortlichen (n:1-Kardinalität).\nJedes Projekt hat ein oder mehrere Mitarbeiter (m:n-Kardinalität).'),
(36, 'Ausführliches ERM Modell, siehe pdf'),
(37, 'SELECT mitarbeiter.name, mitarbeiter.vorname \n	FROM mitarbeiter \n	INNER JOIN abteilung ON abteilung.Leiter = mitarbeiter.id \n	WHERE abteilung.name = \'Raumfahrt\''),
(38, 'SELECT mitarbeiter.name, mitarbeiter.vorname \n	FROM mitarbeiter \n	INNER JOIN abteilung ON abteilung.Leiter = mitarbeiter.id'),
(39, 'SELECT bezeichner \n	FROM projekt\n	INNER JOIN abteilung ON projekt = abteilung.id\n	WHERE abteilung.name = \'Verwaltung\''),
(40, 'SELECT mitarbeiter.name, mitarbeiter.vorname \n	FROM mitarbeiter \n	INNER JOIN projekt ON projekt.verantw_mitarb = mitarbeiter.id\n	WHERE projekt.bezeichner = \'Apollo13\''),
(41, 'SELECT mitarbeiter.name, mitarbeiter.vorname\nFROM mitarbeiter\nINNER JOIN arbeitet_an ON arbeitet_an.mitarbeiter = mitarbeiter.id\nINNER JOIN projekt ON arbeitet_an.projekt = projekt.id\nWHERE projekt.bezeichner = \'Challenger\''),
(42, 'SELECT mitarbeiter.name, mitarbeiter.vorname \n	FROM mitarbeiter \n	INNER JOIN projekt ON projekt.verantw_mitarb = mitarbeiter.id'),
(43, 'SELECT mitarbeiter.name, mitarbeiter.vorname\n	FROM mitarbeiter\n	INNER JOIN arbeitet_an ON arbeitet_an.mitarbeiter = mitarbeiter.id\n	INNER JOIN projekt ON arbeitet_an.projekt = projekt.id\n	INNER JOIN abteilung ON abteilung.id = projekt.zugeord_abt\n	WHERE projekt.bezeichner = \'Challenger\' AND mitarbeiter.abt IS NOT NULL'),
(44, 'SELECT mitarbeiter.name, mitarbeiter.vorname\n	FROM mitarbeiter\n	INNER JOIN arbeitet_an ON arbeitet_an.mitarbeiter = mitarbeiter.id\n	INNER JOIN projekt ON arbeitet_an.projekt = projekt.id\n	WHERE projekt.bezeichner = \'WebSeiten\' OR projekt.bezeichner = \'Apollo13\''),
(45, 'CREATE USER \'superadmin\'@\'localhost\' IDENTIFIED BY \'topsecret\''),
(46, 'GRANT ALL PRIVILEGES ON projektverwaltung . * TO \'superadmin\'@\'localhost'),
(47, 'CREATE USER \'verwalter\'@\'localhost\' IDENTIFIED BY \'secret\''),
(48, 'GRANT SELECT, INSERT, DELETE ON projektverwaltung.abteilung TO \'verwalter\'@\'localhost\''),
(49, 'DROP USER \'verwalter\'@\'localhost\'');

-- --------------------------------------------------------

--
-- Table structure for table `results_img`
--

CREATE TABLE `results_img` (
  `id` int(11) NOT NULL,
  `img_1x` varchar(256) DEFAULT NULL,
  `img_2x` varchar(256) DEFAULT NULL,
  `img_3x` varchar(256) DEFAULT NULL,
  `title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results_img`
--

INSERT INTO `results_img` (`id`, `img_1x`, `img_2x`, `img_3x`, `title`) VALUES
(1, 'images/task/result_16-1x.jpg', 'images/task/result_16-2x.jpg', 'images/task/result_16-3x.jpg', 'Skizze Symboliken ERM');

-- --------------------------------------------------------

--
-- Table structure for table `results_link`
--

CREATE TABLE `results_link` (
  `id` int(11) NOT NULL,
  `link` varchar(256) NOT NULL DEFAULT '',
  `linktext` varchar(256) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results_link`
--

INSERT INTO `results_link` (`id`, `link`, `linktext`) VALUES
(1, '/downloads/erm_modell-dt.pdf', 'Einfaches ERM-Modell als pdf'),
(2, '/downloads/erm_modell-xl.pdf', ' Ausführliches ERM-Modell als pdf');

-- --------------------------------------------------------

--
-- Table structure for table `results_query`
--

CREATE TABLE `results_query` (
  `id` int(11) UNSIGNED NOT NULL,
  `example` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results_query`
--

INSERT INTO `results_query` (`id`, `example`) VALUES
(1, 'SELECT * FROM adressen'),
(2, 'SELECT * FROM `adressen` WHERE `email` LIKE \'%.de\''),
(3, 'SELECT * FROM adressen ORDER BY `id` DESC'),
(4, 'SELECT * FROM adressen ORDER BY `id` ASC'),
(5, 'SELECT * FROM adressen ORDER BY `name` ASC'),
(6, 'DELETE FROM adressen WHERE name LIKE \'Müller\''),
(7, 'SELECT mitarbeiter.name, mitarbeiter.vorname \n	FROM mitarbeiter \n	INNER JOIN abteilung ON abteilung.Leiter = mitarbeiter.id \n	WHERE abteilung.name = \'Raumfahrt\''),
(8, 'SELECT mitarbeiter.name, mitarbeiter.vorname \n	FROM mitarbeiter \n	INNER JOIN abteilung ON abteilung.Leiter = mitarbeiter.id'),
(9, 'SELECT bezeichner \r\n	FROM projekt\r\n	INNER JOIN abteilung ON projekt.zugeord_abt = abteilung.id\r\n	WHERE abteilung.name = \'Verwaltung\''),
(10, 'SELECT mitarbeiter.name, mitarbeiter.vorname \n	FROM mitarbeiter \n	INNER JOIN projekt ON projekt.verantw_mitarb = mitarbeiter.id\n	WHERE projekt.bezeichner = \'Apollo13\''),
(11, 'SELECT mitarbeiter.name, mitarbeiter.vorname\nFROM mitarbeiter\nINNER JOIN arbeitet_an ON arbeitet_an.mitarbeiter = mitarbeiter.id\nINNER JOIN projekt ON arbeitet_an.projekt = projekt.id\nWHERE projekt.bezeichner = \'Challenger\''),
(12, 'SELECT mitarbeiter.name, mitarbeiter.vorname \n	FROM mitarbeiter \n	INNER JOIN projekt ON projekt.verantw_mitarb = mitarbeiter.id'),
(13, 'SELECT mitarbeiter.name, mitarbeiter.vorname\n	FROM mitarbeiter\n	INNER JOIN arbeitet_an ON arbeitet_an.mitarbeiter = mitarbeiter.id\n	INNER JOIN projekt ON arbeitet_an.projekt = projekt.id\n	INNER JOIN abteilung ON abteilung.id = projekt.zugeord_abt\n	WHERE projekt.bezeichner = \'Challenger\' AND mitarbeiter.abt IS NOT NULL'),
(14, 'SELECT mitarbeiter.name, mitarbeiter.vorname\n	FROM mitarbeiter\n	INNER JOIN arbeitet_an ON arbeitet_an.mitarbeiter = mitarbeiter.id\n	INNER JOIN projekt ON arbeitet_an.projekt = projekt.id\n	WHERE projekt.bezeichner = \'WebSeiten\' OR projekt.bezeichner = \'Apollo13\''),
(15, 'SHOW GRANTS FOR \'superadmin\'@\'localhost\''),
(16, 'SELECT * FROM mysql.user WHERE User=\'verwalter\''),
(17, 'SHOW GRANTS FOR \'verwalter\'@\'localhost\''),
(18, 'SELECT * FROM mysql.user WHERE User=\'superadmin\''),
(19, 'SELECT mitarbeiter.name, mitarbeiter.vorname FROM mitarbeiter INNER JOIN arbeitet_an ON arbeitet_an.mitarbeiter = mitarbeiter.id INNER JOIN projekt ON arbeitet_an.projekt = projekt.id WHERE projekt.bezeichner = \'WebSeiten\' OR projekt.bezeichner = \'Apollo13\''),
(20, 'SELECT * FROM abteilung'),
(21, 'SELECT * FROM arbeitet_an'),
(22, 'SELECT * FROM mitarbeiter'),
(23, 'SELECT * FROM projekt');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `fk_tasks_description` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `fk_tasks_description`) VALUES
(1, 'Wofür steht die Abkürzung SQL?', NULL),
(2, 'Was ist MySQL?', NULL),
(3, 'Wie ist eine Datenbank rein strukturell aufgebaut?', NULL),
(4, 'Was sind Datensätze?', NULL),
(5, 'Was sind Datenbankfelder?', NULL),
(6, 'Was ist ein Primärschlüssel und wozu dient dieser?', NULL),
(7, 'Was nennt man in Datenbanken eine Beziehung?', NULL),
(8, 'Was versteht man unter dem Begriff Normalisierung?', NULL),
(9, 'Was versteht man unter atomisieren von Daten?', NULL),
(10, 'Was versteht man unter der Grundlage Redundanzen zu vermeiden?', NULL),
(11, 'Was versteht man darunter eine Relation aufzustellen?', NULL),
(12, 'Wofür steht die Abkürzung ERM?', NULL),
(13, 'Was soll ein ERM-Modell darstellen?', NULL),
(14, 'Wie wird ein ERM dargestellt (Symboliken)', NULL),
(15, 'Datenbank anlegen', 1),
(16, 'Tabellen anlegen', 2),
(17, 'Datensätze anlegen', 3),
(18, 'Datensätze liefern', 4),
(19, 'Datensätze löschen', 5),
(20, 'Datensätze mit like anzeigen', 6),
(21, 'Datensätze ändern', 7),
(22, 'Reihenfolge ändern bei Lieferung von Datensätzen', 8),
(23, 'Datensatz löschen', 9),
(24, 'Neute Datenbank anlegen', NULL),
(25, 'ERM-Modell erstellen', NULL),
(26, 'Datensatz liefern', NULL),
(27, 'Benutzer anlegen', NULL),
(28, 'Benutzerrechte vergeben', NULL),
(29, 'Benutzer löschen', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks_description`
--

CREATE TABLE `tasks_description` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks_description`
--

INSERT INTO `tasks_description` (`id`, `description`) VALUES
(1, 'Legen Sie eine Datenbank mit dem Namen tlnverwaltung an. Die Kollation soll auf utf-8-general-ci ausgelegt sein.'),
(2, 'Legen Sie in der Datenbank eine Tabelle mit dem Namen adressen an. Diese Tabelle soll folgende Spalten beinhalten: id als Selbstzähler, ganzzahligem Inhalt und maximal 50 Zeichen, nicht leer name mit maximal 30 beliebigen Zeichen, nicht leer vorname mit maximal 30 beliebigen Zeichen, nicht leer email mit maximal 60 beliebigen Zeichen, nicht leer Die Spalte id soll als Primärschlüssel dienen.\n'),
(3, 'Fügen Sie in die Tabelle adressen folgende Datensätze ein: 0 |Müller | Tina | tina@mueller.de 1 | Schulz | David | davidSchulz@schulz.com 2 | Schuster | Tom | schuster.t@gmx.net 3 | Lerch | Gabi | glerch@freenet.de'),
(4, 'Liefern Sie die Ausgabe aller Datensätze der Tabelle adressen.'),
(5, 'Mit welchem SQL-Befehl lassen sich alle Datensätze aus der Tabelle adressen löschen?'),
(6, 'Mit welchem SQL-Befehl lassen sich alle Datensätze der Tabelle adressen anzeigen, deren E-Mail- Adresse die Endung .de hat?'),
(7, 'Ändern Sie den Eintrag Lerch | Gabi | glerch@freenet.de in Lerch | Gabriele | glerch@freenet.de'),
(8, 'Liefern Sie die Ausgabe aller Datensätze der Tabelle adressen. Variante 1: In absteigender Reihenfolge anhand des Feldes id'),
(9, 'Liefern Sie die Ausgabe aller Datensätze der Tabelle adressen. Variante 2: In aufsteigender Reihenfolge anhand des Feldes id'),
(10, 'Liefern Sie die Ausgabe aller Datensätze der Tabelle adressen. Variante 3: Absteigend sortiert anhand des Feldes name'),
(11, 'Löschen Sie den Datensatz bezüglich der Person, deren Name Müller lautet.'),
(12, 'Erstellen Sie eine Datenbank projektverwaltung mit der Kollation utf-8-general-ci.'),
(13, 'Erstellen Sie die vorliegenden Datenbanktabellen unter dem jeweils angegebenen Namen. Ermitteln Sie anhand der Tabelle der Zugehörigkeiten und Abhängigkeiten die entsprechenden Schlüsselfelder sowie notwendigen Feldtypen/Feldeigenschaften.'),
(14, 'Erstellen Sie anhand der vorliegenden Tabelle der Abhängigkeiten und Zugehörigkeiten ein entsprechendes ERM-Modell. Verwenden Sie die gängigen Kennungssymboliken.'),
(15, 'Wer ist der Leiter der Raumfahrtabteilung?'),
(16, 'Geben Sie alle Abteilungsleiter aus'),
(17, 'Welche Projekte gehören zur Verwaltungsabteilung'),
(18, 'Wer ist für das Apollo 13 Projekt verantwortlich?'),
(19, 'Wer arbeitet am Challenger Projekt?'),
(20, 'Geben Sie alle Projektverantwortlichen aus'),
(21, 'Wer arbeitet am Challenger Projekt und ist gleichzeitig Leiter einer Abteilung? (Name, Vorname)'),
(22, 'Wer arbeitet am Apollo 13 Projekt und am WebSeiten Projekt?'),
(23, 'Legen Sie als neuen Benutzer den Benutzer superadmin an mit der Passwortzuordnung topsecret.'),
(24, 'Vergeben Sie dem Benutzer superadmin alle Berechtigungen für die Datenbank projektverwaltung.'),
(25, 'Legen Sie als neuen Benutzer den Benutzer verwalter an mit der Passwortzuordnung secret.'),
(26, 'Vergeben Sie dem Benutzer verwalter die Berechtigungen für die Datenbank projektverwaltung nur \nbezüglich der Tabelle abteilung. Die Beschränkung soll sich auf das Einfügen und Löschen von Datensätzen der Tabelle Abteilung beschränken.'),
(27, 'Löschen Sie anschließend den Benutzer verwalter.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatcher`
--
ALTER TABLE `dispatcher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results_img`
--
ALTER TABLE `results_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results_link`
--
ALTER TABLE `results_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results_query`
--
ALTER TABLE `results_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks_description`
--
ALTER TABLE `tasks_description`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispatcher`
--
ALTER TABLE `dispatcher`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `results_img`
--
ALTER TABLE `results_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results_link`
--
ALTER TABLE `results_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results_query`
--
ALTER TABLE `results_query`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tasks_description`
--
ALTER TABLE `tasks_description`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
