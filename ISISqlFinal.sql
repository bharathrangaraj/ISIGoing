-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2015 at 06:31 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `isigoing`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `idApp` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `reason` text COLLATE utf8_bin NOT NULL,
  `idCountry` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idApp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`idApp`, `name`, `email`, `reason`, `idCountry`, `active`) VALUES
(3, 'Frederico Sanchez', 'frederico.sanchez@gmail.de', 'Hey my naem is Frederico and i am from Valencia. I am studing computer sience and i would love to show you the city and the university. I love to go out', 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `IDCountry` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) COLLATE utf8_bin NOT NULL,
  `information` text COLLATE utf8_bin,
  `food` text COLLATE utf8_bin,
  `people` text COLLATE utf8_bin,
  `customs` text COLLATE utf8_bin,
  `student` text COLLATE utf8_bin,
  `flag` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`IDCountry`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=48 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`IDCountry`, `Name`, `information`, `food`, `people`, `customs`, `student`, `flag`) VALUES
(1, 'Croatia', '    <b>Croatia</b>, officially the Republic of Croatia (Croatian: Republika Hrvatska) is a sovereign state at the crossroads of Central Europe, Southeast Europe, and the Mediterranean. Its capital city is <b>Zagreb</b>, which forms one of the country''s primary subdivisions, along with the twenty counties. Croatia covers <b>56,594 square kilometres (21,851 square miles)</b> and has diverse, mostly continental and Mediterranean climates. Croatia''s Adriatic Sea coast contains more than a <b>thousand islands</b>. The country''s population is <b>4.28 million</b>, most of whom are Croats, with the most common religious denomination being Roman Catholicism.    ', '   Croatian cuisine is heterogeneous and is known as a cuisine of the regions since every regions has its own distinct culinary traditions. Its roots date back to ancient times and the differences in the selection of foodstuffs and forms of cooking are most notable between those on the mainland and those in coastal regions. Mainland cuisine is more characterized by the earlier Slavic and the more recent contacts with neighboring cultures - Hungarian, Austrian and Turkish, using lard for cooking, and spices such as black pepper, paprika, and garlic.', 'With its population of 4.28 million in 2011, Croatia ranks 125th by population in the world. Its population density stands at 75.9 inhabitants per square kilometre. The overall life expectancy in Croatia at birth was 78 years in 2012. The total fertility rate of 1.5 children per mother, is one of the lowest in the world. Since 1991, Croatia''s death rate has continuously exceeded its birth rate. Since the late 1990s, there has been a positive net migration into Croatia, reaching a level of more than 7,000 net immigrants in 2006.\r\n\r\n\r\n ', ' Because of its geographic position, Croatia represents a blend of four different cultural spheres. It has been a crossroad of influences of the western culture and the east—ever since division of the Western Roman Empire and the Byzantine Empire—as well as of the Mitteleuropa and the Mediterranean culture. The Illyrian movement was the most significant period of national cultural history, as the 19th-century period proved crucial in emancipation of the Croatian language and saw unprecedented developments in all fields of art and culture, giving rise to a number of historical figures.', NULL, 'flag/croatian.gif'),
(2, 'Germany', NULL, NULL, NULL, NULL, NULL, 'flag/germany.png'),
(3, 'Poland', NULL, NULL, NULL, NULL, NULL, 'flag/poland.png'),
(4, 'Albania', NULL, NULL, NULL, NULL, NULL, 'flag/jessiaca alba.png'),
(5, 'Andorra', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Austria', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Belarus', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Belgium', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Bosnia and Herzegovina', NULL, NULL, NULL, NULL, NULL, 'flag/bosnian.png'),
(10, 'Bulgaria', NULL, NULL, NULL, NULL, NULL, 'flag/bulgaria.png'),
(11, 'Cyprus', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Czech Republic', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Denmark', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Estonia', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'France', NULL, NULL, NULL, NULL, NULL, 'flag/France_Flag.gif'),
(16, 'Finland', NULL, NULL, NULL, NULL, NULL, 'flag/Finland_flag-3.jpg'),
(17, 'Georgia', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Greece', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Hungary', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Iceland', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Ireland', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'San Marino', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Italy', NULL, NULL, NULL, NULL, NULL, 'flag/Italian-flag.jpg'),
(24, 'Kosovo', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Latvia', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Liechtenstein', NULL, NULL, NULL, NULL, NULL, 'flag/lihtenstajn.png'),
(27, 'Lithuania', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Luxembourg', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Macedonia', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Malta', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Moldova', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Monaco', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Montenegro', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Netherlands', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Norway', NULL, NULL, NULL, NULL, NULL, 'flag/norway.png'),
(36, 'Portugal', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Romania', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Russia', NULL, NULL, NULL, NULL, NULL, 'flag/url.gif'),
(39, 'Serbia', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Slovakia', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Slovenia', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Spain', '  At 505,992 km2 (195,365 sq mi), Spain is the world''s 52nd-largest country. It is some 47,000 km2 (18,000 sq mi) smaller than France and 81,000 km2 (31,000 sq mi) larger than the US state of California. Mount Teide (Tenerife) is the highest mountain peak in Spain and is the third largest volcano in the world from its base.\r\nSpain lies between latitudes 26° and 44° N, and longitudes 19° W and 5° E.\r\nOn the west, Spain borders Portugal; on the south, it borders Gibraltar (a British overseas territory) and Morocco, through its exclaves in North Africa (Ceuta, Melilla, and Peñón de Vélez de la Gomera). On the northeast, along the Pyrenees mountain range, it borders France and the tiny Principality of Andorra. Along the Pyrenees in Girona, a small exclave town called Llívia is surrounded by France.', 'Paella is a traditional Spanish dish from Valencia. It is a rice dish that can have meat, fish, seafood, and vegetables and is characterized by its use of saffron to give it a yellow color and unique flavor. There are three main types of paella:\r\nValencian paella/paella valenciana: rice, green vegetables, rabbit, chicken, or duck, snails, beans, and seasoning.\r\nSeafood paella/paella de marisco: rice, seafood, and seasoning.\r\nMixed paella/paella mixta: combination of seafood, meat, vegetables, beans, and seasoning.\r\n\r\nTapas is a great Spanish food tradition composed of small dishes of different types of food, like appetizers or snacks. The dishes may be cold (jamón serrano, queso manchego, olives, etc.) or warm (tortilla española, meatballs, etc.) and can be served as bar food or as complete meals. It’s a great opportunity to taste a whole variety of flavors and dishes, so if you are ever in Spain make sure to order tapas and experience what the country has to offer!\r\n', '  \r\nPage semi-protected\r\nSpanish people  · Españoles Hispanos mural.jpg\r\n\r\n1st row: Lucius Annaeus Seneca · Lope de Vega · Hadrian · Santiago Ramón y Cajal · Averroes\r\n2nd row: Miguel de Unamuno · Abd-ar-Rahman III · Luis Buñuel · Hernán Cortés · Philip II\r\n3rd row: Diego Velázquez · Francisco de Goya · Isabella I of Castile · Manuel de Falla · Miguel de Cervantes\r\n4th row: John of the Cross · Ramón del Valle Inclán · José Ortega y Gasset · Ignatius of Loyola · El Cid\r\n5th row: Antoni Gaudí · Maimonides · Pablo Picasso · Calderón de la Barca · Trajan\r\n6th row: Luis de Góngora · Martial · Francisco de Quevedo · Quintilian · Tirso de Molina\r\nTotal population\r\n\r\n Spain Nationals 41,539,400[1]\r\n(for a total population of 47,059,533)\r\n\r\nNationals Abroad : 2,058,048[2]\r\nHundreds of millions of Hispanic Americans with Spanish ancestry\r\nRegions with significant populations\r\nArgentina Argentina 	404,111[2]\r\nFrance France 	215,183[2]\r\nVenezuela Venezuela 	188,585[2]\r\nGermany Germany 	122,218[2]\r\n Brazil 	117,523[2]\r\n Cuba 	108,858[2]\r\n Mexico 	108,314[2]\r\nUnited States United States\r\n(including Puerto Rico) 	103,474[2]\r\nSwitzerland Switzerland 	103,247[2]\r\n United Kingdom 	81,519[2]\r\n Uruguay 	63,827[2]\r\n Chile 	56,104[2]\r\n Belgium 	53,212[2]\r\n Andorra 	24,318[2]\r\n Colombia 	22,123[2]\r\n Netherlands 	21,974[2]\r\n Italy 	20,898[2]\r\n Peru 	19,668[2]\r\n Dominican Republic 	18,928[2]\r\n Australia 	18,353[2]\r\nLanguages\r\nLanguages of Spain\r\n(Spanish, Basque, Catalan, Galician and others)\r\nReligion\r\nP christianity.svg Christian (Mostly Roman Catholicism 73.4%)[3]\r\nAtheism 24%[4]  · other faith 2.1% incl.\r\nStar of David.svg Jewish · Star and Crescent.svg Muslim · Dharma Wheel.svg Buddhist · Om.svg Hinduism\r\nRelated ethnic groups\r\nPortuguese · French · Italians\r\n · other Western Europeans ·\r\n · Sephardic ·\r\n · White Hispanics ·\r\nPart of a series on\r\nSpanish people\r\nHispanos mural.jpg\r\nRegional groups\r\n\r\n    Andalusian\r\n    Aragonese\r\n    Asturian\r\n    Balearic\r\n    Basque\r\n    Canarian\r\n    Cantabrian\r\n    Castilian\r\n        Leonese\r\n        madrileños\r\n        manchegos\r\n    Catalan\r\n    Ceutan\r\n    Extremaduran\r\n    Galician\r\n    Melillan\r\n    Murcian\r\n    Navarrese\r\n    Valencian\r\n\r\nOther groups\r\n\r\n    Mercheros\r\n    Romani (gitanos)\r\n    Sephardic\r\n    Migrants, expats and refugees\r\n\r\nDiaspora\r\n\r\n    Argentina\r\n    Belgium\r\n    Brazil\r\n    Chile\r\n    Cuba\r\n    France\r\n    Germany\r\n    Mexico\r\n    Philippines\r\n    Switzerland\r\n    UK\r\n    US\r\n    Uruguay\r\n    Venezuela, etc.\r\n\r\nLanguages\r\n\r\n    Spanish (aka Castilian)\r\n\r\n    Basque\r\n    Catalan\r\n    Galician\r\n    Occitan\r\n\r\nOther languages\r\n\r\n    Aragonese\r\n    Asturian\r\n    Fala\r\n    Portuguese\r\n    Iberian Romani\r\n        Caló\r\n        Erromintxela\r\n    Quinqui\r\n    Arabic\r\n    Romanian\r\n    English\r\n    French\r\n    Ladino (Judaeo-Spanish)\r\n    Rif Berber, etc.\r\n\r\nReligion\r\n\r\n    Roman Catholicism\r\n    Judaism\r\n    Islam\r\n\r\nPortal icon Spain portal\r\n\r\n    v\r\n    t\r\n    e\r\n\r\nThe Spanish people, or Spaniards (Spanish: españoles [espaˈɲoles]) are a nation and ethnic group native to Spain that share a common Spanish culture and speak the Spanish language as a mother tongue. Within Spain there are a number of nationalisms and regionalisms, reflecting the country''s complex history. The official language of Spain is Spanish (also known as Castilian), a standard language based on the mediaeval dialect of the Castilians of north-central Spain. There are several commonly spoken regional languages (mainly Basque, Catalan and Galician). With the exception of Basque, the languages native to Spain are Romance languages. There are substantial populations outside Spain with ancestors who emigrated from Spain; most notably in Hispanic America.', 'The cultures of Spain are European cultures based on a variety of historical influences, primarily that of Ancient Rome, but also the pre-Roman Celtic and Iberian culture, and that of the Phoenicians and the Moors. In the areas of language and religion, the Ancient Romans left a lasting legacy. The subsequent course of Spanish history added other elements to the country''s culture and traditions.', ' http://www.semesterinspain.org/student-life\r\n\r\nhttp://www.studying-in-spain.com/general-life-as-a-student-in-spain/\r\n\r\nhttp://blog.unispain.com/how-much-does-one-week-in-a-students-life-in-spain-cost/', 'flag/spain.png'),
(43, 'Sweden', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Switzerland', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Turkey', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Ukraine', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'United Kingdom', NULL, NULL, NULL, NULL, NULL, 'flag/union.png');

-- --------------------------------------------------------

--
-- Table structure for table `ebuddy`
--

CREATE TABLE IF NOT EXISTS `ebuddy` (
  `idBuddy` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(50) COLLATE utf8_bin NOT NULL,
  `Email` char(50) COLLATE utf8_bin NOT NULL,
  `city` char(30) COLLATE utf8_bin NOT NULL,
  `idCoun` int(11) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idBuddy`),
  KEY `idCoun` (`idCoun`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ebuddy`
--

INSERT INTO `ebuddy` (`idBuddy`, `Name`, `Email`, `city`, `idCoun`, `Active`) VALUES
(20, 'Alan', 'alan@rwth.de', 'Zagreb', 1, 1),
(21, 'Fernando Gomez', 'fernando.gomez@gmail.de', 'Valencia', 42, 1),
(22, 'Marina Llorez', 'Marina.hhhh@gmail.es', 'Madrid', 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(60) COLLATE utf8_bin NOT NULL,
  `description` varchar(35) COLLATE utf8_bin NOT NULL,
  `idCountry` int(11) NOT NULL,
  `category` varchar(30) COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPhoto`),
  KEY `idCountry` (`idCountry`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=60 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`idPhoto`, `path`, `description`, `idCountry`, `category`, `active`) VALUES
(5, 'imgs/kremsnita.jpg', 'Kremšnita cake', 1, 'food', 1),
(6, 'imgs/1.jpg', 'Ćevapi', 1, 'food', 1),
(30, 'imgs/cro.png', 'Geographycal position of Croatia', 1, 'general', 1),
(31, 'imgs/krka.jpg', 'Krka waterfalls', 1, 'general', 1),
(32, 'imgs/bol.jpg', 'Bol beach', 1, 'general', 1),
(33, 'imgs/0328007.48.jpg', 'Zagreb people', 1, 'people', 1),
(34, 'imgs/dolac.jpg', 'Dolac market', 1, 'people', 1),
(35, 'imgs/sib.jpg', 'Šibenik cathedral', 1, 'customs', 1),
(36, 'imgs/zd.jpg', 'Roman forum in Zadar', 1, 'customs', 1),
(37, 'imgs/zg.jpg', '', 1, 'carousel', 1),
(38, 'imgs/st.jpg', '', 1, 'carousel', 1),
(39, 'imgs/pg.jpg', '', 1, 'carousel', 1),
(50, 'imgs/barcelona-spain-low.jpg', '', 42, 'carousel', 1),
(51, 'imgs/spanish-food-1.jpg', 'Paella', 42, 'food', 1),
(52, 'imgs/tortilla.jpg', '', 42, 'food', 1),
(53, 'imgs/tapas.jpg', '', 42, 'food', 1),
(54, 'imgs/Hispanic_Culture_Teaching_Resources_Spanish-376x250.jpg', 'Flamenco', 42, 'customs', 1),
(55, 'imgs/518423a24283a.image.jpg', 'Dancers', 42, 'customs', 1),
(56, 'imgs/2920907_orig.jpg', 'Bullfight', 42, 'customs', 1),
(58, 'imgs/madif.jpg', '', 42, 'carousel', 1),
(59, 'imgs/ibiza.jpg', '', 42, 'carousel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `idQuestion` int(11) NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_bin NOT NULL,
  `choice1` text COLLATE utf8_bin,
  `choice2` text COLLATE utf8_bin,
  `choice3` text COLLATE utf8_bin,
  `choice4` text COLLATE utf8_bin,
  PRIMARY KEY (`idQuestion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`idQuestion`, `question`, `choice1`, `choice2`, `choice3`, `choice4`) VALUES
(1, 'What kind of wheater do you enjoy the most?', 'Sunny', 'Snow', 'Rain', 'I don''t care'),
(2, 'What about language?', 'People should be fluent in english', 'People should understand english', 'I want to learn another language', NULL),
(3, 'What is the maximum amount of money you can spend per month', 'Less than 500€', '500-800€', 'More than 800€', NULL),
(4, 'Do you want to live next to the beach?', 'Definitely', 'Would be nice but not necessary', 'Not really', NULL),
(5, 'Do you want to live next to the mountains?', 'Definitely', 'Would be nice but not necessary', 'Not really', NULL),
(6, 'Is there any type food you prefer?', 'Sea food', 'Spicy food', 'I like everything', NULL),
(7, 'What about your studies?', 'I don''t want to study too much, I''d like to have fun', 'I want to study hard', 'A good balance between fun and studying', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `idQuestion` int(11) NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_bin NOT NULL,
  `choice1` text COLLATE utf8_bin NOT NULL,
  `choice2` text COLLATE utf8_bin NOT NULL,
  `choice3` text COLLATE utf8_bin NOT NULL,
  `answer` int(11) NOT NULL,
  `idCountry` int(11) NOT NULL,
  PRIMARY KEY (`idQuestion`),
  KEY `idCountry` (`idCountry`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`idQuestion`, `question`, `choice1`, `choice2`, `choice3`, `answer`, `idCountry`) VALUES
(3, 'What is the capital of Croatia?', 'Zagreb', 'Zadar', 'Split', 1, 1),
(4, 'Which of these countries does Croatia have a border with?', 'Austria', 'Italy', 'Hungary', 3, 1),
(6, 'Where is the RWTH university located?', 'Köln', 'Aachen', 'Düsseldorf', 2, 2),
(7, 'The population of Croatia is about...', '3,5 million', '10 million', '4,5 million', 3, 1),
(8, 'In which Croatian city has Game of Thrones been filmed in?', 'Dubrovnik', 'Zagreb', 'Pula', 1, 1),
(9, 'How many islands does Croatia have?', 'Around 100', 'Around 500', 'More than 1000', 3, 1),
(10, 'Croatia is a...', 'Muslim country', 'Chatolic country', 'Orhodox country', 2, 1),
(11, 'Which of these is a Croatian cake?', 'Kremšnita', 'Sacher', 'Schwarzwald', 1, 1),
(12, 'Choose the correct answer Where is Spain?', 'North of Germany and South of Sweden ', 'Between Switzerland and Italy ', 'South of France and East of Portugal ', 3, 42),
(13, 'Which figure is more famous in Spanish history?', 'Herod', 'Confucius', 'Christopher Columbus', 1, 42),
(14, 'In which city can you visit the Sagrada Familia church? ', 'Salamanca', 'Madrid', 'Barcelona', 1, 42),
(15, 'What do the Fallas consist of in Valencia?', 'Erecting artistic constructions made of combustible materials that depict figures and then burning them on the Day of Saint Joseph.', 'Creating wax figures to put on display in the Wax Museum.', 'Celebrating the arrival of the Virgin of Falla', 1, 42);

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE IF NOT EXISTS `recommendation` (
  `idQuestion` int(11) NOT NULL,
  `idCountry` int(11) NOT NULL,
  `value1` int(11) DEFAULT NULL,
  `value2` int(11) DEFAULT NULL,
  `value3` int(11) DEFAULT NULL,
  `value4` int(11) DEFAULT NULL,
  PRIMARY KEY (`idQuestion`,`idCountry`),
  KEY `idQuestion` (`idQuestion`),
  KEY `idCountry` (`idCountry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`idQuestion`, `idCountry`, `value1`, `value2`, `value3`, `value4`) VALUES
(1, 2, 4, 6, 8, 0),
(1, 13, 4, 6, 8, 0),
(1, 15, 8, 5, 4, 0),
(1, 16, 1, 10, 6, 0),
(1, 21, 4, 4, 10, 0),
(1, 23, 9, 3, 2, 0),
(1, 35, 3, 10, 7, 0),
(1, 42, 9, 3, 1, 0),
(1, 43, 3, 10, 7, 0),
(1, 45, 10, 0, 3, 0),
(2, 2, 6, 8, 3, NULL),
(2, 13, 9, 9, 3, NULL),
(2, 15, 2, 4, 9, NULL),
(2, 16, 10, 10, 3, NULL),
(2, 21, 10, 10, 0, NULL),
(2, 23, 3, 5, 9, NULL),
(2, 35, 10, 10, 3, NULL),
(2, 42, 0, 3, 10, NULL),
(2, 43, 10, 10, 3, NULL),
(2, 45, 3, 8, 7, NULL),
(3, 2, 3, 10, 7, NULL),
(3, 13, 0, 3, 10, NULL),
(3, 15, 1, 3, 8, NULL),
(3, 16, 0, 5, 10, NULL),
(3, 21, 0, 5, 7, NULL),
(3, 23, 2, 10, 7, NULL),
(3, 35, 0, 2, 10, NULL),
(3, 42, 5, 10, 6, NULL),
(3, 43, 0, 4, 10, NULL),
(3, 45, 10, 7, 3, NULL),
(4, 2, 1, 4, 9, NULL),
(4, 13, 8, 10, 2, NULL),
(4, 15, 8, 10, 4, NULL),
(4, 16, 3, 5, 7, NULL),
(4, 21, 8, 10, 1, NULL),
(4, 23, 10, 10, 2, NULL),
(4, 35, 4, 6, 8, NULL),
(4, 42, 9, 10, 4, NULL),
(4, 43, 4, 6, 8, NULL),
(4, 45, 10, 10, 2, NULL),
(5, 2, 6, 9, 7, NULL),
(5, 13, 0, 5, 10, NULL),
(5, 15, 3, 5, 9, NULL),
(5, 16, 7, 9, 5, NULL),
(5, 21, 0, 4, 10, NULL),
(5, 23, 9, 10, 4, NULL),
(5, 35, 5, 8, 7, NULL),
(5, 42, 2, 5, 9, NULL),
(5, 43, 5, 8, 7, NULL),
(5, 45, 0, 4, 10, NULL),
(6, 2, 3, 3, 10, NULL),
(6, 13, 7, 2, 10, NULL),
(6, 15, 8, 3, 10, NULL),
(6, 16, 7, 2, 8, NULL),
(6, 21, 6, 3, 8, NULL),
(6, 23, 7, 5, 10, NULL),
(6, 35, 7, 2, 7, NULL),
(6, 42, 9, 5, 10, NULL),
(6, 43, 7, 2, 7, NULL),
(6, 45, 5, 9, 8, NULL),
(7, 2, 3, 6, 8, NULL),
(7, 13, 2, 8, 6, NULL),
(7, 15, 5, 5, 7, NULL),
(7, 16, 2, 9, 5, NULL),
(7, 21, 5, 5, 7, NULL),
(7, 23, 5, 5, 7, NULL),
(7, 35, 0, 10, 4, NULL),
(7, 42, 10, 0, 5, NULL),
(7, 43, 0, 10, 5, NULL),
(7, 45, 10, 0, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `IDReview` int(11) NOT NULL AUTO_INCREMENT,
  `Title` char(50) COLLATE utf8_bin NOT NULL,
  `Review` text COLLATE utf8_bin NOT NULL,
  `Grade` int(11) NOT NULL,
  `IDCnt` int(11) NOT NULL,
  `Source` char(50) COLLATE utf8_bin NOT NULL,
  `ip` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDReview`),
  KEY `IDCnt` (`IDCnt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=35 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`IDReview`, `Title`, `Review`, `Grade`, `IDCnt`, `Source`, `ip`, `datetime`, `Active`) VALUES
(33, 'Great Mediteranean country', '  Great country with affordable prices and amazing night life. The weather was very nice but i''ve heard that it can also be very cold during the winter months.  ', 4, 1, 'Spent three weeks vacation there', 1, '2015-01-05 22:59:49', 1),
(34, 'Erasmus in Valncia', 'Why did you choose to go to Valencia, Spain?\r\nBecause it has got a big and good Polytechnic and because it''s dimencion was perfect for me,notte much big band notte much small\r\nHow long is the scholarship? How much money do you receive to help you with living costs?\r\n5 months, i recive from the univerity and UE 370€ band my family vive ne more or less 200€ a month\r\nWhat is the student lifestyle like in Valencia?\r\n\r\nIt si very good, there are a lot of thing to do, activity, excurcion, party..\r\nWould you recommend the city and the University of Valencia to other students?\r\n\r\nYes, because it has got a lot of student band a lot of erasmus student\r\nWhat is the food like?\r\nMore or less Luke in my country\r\nDid it cost you to find your accommodation in Valencia?\r\nNo, i spend 4 days to looking for. I looked a loot of rooms.', 4, 42, 'My own', 1, '2015-01-24 10:29:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `idUniversity` int(11) NOT NULL AUTO_INCREMENT,
  `uniName` char(50) COLLATE utf8_bin NOT NULL,
  `city` char(50) COLLATE utf8_bin NOT NULL,
  `url` char(50) COLLATE utf8_bin NOT NULL,
  `uniInfo` text COLLATE utf8_bin NOT NULL,
  `idCountry` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUniversity`),
  KEY `idCountry` (`idCountry`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`idUniversity`, `uniName`, `city`, `url`, `uniInfo`, `idCountry`, `active`) VALUES
(1, 'University of Zagreb', 'Zagreb', 'www.unizg.hr', '  Considered the best university in the country with the largest number of students.', 1, 1),
(2, 'University of  Split', 'Split', 'www.unist.hr', 'Bad university', 1, 1),
(3, 'Universidad Politècnica de Valencia', 'Valencia', 'http://www.upv.es/', 'The Technical University of Valencia (Valencian: Universitat Politècnica de València, UPV; IPA: [univeɾsiˈtat poliˈtɛŋnika ðe vaˈlensia], Spanish: Universidad Politécnica de Valencia) is a Spanish university located in Valencia, with a focus on science and technology. It was founded in 1968 as the Higher Polytechnic School of Valencia and became a university in 1971, but some of its schools are more than 100 years old.', 42, 1),
(4, 'Universidad Compultense Madrid', 'Madrid', 'https://www.ucm.es/english', 'The Complutense University of Madrid (UCM) is an institution with a long history and broad social recognition. The UCM aspires to be among the foremost universities in Europe, and to become a reference centre for Latin America.\\r\\nWith students as the focus of its activity, the UCM is committed to providing comprehensive training at the highest level. The quality of teaching is a hallmark of the University. Furthermore, Postgraduate programmes are our priority. Our Masters and Doctoral programmes have the necessary materials and human resources to guarantee excellence. The approach and the intensification of relations with society and with the productive environment will be a priority of the University in the coming years.', 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `IDUser` int(11) NOT NULL AUTO_INCREMENT,
  `User` varchar(20) COLLATE utf8_bin NOT NULL,
  `Password` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDUser`, `User`, `Password`) VALUES
(1, 'admin', 'root'),
(2, 'norway', 'rootnorway'),
(3, 'spain', 'rootspain');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ebuddy`
--
ALTER TABLE `ebuddy`
  ADD CONSTRAINT `ebuddy_ibfk_1` FOREIGN KEY (`idCoun`) REFERENCES `country` (`IDCountry`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idCountry`) REFERENCES `country` (`IDCountry`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`idCountry`) REFERENCES `country` (`IDCountry`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD CONSTRAINT `recommendation_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recommendation_ibfk_2` FOREIGN KEY (`idCountry`) REFERENCES `country` (`IDCountry`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`IDCnt`) REFERENCES `country` (`IDCountry`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `university`
--
ALTER TABLE `university`
  ADD CONSTRAINT `university_ibfk_1` FOREIGN KEY (`idCountry`) REFERENCES `country` (`IDCountry`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
