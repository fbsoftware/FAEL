<?php
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.4
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
==============================================================================
   * creazione config.ini e database con dati minimi necessari per iniziare
==============================================================================*/
require_once('../loadLibraries.php');
$app = new Head('Installazione');
$app->openHead();
require_once("../jquery_linkAdmin.php");
require_once("../include_head.php");
$app->closeHead();
//print_r($_POST);//debug
$options=array('autoSave'=>true, 'readOnly'=>false);
$file=new FileIni("../config.ini", $options);

$file->setValue('DB', 'host', $_POST['host']);
$file->setValue('DB', 'user', $_POST['user']);
$file->setValue('DB', 'pw'  , $_POST['pw']);
$file->setValue('DB', 'db'  , $_POST['db']);
$file->setValue('DB', 'pref', $_POST['pref']);
$file->setValue('config', 'root', $_POST['root']);
$file->setValue('config', 'site'     , $_POST['site']);
$file->setValue('config', 'lib' , $_POST['lib']);
$file->setValue('config', 'url' , $_POST['url']);
$file->setValue('config', 'dir_imm'  , $_POST['dir_imm']);
$file->setValue('config', 'incr',      $_POST['incr']);
$file->setValue('config', 'sep',       $_POST['sep']);
$file->setValue('config', 'page_title',$_POST['page_title']);
$file->setValue('config', 'keywords',   $_POST['keywords']);
$file->setValue('config', 'e_mail',    $_POST['e_mail']);
$file->setValue('config', 'author',    $_POST['author']);
// creazione database vuoto
    try {
        $dbh = new PDO("mysql:host=".$_POST['host']."", $_POST['user'], $_POST['pw']);
        $dbh->exec("CREATE DATABASE `".$_POST['db']."`");     }
    catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());  }
// connessione
try { $PDO = new PDO("mysql:host=".$_POST['host'].";dbname=".$_POST['db']."",$_POST['user'],$_POST['pw']); }
catch(PDOException $e) { echo $e->getMessage(); }
$PDO->beginTransaction();

 //==================================================================================
$PDO->exec("CREATE TABLE `".$_POST['pref']."art` (
    `aid` int(5) NOT NULL COMMENT 'ID',
    `astat` varchar(1) NOT NULL COMMENT 'stato',
    `aprog` int(5) NOT NULL COMMENT 'progr',
    `acod` tinytext NOT NULL COMMENT 'codice',
    `atit` tinytext NOT NULL COMMENT 'titolo',
    `ades` tinytext NOT NULL COMMENT 'descrizione',
    `acat` tinytext NOT NULL COMMENT 'categoria',
    `aprez` decimal(12,2) NOT NULL COMMENT 'prezzo',
    `aimg` tinytext NOT NULL COMMENT 'immagine',
    `aflag` varchar(1) NOT NULL COMMENT 'flag'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
echo "<br />Creata tabella ART";

// Struttura della tabella `".$_POST['pref']."cat`


$PDO->exec("CREATE TABLE `".$_POST['pref']."cat` (
    `cid` int(5) NOT NULL COMMENT 'ID',
    `cstat` varchar(1) NOT NULL COMMENT 'stato',
    `cprog` int(6) NOT NULL COMMENT 'Progr.',
    `ccod` int(5) NOT NULL COMMENT 'codice ',
    `cdes` varchar(100) NOT NULL COMMENT 'descrizione WOO',
    `cwoo` tinytext NOT NULL COMMENT 'categoria woo'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

  // Dump dei dati per la tabella `".$_POST['pref']."cat`

$PDO->exec("INSERT INTO `".$_POST['pref']."cat` (`cid`, `cstat`, `cprog`, `ccod`, `cdes`, `cwoo`) VALUES
  (138, '', 0, 0, 'FILATELIA', ''),
  (139, '', 0, 0, 'Italia', ''),
  (140, '', 0, 0, 'Antichi Stati', ''),
  (141, '', 0, 2002, 'Lombardo Veneto', 'FILATELIA>Italia>Antichi Stati>Lombardo Veneto'),
  (142, '', 0, 2004, 'Modena', 'FILATELIA>Italia>Antichi Stati>Modena'),
  (143, '', 0, 2006, 'Napoli', 'FILATELIA>Italia>Antichi Stati>Napoli'),
  (144, '', 0, 2008, 'Parma', 'FILATELIA>Italia>Antichi Stati>Parma'),
  (145, '', 0, 2010, 'Pontificio', 'FILATELIA>Italia>Antichi Stati>Pontificio'),
  (146, '', 0, 2012, 'Romagne', 'FILATELIA>Italia>Antichi Stati>Romagne'),
  (147, '', 0, 2014, 'Sardegna', 'FILATELIA>Italia>Antichi Stati>Sardegna'),
  (148, '', 0, 2016, 'Sicilia', 'FILATELIA>Italia>Antichi Stati>Sicilia'),
  (149, '', 0, 2018, 'Toscana', 'FILATELIA>Italia>Antichi Stati>Toscana'),
  (150, '', 0, 2020, 'Regno', 'FILATELIA>Italia>Regno'),
  (151, '', 0, 2022, 'RSI Luogotenenza', 'FILATELIA>Italia>RSI Luogotenenza'),
  (152, '', 0, 2024, 'Repubblica', 'FILATELIA>Italia>Repubblica'),
  (153, '', 0, 2026, 'Trieste Emiss.Locali etc', 'FILATELIA>Italia>Trieste Emiss.Locali etc'),
  (154, '', 0, 0, 'Occupazioni', ''),
  (155, '', 0, 2028, 'Occupazioni altre', 'FILATELIA>Italia>Occupazioni>Occupazioni altre'),
  (156, '', 0, 2030, 'Occupazione I Guerra', 'FILATELIA>Italia>Occupazioni>Occupazione I Guerra'),
  (157, '', 0, 2032, 'Occupazione II Guerra', 'FILATELIA>Italia>Occupazioni>Occupazione II Guerra'),
  (158, '', 0, 0, 'Colonie Italiane', ''),
  (159, '', 0, 2034, 'Altri settori Colonie', 'FILATELIA>Italia>Colonie Italiane>Altri settori Colonie'),
  (160, '', 0, 2036, 'A.O.I.', 'FILATELIA>Italia>Colonie Italiane>A.O.I.'),
  (161, '', 0, 2038, 'Cirenaica', 'FILATELIA>Italia>Colonie Italiane>Cirenaica'),
  (162, '', 0, 2040, 'Emissioni Generali', 'FILATELIA>Italia>Colonie Italiane>Emissioni Generali'),
  (163, '', 0, 2042, 'Egeo', 'FILATELIA>Italia>Colonie Italiane>Egeo'),
  (164, '', 0, 2044, 'Eritrea', 'FILATELIA>Italia>Colonie Italiane>Eritrea'),
  (165, '', 0, 2046, 'Etiopia', 'FILATELIA>Italia>Colonie Italiane>Etiopia'),
  (166, '', 0, 2048, 'Libia', 'FILATELIA>Italia>Colonie Italiane>Libia'),
  (167, '', 0, 2050, 'Oltre Giuba', 'FILATELIA>Italia>Colonie Italiane>Oltre Giuba'),
  (168, '', 0, 2052, 'Somalia', 'FILATELIA>Italia>Colonie Italiane>Somalia'),
  (169, '', 0, 2054, 'Tripolitania', 'FILATELIA>Italia>Colonie Italiane>Tripolitania'),
  (170, '', 0, 2056, 'Occupazioni Straniere', 'FILATELIA>Italia>Colonie Italiane>Occupazioni Straniere'),
  (171, '', 0, 2058, 'Uffici Postali all\'Estero', 'FILATELIA>Italia>Colonie Italiane>Uffici Postali all\'Estero'),
  (172, '', 0, 2060, 'San Marino', 'FILATELIA>Italia>San Marino'),
  (173, '', 0, 2062, 'Vaticano', 'FILATELIA>Italia>Vaticano'),
  (174, '', 0, 2064, 'Smom', 'FILATELIA>Italia>Smom'),
  (175, '', 0, 0, 'Europa', ''),
  (176, '', 0, 2066, 'Europa altre Nazioni', 'FILATELIA>Europa>Europa altre Nazioni'),
  (177, '', 0, 2068, 'Europa CEPT', 'FILATELIA>Europa>Europa CEPT'),
  (178, '', 0, 2070, 'Albania', 'FILATELIA>Europa>Albania'),
  (179, '', 0, 2072, 'Andorra Francese', 'FILATELIA>Europa>Andorra Francese'),
  (180, '', 0, 2074, 'Andorra Spagnola', 'FILATELIA>Europa>Andorra Spagnola'),
  (181, '', 0, 2076, 'Aland', 'FILATELIA>Europa>Aland'),
  (182, '', 0, 2078, 'Austria', 'FILATELIA>Europa>Austria'),
  (183, '', 0, 2080, 'Azerbaigian', 'FILATELIA>Europa>Azerbaigian'),
  (184, '', 0, 2082, 'Azzorre', 'FILATELIA>Europa>Azzorre'),
  (185, '', 0, 2084, 'Bielorussia', 'FILATELIA>Europa>Bielorussia'),
  (186, '', 0, 2086, 'Belgio', 'FILATELIA>Europa>Belgio'),
  (187, '', 0, 2088, 'Bosnia Erzegovina', 'FILATELIA>Europa>Bosnia Erzegovina'),
  (188, '', 0, 2090, 'Bulgaria', 'FILATELIA>Europa>Bulgaria'),
  (189, '', 0, 2092, 'Cecoslovacchia', 'FILATELIA>Europa>Cecoslovacchia'),
  (190, '', 0, 2094, 'Cipro', 'FILATELIA>Europa>Cipro'),
  (191, '', 0, 2096, 'Cipro del Nord', 'FILATELIA>Europa>Cipro del Nord'),
  (192, '', 0, 2098, 'Croazia', 'FILATELIA>Europa>Croazia'),
  (193, '', 0, 2100, 'Danimarca', 'FILATELIA>Europa>Danimarca'),
  (194, '', 0, 2102, 'Estonia', 'FILATELIA>Europa>Estonia'),
  (195, '', 0, 2104, 'Faeroer', 'FILATELIA>Europa>Faeroer'),
  (196, '', 0, 2106, 'Finlandia', 'FILATELIA>Europa>Finlandia'),
  (197, '', 0, 2108, 'Francia', 'FILATELIA>Europa>Francia'),
  (198, '', 0, 2110, 'Germania', 'FILATELIA>Europa>Germania'),
  (199, '', 0, 2112, 'Gibilterra', 'FILATELIA>Europa>Gibilterra'),
  (200, '', 0, 2114, 'Grecia', 'FILATELIA>Europa>Grecia'),
  (201, '', 0, 2116, 'Groenlandia', 'FILATELIA>Europa>Groenlandia'),
  (202, '', 0, 2118, 'Guernsey', 'FILATELIA>Europa>Guernsey'),
  (203, '', 0, 2120, 'Irlanda', 'FILATELIA>Europa>Irlanda'),
  (204, '', 0, 2122, 'Islanda', 'FILATELIA>Europa>Islanda'),
  (205, '', 0, 2124, 'Isola di Man', 'FILATELIA>Europa>Isola di Man'),
  (206, '', 0, 2126, 'Jersey', 'FILATELIA>Europa>Jersey'),
  (207, '', 0, 2128, 'Jugoslavia', 'FILATELIA>Europa>Jugoslavia'),
  (208, '', 0, 2130, 'Lettonia', 'FILATELIA>Europa>Lettonia'),
  (209, '', 0, 2132, 'Liechtenstein', 'FILATELIA>Europa>Liechtenstein'),
  (210, '', 0, 2134, 'Lituania', 'FILATELIA>Europa>Lituania'),
  (211, '', 0, 2136, 'Lussemburgo', 'FILATELIA>Europa>Lussemburgo'),
  (212, '', 0, 2138, 'Madeira', 'FILATELIA>Europa>Madeira'),
  (213, '', 0, 2140, 'Malta', 'FILATELIA>Europa>Malta'),
  (214, '', 0, 2142, 'Moldavia', 'FILATELIA>Europa>Moldavia'),
  (215, '', 0, 2144, 'Monaco', 'FILATELIA>Europa>Monaco'),
  (216, '', 0, 2146, 'Montenegro', 'FILATELIA>Europa>Montenegro'),
  (217, '', 0, 2148, 'ONU', 'FILATELIA>Europa>ONU'),
  (218, '', 0, 2150, 'Norvegia', 'FILATELIA>Europa>Norvegia'),
  (219, '', 0, 2152, 'Paesi Bassi', 'FILATELIA>Europa>Paesi Bassi'),
  (220, '', 0, 2154, 'Polonia', 'FILATELIA>Europa>Polonia'),
  (221, '', 0, 2156, 'Portogallo', 'FILATELIA>Europa>Portogallo'),
  (222, '', 0, 2158, 'Repubblica Ceca', 'FILATELIA>Europa>Repubblica Ceca'),
  (223, '', 0, 2160, 'Regno Unito', 'FILATELIA>Europa>Regno Unito'),
  (224, '', 0, 2162, 'Regno Unito Colonie', 'FILATELIA>Europa>Regno Unito Colonie'),
  (225, '', 0, 2164, 'Romania', 'FILATELIA>Europa>Romania'),
  (226, '', 0, 2166, 'Russia', 'FILATELIA>Europa>Russia'),
  (227, '', 0, 2168, 'Sarre', 'FILATELIA>Europa>Sarre'),
  (228, '', 0, 2170, 'Serbia', 'FILATELIA>Europa>Serbia'),
  (229, '', 0, 2172, 'Slovacchia', 'FILATELIA>Europa>Slovacchia'),
  (230, '', 0, 2174, 'Slovenia', 'FILATELIA>Europa>Slovenia'),
  (231, '', 0, 2176, 'Spagna', 'FILATELIA>Europa>Spagna'),
  (232, '', 0, 2178, 'Svezia', 'FILATELIA>Europa>Svezia'),
  (233, '', 0, 2180, 'Svizzera', 'FILATELIA>Europa>Svizzera'),
  (234, '', 0, 2182, 'Turchia', 'FILATELIA>Europa>Turchia'),
  (235, '', 0, 2184, 'Ucraina', 'FILATELIA>Europa>Ucraina'),
  (236, '', 0, 2186, 'Ungheria', 'FILATELIA>Europa>Ungheria'),
  (237, '', 0, 0, 'Africa', ''),
  (238, '', 0, 2188, 'Africa altre Nazioni', 'FILATELIA>Africa>Africa altre Nazioni'),
  (239, '', 0, 2190, 'Algeria', 'FILATELIA>Africa>Algeria'),
  (240, '', 0, 2192, 'Alto Volta', 'FILATELIA>Africa>Alto Volta'),
  (241, '', 0, 2194, 'Burundi', 'FILATELIA>Africa>Burundi'),
  (242, '', 0, 2196, 'Camerun', 'FILATELIA>Africa>Camerun'),
  (243, '', 0, 2198, 'Capo Verde', 'FILATELIA>Africa>Capo Verde'),
  (244, '', 0, 2200, 'Ciad', 'FILATELIA>Africa>Ciad'),
  (245, '', 0, 2202, 'Comore', 'FILATELIA>Africa>Comore'),
  (246, '', 0, 2204, 'Congo', 'FILATELIA>Africa>Congo'),
  (247, '', 0, 2206, 'Costa d\'Avorio', 'FILATELIA>Africa>Costa d\'Avorio'),
  (248, '', 0, 2208, 'Costa dei Somali', 'FILATELIA>Africa>Costa dei Somali'),
  (249, '', 0, 2210, 'Dahomey', 'FILATELIA>Africa>Dahomey'),
  (250, '', 0, 2212, 'Eritrea', 'FILATELIA>Africa>Eritrea'),
  (251, '', 0, 2214, 'Etiopia', 'FILATELIA>Africa>Etiopia'),
  (252, '', 0, 2216, 'Gabon', 'FILATELIA>Africa>Gabon'),
  (253, '', 0, 2218, 'Gambia', 'FILATELIA>Africa>Gambia'),
  (254, '', 0, 2220, 'Ghana', 'FILATELIA>Africa>Ghana'),
  (255, '', 0, 2222, 'Gibuti', 'FILATELIA>Africa>Gibuti'),
  (256, '', 0, 2224, 'Guinea', 'FILATELIA>Africa>Guinea'),
  (257, '', 0, 2226, 'Guinea Bissau', 'FILATELIA>Africa>Guinea Bissau'),
  (258, '', 0, 2228, 'Guinea Equatoriale', 'FILATELIA>Africa>Guinea Equatoriale'),
  (259, '', 0, 2230, 'Kenya', 'FILATELIA>Africa>Kenya'),
  (260, '', 0, 2232, 'Lesotho', 'FILATELIA>Africa>Lesotho'),
  (261, '', 0, 2234, 'Liberia', 'FILATELIA>Africa>Liberia'),
  (262, '', 0, 2236, 'Libia', 'FILATELIA>Africa>Libia'),
  (263, '', 0, 2238, 'Madagascar', 'FILATELIA>Africa>Madagascar'),
  (264, '', 0, 2240, 'Malawi', 'FILATELIA>Africa>Malawi'),
  (265, '', 0, 2242, 'Mali', 'FILATELIA>Africa>Mali'),
  (266, '', 0, 2244, 'Marocco', 'FILATELIA>Africa>Marocco'),
  (267, '', 0, 2246, 'Mauritania', 'FILATELIA>Africa>Mauritania'),
  (268, '', 0, 2248, 'Mozambico', 'FILATELIA>Africa>Mozambico'),
  (269, '', 0, 2250, 'Namibia', 'FILATELIA>Africa>Namibia'),
  (270, '', 0, 2252, 'Niger', 'FILATELIA>Africa>Niger'),
  (271, '', 0, 2254, 'Nigeria', 'FILATELIA>Africa>Nigeria'),
  (272, '', 0, 2256, 'Repubblica Centrafricana', 'FILATELIA>Africa>Repubblica Centrafricana'),
  (273, '', 0, 2258, 'Ruanda', 'FILATELIA>Africa>Ruanda'),
  (274, '', 0, 2260, 'Sao Tome e Principe', 'FILATELIA>Africa>Sao Tome e Principe'),
  (275, '', 0, 2262, 'Senegal', 'FILATELIA>Africa>Senegal'),
  (276, '', 0, 2264, 'Seychelles', 'FILATELIA>Africa>Seychelles'),
  (277, '', 0, 2266, 'Sierra Leone', 'FILATELIA>Africa>Sierra Leone'),
  (278, '', 0, 2268, 'Somalia', 'FILATELIA>Africa>Somalia'),
  (279, '', 0, 2270, 'Sudafrica', 'FILATELIA>Africa>Sudafrica'),
  (280, '', 0, 2272, 'Swaziland', 'FILATELIA>Africa>Swaziland'),
  (281, '', 0, 2274, 'Tanzania', 'FILATELIA>Africa>Tanzania'),
  (282, '', 0, 2276, 'Togo', 'FILATELIA>Africa>Togo'),
  (283, '', 0, 2278, 'Tunisia', 'FILATELIA>Africa>Tunisia'),
  (284, '', 0, 2280, 'Uganda', 'FILATELIA>Africa>Uganda'),
  (285, '', 0, 2282, 'Zambia', 'FILATELIA>Africa>Zambia'),
  (286, '', 0, 2284, 'Zimbabwe', 'FILATELIA>Africa>Zimbabwe'),
  (287, '', 0, 0, 'Americhe', ''),
  (288, '', 0, 2286, 'America altre Nazioni', 'FILATELIA>Americhe>America altre Nazioni'),
  (289, '', 0, 2288, 'Argentina', 'FILATELIA>Americhe>Argentina'),
  (290, '', 0, 2290, 'Belize', 'FILATELIA>Americhe>Belize'),
  (291, '', 0, 2292, 'Bolivia', 'FILATELIA>Americhe>Bolivia'),
  (292, '', 0, 2294, 'Brasile', 'FILATELIA>Americhe>Brasile'),
  (293, '', 0, 2296, 'Canada', 'FILATELIA>Americhe>Canada'),
  (294, '', 0, 2298, 'Cile', 'FILATELIA>Americhe>Cile'),
  (295, '', 0, 2300, 'Cuba', 'FILATELIA>Americhe>Cuba'),
  (296, '', 0, 2302, 'Colombia', 'FILATELIA>Americhe>Colombia'),
  (297, '', 0, 2304, 'Costa Rica', 'FILATELIA>Americhe>Costa Rica'),
  (298, '', 0, 2306, 'Dominica', 'FILATELIA>Americhe>Dominica'),
  (299, '', 0, 2308, 'Dominicana', 'FILATELIA>Americhe>Dominicana'),
  (300, '', 0, 2310, 'Ecuador', 'FILATELIA>Americhe>Ecuador'),
  (301, '', 0, 2312, 'El Salvador', 'FILATELIA>Americhe>El Salvador'),
  (302, '', 0, 2314, 'Giamaica', 'FILATELIA>Americhe>Giamaica'),
  (303, '', 0, 2316, 'Grenada', 'FILATELIA>Americhe>Grenada'),
  (304, '', 0, 2318, 'Guatemala', 'FILATELIA>Americhe>Guatemala'),
  (305, '', 0, 2320, 'Guyana', 'FILATELIA>Americhe>Guyana'),
  (306, '', 0, 2322, 'Haiti', 'FILATELIA>Americhe>Haiti'),
  (307, '', 0, 2324, 'Honduras', 'FILATELIA>Americhe>Honduras'),
  (308, '', 0, 2326, 'Isole Vergini', 'FILATELIA>Americhe>Isole Vergini'),
  (309, '', 0, 2328, 'Messico', 'FILATELIA>Americhe>Messico'),
  (310, '', 0, 2330, 'Nicaragua', 'FILATELIA>Americhe>Nicaragua'),
  (311, '', 0, 2332, 'Panama', 'FILATELIA>Americhe>Panama'),
  (312, '', 0, 2334, 'Paraguay', 'FILATELIA>Americhe>Paraguay'),
  (313, '', 0, 2336, 'PerÃ¹', 'FILATELIA>Americhe>PerÃ¹'),
  (314, '', 0, 2338, 'Saint Kitts e Nevis', 'FILATELIA>Americhe>Saint Kitts e Nevis'),
  (315, '', 0, 2340, 'Santa Lucia', 'FILATELIA>Americhe>Santa Lucia'),
  (316, '', 0, 2342, 'Saint Vincent e Grenadine', 'FILATELIA>Americhe>Saint Vincent e Grenadine'),
  (317, '', 0, 2344, 'Suriname', 'FILATELIA>Americhe>Suriname'),
  (318, '', 0, 2346, 'Trinidad e Tobago', 'FILATELIA>Americhe>Trinidad e Tobago'),
  (319, '', 0, 2348, 'Turks e Caicos', 'FILATELIA>Americhe>Turks e Caicos'),
  (320, '', 0, 2350, 'USA', 'FILATELIA>Americhe>USA'),
  (321, '', 0, 2352, 'Uruguay', 'FILATELIA>Americhe>Uruguay'),
  (322, '', 0, 2354, 'Venezuela', 'FILATELIA>Americhe>Venezuela'),
  (323, '', 0, 0, 'Asia', ''),
  (324, '', 0, 2356, 'Asia altre Nazioni', 'FILATELIA>Asia>Asia altre Nazioni'),
  (325, '', 0, 2358, 'Armenia', 'FILATELIA>Asia>Armenia'),
  (326, '', 0, 2360, 'Azerbaigian', 'FILATELIA>Asia>Azerbaigian'),
  (327, '', 0, 2362, 'Bangladesh', 'FILATELIA>Asia>Bangladesh'),
  (328, '', 0, 2364, 'Bhutan', 'FILATELIA>Asia>Bhutan'),
  (329, '', 0, 2366, 'Birmania', 'FILATELIA>Asia>Birmania'),
  (330, '', 0, 2368, 'Cambogia', 'FILATELIA>Asia>Cambogia'),
  (331, '', 0, 2370, 'Cina', 'FILATELIA>Asia>Cina'),
  (332, '', 0, 2372, 'Corea del Nord', 'FILATELIA>Asia>Corea del Nord'),
  (333, '', 0, 2374, 'Corea del Sud', 'FILATELIA>Asia>Corea del Sud'),
  (334, '', 0, 2376, 'Filippine', 'FILATELIA>Asia>Filippine'),
  (335, '', 0, 2378, 'Georgia', 'FILATELIA>Asia>Georgia'),
  (336, '', 0, 2380, 'Giappone', 'FILATELIA>Asia>Giappone'),
  (337, '', 0, 2382, 'Hong Kong', 'FILATELIA>Asia>Hong Kong'),
  (338, '', 0, 2384, 'India', 'FILATELIA>Asia>India'),
  (339, '', 0, 2386, 'Indonesia', 'FILATELIA>Asia>Indonesia'),
  (340, '', 0, 2388, 'Kazakistan', 'FILATELIA>Asia>Kazakistan'),
  (341, '', 0, 2390, 'Kirghizistan', 'FILATELIA>Asia>Kirghizistan'),
  (342, '', 0, 2392, 'Laos', 'FILATELIA>Asia>Laos'),
  (343, '', 0, 2394, 'Macao', 'FILATELIA>Asia>Macao'),
  (344, '', 0, 2396, 'Maldive', 'FILATELIA>Asia>Maldive'),
  (345, '', 0, 2398, 'Malesia', 'FILATELIA>Asia>Malesia'),
  (346, '', 0, 2400, 'Myanmar', 'FILATELIA>Asia>Myanmar'),
  (347, '', 0, 2402, 'Mongolia', 'FILATELIA>Asia>Mongolia'),
  (348, '', 0, 2404, 'Nepal', 'FILATELIA>Asia>Nepal'),
  (349, '', 0, 2406, 'Pakistan', 'FILATELIA>Asia>Pakistan'),
  (350, '', 0, 2408, 'Singapore', 'FILATELIA>Asia>Singapore'),
  (351, '', 0, 2410, 'Sri Lanka', 'FILATELIA>Asia>Sri Lanka'),
  (352, '', 0, 2412, 'Tagikistan', 'FILATELIA>Asia>Tagikistan'),
  (353, '', 0, 2414, 'Taiwan', 'FILATELIA>Asia>Taiwan'),
  (354, '', 0, 2416, 'Thailandia', 'FILATELIA>Asia>Thailandia'),
  (355, '', 0, 2418, 'Timor', 'FILATELIA>Asia>Timor'),
  (356, '', 0, 2420, 'Turkmenistan', 'FILATELIA>Asia>Turkmenistan'),
  (357, '', 0, 2422, 'Uzbekistan', 'FILATELIA>Asia>Uzbekistan'),
  (358, '', 0, 2424, 'Vietnam', 'FILATELIA>Asia>Vietnam'),
  (359, '', 0, 0, 'Medio Oriente', ''),
  (360, '', 0, 2426, 'Medio Oriente altre Nazioni', 'FILATELIA>Medio Oriente>Medio Oriente altre Nazioni'),
  (361, '', 0, 2428, 'Afganistan', 'FILATELIA>Medio Oriente>Afganistan'),
  (362, '', 0, 2430, 'Arabia Saudita', 'FILATELIA>Medio Oriente>Arabia Saudita'),
  (363, '', 0, 2432, 'Bahrein ', 'FILATELIA>Medio Oriente>Bahrein '),
  (364, '', 0, 2434, 'Egitto', 'FILATELIA>Medio Oriente>Egitto'),
  (365, '', 0, 2436, 'Emirati Arabi Uniti', 'FILATELIA>Medio Oriente>Emirati Arabi Uniti'),
  (366, '', 0, 2438, 'Giordania', 'FILATELIA>Medio Oriente>Giordania'),
  (367, '', 0, 2440, 'Iran', 'FILATELIA>Medio Oriente>Iran'),
  (368, '', 0, 2442, 'Iraq', 'FILATELIA>Medio Oriente>Iraq'),
  (369, '', 0, 2444, 'Israele', 'FILATELIA>Medio Oriente>Israele'),
  (370, '', 0, 2446, 'Kuwait ', 'FILATELIA>Medio Oriente>Kuwait '),
  (371, '', 0, 2448, 'Libano', 'FILATELIA>Medio Oriente>Libano'),
  (372, '', 0, 2450, 'Oman', 'FILATELIA>Medio Oriente>Oman'),
  (373, '', 0, 2452, 'Palestina', 'FILATELIA>Medio Oriente>Palestina'),
  (374, '', 0, 2454, 'Qatar', 'FILATELIA>Medio Oriente>Qatar'),
  (375, '', 0, 2456, 'Sharjah', 'FILATELIA>Medio Oriente>Sharjah'),
  (376, '', 0, 2458, 'Siria', 'FILATELIA>Medio Oriente>Siria'),
  (377, '', 0, 2460, 'Yemen', 'FILATELIA>Medio Oriente>Yemen'),
  (378, '', 0, 0, 'Oceania', ''),
  (379, '', 0, 2462, 'Oceania altre Nazioni', 'FILATELIA>Oceania>Oceania altre Nazioni'),
  (380, '', 0, 2464, 'Australia', 'FILATELIA>Oceania>Australia'),
  (381, '', 0, 2466, 'Fiji', 'FILATELIA>Oceania>Fiji'),
  (382, '', 0, 2468, 'Isole Cook', 'FILATELIA>Oceania>Isole Cook'),
  (383, '', 0, 2470, 'Isole Pitcairn', 'FILATELIA>Oceania>Isole Pitcairn'),
  (384, '', 0, 2472, 'Isole Salomone', 'FILATELIA>Oceania>Isole Salomone'),
  (385, '', 0, 2474, 'Kiribati', 'FILATELIA>Oceania>Kiribati'),
  (386, '', 0, 2476, 'Micronesia', 'FILATELIA>Oceania>Micronesia'),
  (387, '', 0, 2478, 'Nauru', 'FILATELIA>Oceania>Nauru'),
  (388, '', 0, 2480, 'Niue', 'FILATELIA>Oceania>Niue'),
  (389, '', 0, 2482, 'Nuova Caledonia', 'FILATELIA>Oceania>Nuova Caledonia'),
  (390, '', 0, 2484, 'Nuova Zelanda', 'FILATELIA>Oceania>Nuova Zelanda'),
  (391, '', 0, 2486, 'Palau', 'FILATELIA>Oceania>Palau'),
  (392, '', 0, 2488, 'Papua Nuova Guinea', 'FILATELIA>Oceania>Papua Nuova Guinea'),
  (393, '', 0, 2490, 'Polinesia', 'FILATELIA>Oceania>Polinesia'),
  (394, '', 0, 2492, 'Samoa', 'FILATELIA>Oceania>Samoa'),
  (395, '', 0, 2494, 'Territorio Antartico Australiano', 'FILATELIA>Oceania>Territorio Antartico Australiano'),
  (396, '', 0, 2496, 'Territorio Antartico Britannico', 'FILATELIA>Oceania>Territorio Antartico Britannico'),
  (397, '', 0, 2498, 'Territorio Antartico Francese', 'FILATELIA>Oceania>Territorio Antartico Francese'),
  (398, '', 0, 2500, 'Tokelau', 'FILATELIA>Oceania>Tokelau'),
  (399, '', 0, 2502, 'Tonga', 'FILATELIA>Oceania>Tonga'),
  (400, '', 0, 2504, 'Tuvalu', 'FILATELIA>Oceania>Tuvalu'),
  (401, '', 0, 2506, 'Vanuatu', 'FILATELIA>Oceania>Vanuatu'),
  (402, '', 0, 2508, 'Wallis e Futuna', 'FILATELIA>Oceania>Wallis e Futuna'),
  (403, '', 0, 0, 'STORIA POSTALE', 'STORIA POSTALE'),
  (404, '', 0, 0, 'Aerofilia', 'Aerofilia'),
  (405, '', 0, 4002, 'Aerostati', 'STORIA POSTALE>Aerofilia>Aerostati'),
  (406, '', 0, 0, '', ''),
  (407, '', 0, 4004, 'Celebrativi', 'STORIA POSTALE>Aerofilia>Celebrativi'),
  (408, '', 0, 4006, 'Elicottero', 'STORIA POSTALE>Aerofilia>Elicottero'),
  (409, '', 0, 4008, 'Giri Aerei', 'STORIA POSTALE>Aerofilia>Giri Aerei'),
  (410, '', 0, 4010, 'I°Voli Italia', 'STORIA POSTALE>Aerofilia>I°Voli Italia'),
  (411, '', 0, 4012, 'I°Voli Esteri', 'STORIA POSTALE>Aerofilia>I°Voli Esteri'),
  (412, '', 0, 4014, 'Paracadutismo', 'STORIA POSTALE>Aerofilia>Paracadutismo'),
  (413, '', 0, 4016, 'Raduni Raid', 'STORIA POSTALE>Aerofilia>Raduni Raid'),
  (414, '', 0, 4018, 'Razzogrammi Spazio', 'STORIA POSTALE>Aerofilia>Razzogrammi Spazio'),
  (415, '', 0, 4020, 'Voli Papali Presidenziali', 'STORIA POSTALE>Aerofilia>Voli Papali Presidenziali'),
  (416, '', 0, 4022, 'Voli Speciali', 'STORIA POSTALE>Aerofilia>Voli Speciali'),
  (417, '', 0, 0, 'Annullamenti', 'Annullamenti'),
  (418, '', 0, 4024, 'Annulli Aeroportuali', 'STORIA POSTALE>Annullamenti>Annulli Aeroportuali'),
  (419, '', 0, 4026, 'Annulli Ambulanti', 'STORIA POSTALE>Annullamenti>Annulli Ambulanti'),
  (420, '', 0, 4028, 'Annulli Località Italiane', 'STORIA POSTALE>Annullamenti>Annulli Località Italiane'),
  (421, '', 0, 4030, 'Annulli Località Estere', 'STORIA POSTALE>Annullamenti>Annulli Località Estere'),
  (422, '', 0, 4032, 'Annulli Meccanici', 'STORIA POSTALE>Annullamenti>Annulli Meccanici'),
  (423, '', 0, 4034, 'Annulli Muti', 'STORIA POSTALE>Annullamenti>Annulli Muti'),
  (424, '', 0, 4036, 'Annulli Navali', 'STORIA POSTALE>Annullamenti>Annulli Navali'),
  (425, '', 0, 4038, 'Annulli Speciali', 'STORIA POSTALE>Annullamenti>Annulli Speciali'),
  (426, '', 0, 4040, 'Avvisi di Ricevimento', 'STORIA POSTALE>Avvisi di Ricevimento'),
  (427, '', 0, 4042, 'Buste Intestate', 'STORIA POSTALE>Buste Intestate'),
  (428, '', 0, 4044, 'Erinnofilia', 'STORIA POSTALE>Erinnofilia'),
  (429, '', 0, 4046, 'Esperanto', 'STORIA POSTALE>Esperanto'),
  (430, '', 0, 4048, 'Fdc Maximum Italiane', 'STORIA POSTALE>Fdc Maximum Italiane'),
  (431, '', 0, 4050, 'Fdc Maximum Estere', 'STORIA POSTALE>Fdc Maximum Estere'),
  (432, '', 0, 4052, 'Interi Postali Nuovi', 'STORIA POSTALE>Interi Postali Nuovi'),
  (433, '', 0, 4054, 'Interi Postali Usati', 'STORIA POSTALE>Interi Postali Usati'),
  (434, '', 0, 4056, 'IPZS', 'STORIA POSTALE>IPZS'),
  (435, '', 0, 4058, 'Lettere in Franchigia', 'STORIA POSTALE>Lettere in Franchigia'),
  (436, '', 0, 4060, 'Perfin', 'STORIA POSTALE>Perfin'),
  (437, '', 0, 4062, 'Prefilatelia', 'STORIA POSTALE>Prefilatelia'),
  (438, '', 0, 4064, 'San Marino', 'STORIA POSTALE>San Marino'),
  (439, '', 0, 4066, 'Vaticano', 'STORIA POSTALE>Vaticano'),
  (440, '', 0, 0, 'Lettere affrancate Italia', 'Lettere affrancate Italia'),
  (441, '', 0, 4068, 'Italia Regno', 'STORIA POSTALE>Lettere affrancate Italia>Italia Regno'),
  (442, '', 0, 4070, 'Italia Regno Isolati', 'STORIA POSTALE>Lettere affrancate Italia>Italia Regno Isolati'),
  (443, '', 0, 4072, 'Italia RSI Luogotenenza', 'STORIA POSTALE>Lettere affrancate Italia>Italia RSI Luogotenenza'),
  (444, '', 0, 4074, 'Italia Repubblica', 'STORIA POSTALE>Lettere affrancate Italia>Italia Repubblica'),
  (445, '', 0, 4076, 'Italia Repubblica Isolati', 'STORIA POSTALE>Lettere affrancate Italia>Italia Repubblica Isolati'),
  (446, '', 0, 4078, 'Italia Colonie', 'STORIA POSTALE>Lettere affrancate Italia>Italia Colonie'),
  (447, '', 0, 4080, 'Italia Occupazioni', 'STORIA POSTALE>Lettere affrancate Italia>Italia Occupazioni'),
  (448, '', 0, 0, 'Lettere affrancate Estero', 'Lettere affrancate Estero'),
  (449, '', 0, 4082, 'Lettere altre Nazioni', 'STORIA POSTALE>Lettere affrancate Estero>Lettere altre Nazioni'),
  (450, '', 0, 4084, 'Austria', 'STORIA POSTALE>Lettere affrancate Estero>Austria'),
  (451, '', 0, 4086, 'Belgio', 'STORIA POSTALE>Lettere affrancate Estero>Belgio'),
  (452, '', 0, 4088, 'Cecoslovacchia', 'STORIA POSTALE>Lettere affrancate Estero>Cecoslovacchia'),
  (453, '', 0, 4090, 'Francia', 'STORIA POSTALE>Lettere affrancate Estero>Francia'),
  (454, '', 0, 4092, 'Germania', 'STORIA POSTALE>Lettere affrancate Estero>Germania'),
  (455, '', 0, 4094, 'Malta', 'STORIA POSTALE>Lettere affrancate Estero>Malta'),
  (456, '', 0, 4096, 'Paesi Bassi', 'STORIA POSTALE>Lettere affrancate Estero>Paesi Bassi'),
  (457, '', 0, 4098, 'Polonia', 'STORIA POSTALE>Lettere affrancate Estero>Polonia'),
  (458, '', 0, 4100, 'Regno Unito', 'STORIA POSTALE>Lettere affrancate Estero>Regno Unito'),
  (459, '', 0, 4102, 'Romania', 'STORIA POSTALE>Lettere affrancate Estero>Romania'),
  (460, '', 0, 4104, 'Russia', 'STORIA POSTALE>Lettere affrancate Estero>Russia'),
  (461, '', 0, 4106, 'Spagna', 'STORIA POSTALE>Lettere affrancate Estero>Spagna'),
  (462, '', 0, 4108, 'Svizzera', 'STORIA POSTALE>Lettere affrancate Estero>Svizzera'),
  (463, '', 0, 4110, 'Ungheria', 'STORIA POSTALE>Lettere affrancate Estero>Ungheria'),
  (464, '', 0, 0, 'Posta Militare', 'Posta Militare'),
  (465, '', 0, 4112, 'Feldpost Posta da Campo', 'STORIA POSTALE>Posta Militare>Feldpost Posta da Campo'),
  (466, '', 0, 4114, 'Posta Militare fino al 1930', 'STORIA POSTALE>Posta Militare>Posta Militare fino al 1930'),
  (467, '', 0, 4116, 'Posta Militare dopo il 1930', 'STORIA POSTALE>Posta Militare>Posta Militare dopo il 1930'),
  (468, '', 0, 4118, 'Prigionieri di Guerra', 'STORIA POSTALE>Posta Militare>Prigionieri di Guerra'),
  (469, '', 0, 0, 'CARTOLINE', ''),
  (470, '', 0, 0, 'Paesaggistiche Italiane', ''),
  (471, '', 0, 0, 'Abruzzo', ''),
  (472, '', 0, 3002, 'Chieti', 'CARTOLINE>Paesaggistiche Italiane>Abruzzo>Chieti'),
  (473, '', 0, 3004, 'L\'Aquila', 'CARTOLINE>Paesaggistiche Italiane>Abruzzo>L\'Aquila'),
  (474, '', 0, 3006, 'Pescara', 'CARTOLINE>Paesaggistiche Italiane>Abruzzo>Pescara'),
  (475, '', 0, 3008, 'Teramo', 'CARTOLINE>Paesaggistiche Italiane>Abruzzo>Teramo'),
  (476, '', 0, 0, 'Basilicata', ''),
  (477, '', 0, 3010, 'Matera', 'CARTOLINE>Paesaggistiche Italiane>Basilicata>Matera'),
  (478, '', 0, 3012, 'Potenza', 'CARTOLINE>Paesaggistiche Italiane>Basilicata>Potenza'),
  (479, '', 0, 0, 'Calabria', ''),
  (480, '', 0, 3014, 'Catanzaro', 'CARTOLINE>Paesaggistiche Italiane>Calabria>Catanzaro'),
  (481, '', 0, 3016, 'Cosenza', 'CARTOLINE>Paesaggistiche Italiane>Calabria>Cosenza'),
  (482, '', 0, 3018, 'Crotone', 'CARTOLINE>Paesaggistiche Italiane>Calabria>Crotone'),
  (483, '', 0, 3020, 'Lamezia Terme', 'CARTOLINE>Paesaggistiche Italiane>Calabria>Lamezia Terme'),
  (484, '', 0, 3022, 'Reggio Calabria', 'CARTOLINE>Paesaggistiche Italiane>Calabria>Reggio Calabria'),
  (485, '', 0, 3024, 'Vibo Valentia', 'CARTOLINE>Paesaggistiche Italiane>Calabria>Vibo Valentia'),
  (486, '', 0, 0, 'Campania', ''),
  (487, '', 0, 3026, 'Afragola', 'CARTOLINE>Paesaggistiche Italiane>Campania>Afragola'),
  (488, '', 0, 3028, 'Avellino', 'CARTOLINE>Paesaggistiche Italiane>Campania>Avellino'),
  (489, '', 0, 3030, 'Aversa', 'CARTOLINE>Paesaggistiche Italiane>Campania>Aversa'),
  (490, '', 0, 3032, 'Battipaglia', 'CARTOLINE>Paesaggistiche Italiane>Campania>Battipaglia'),
  (491, '', 0, 3034, 'Benevento', 'CARTOLINE>Paesaggistiche Italiane>Campania>Benevento'),
  (492, '', 0, 3036, 'Caserta', 'CARTOLINE>Paesaggistiche Italiane>Campania>Caserta'),
  (493, '', 0, 3038, 'Castellammare di Stabia', 'CARTOLINE>Paesaggistiche Italiane>Campania>Castellammare di Stabia'),
  (494, '', 0, 3040, 'Casoria', 'CARTOLINE>Paesaggistiche Italiane>Campania>Casoria'),
  (495, '', 0, 3042, 'Cava dei Tirreni', 'CARTOLINE>Paesaggistiche Italiane>Campania>Cava dei Tirreni'),
  (496, '', 0, 3044, 'Ercolano', 'CARTOLINE>Paesaggistiche Italiane>Campania>Ercolano'),
  (497, '', 0, 3046, 'Giugliano', 'CARTOLINE>Paesaggistiche Italiane>Campania>Giugliano'),
  (498, '', 0, 3048, 'Marano', 'CARTOLINE>Paesaggistiche Italiane>Campania>Marano'),
  (499, '', 0, 3050, 'Napoli', 'CARTOLINE>Paesaggistiche Italiane>Campania>Napoli'),
  (500, '', 0, 3052, 'Pompei', 'CARTOLINE>Paesaggistiche Italiane>Campania>Pompei'),
  (501, '', 0, 3054, 'Portici', 'CARTOLINE>Paesaggistiche Italiane>Campania>Portici'),
  (502, '', 0, 3056, 'Pozzuoli', 'CARTOLINE>Paesaggistiche Italiane>Campania>Pozzuoli'),
  (503, '', 0, 3058, 'Salerno', 'CARTOLINE>Paesaggistiche Italiane>Campania>Salerno'),
  (504, '', 0, 3060, 'San Giorgio a Cremano', 'CARTOLINE>Paesaggistiche Italiane>Campania>San Giorgio a Cremano'),
  (505, '', 0, 3062, 'Torre Annunziata', 'CARTOLINE>Paesaggistiche Italiane>Campania>Torre Annunziata'),
  (506, '', 0, 3064, 'Torre del Greco', 'CARTOLINE>Paesaggistiche Italiane>Campania>Torre del Greco'),
  (507, '', 0, 0, 'Emilia Romagna', ''),
  (508, '', 0, 3068, 'Bologna', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Bologna'),
  (509, '', 0, 3070, 'Carpi', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Carpi'),
  (510, '', 0, 3072, 'Faenza', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Faenza'),
  (511, '', 0, 3074, 'Ferrara', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Ferrara'),
  (512, '', 0, 3076, 'Forlì Cesena', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Forlì Cesena'),
  (513, '', 0, 3078, 'Imola', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Imola'),
  (514, '', 0, 3080, 'Modena', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Modena'),
  (515, '', 0, 3082, 'Parma', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Parma'),
  (516, '', 0, 3084, 'Piacenza', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Piacenza'),
  (517, '', 0, 3086, 'Ravenna', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Ravenna'),
  (518, '', 0, 3088, 'Reggio Emilia', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Reggio Emilia'),
  (519, '', 0, 3090, 'Rimini', 'CARTOLINE>Paesaggistiche Italiane>Emilia Romagna>Rimini'),
  (520, '', 0, 0, 'Friuli Venezia Giulia', ''),
  (521, '', 0, 3092, 'Gorizia', 'CARTOLINE>Paesaggistiche Italiane>Friuli Venezia Giulia>Gorizia'),
  (522, '', 0, 3094, 'Pordenone', 'CARTOLINE>Paesaggistiche Italiane>Friuli Venezia Giulia>Pordenone'),
  (523, '', 0, 3096, 'Trieste', 'CARTOLINE>Paesaggistiche Italiane>Friuli Venezia Giulia>Trieste'),
  (524, '', 0, 3098, 'Udine', 'CARTOLINE>Paesaggistiche Italiane>Friuli Venezia Giulia>Udine'),
  (525, '', 0, 0, 'Lazio', ''),
  (526, '', 0, 3100, 'Aprilia', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Aprilia'),
  (527, '', 0, 3102, 'Civitavecchia', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Civitavecchia'),
  (528, '', 0, 3104, 'Fiumicino', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Fiumicino'),
  (529, '', 0, 3106, 'Frosinone', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Frosinone'),
  (530, '', 0, 3108, 'Guidonia', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Guidonia'),
  (531, '', 0, 3110, 'Latina', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Latina'),
  (532, '', 0, 3112, 'Rieti', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Rieti'),
  (533, '', 0, 3114, 'Roma', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Roma'),
  (534, '', 0, 3116, 'Tivoli', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Tivoli'),
  (535, '', 0, 3118, 'Velletri', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Velletri'),
  (536, '', 0, 3120, 'Viterbo', 'CARTOLINE>Paesaggistiche Italiane>Lazio>Viterbo'),
  (537, '', 0, 0, 'Liguria', ''),
  (538, '', 0, 3122, 'Genova', 'CARTOLINE>Paesaggistiche Italiane>Liguria>Genova'),
  (539, '', 0, 3124, 'Imperia', 'CARTOLINE>Paesaggistiche Italiane>Liguria>Imperia'),
  (540, '', 0, 3126, 'La Spezia', 'CARTOLINE>Paesaggistiche Italiane>Liguria>La Spezia'),
  (541, '', 0, 3128, 'Sanremo', 'CARTOLINE>Paesaggistiche Italiane>Liguria>Sanremo'),
  (542, '', 0, 3130, 'Savona', 'CARTOLINE>Paesaggistiche Italiane>Liguria>Savona'),
  (543, '', 0, 0, 'Lombardia', ''),
  (544, '', 0, 3132, 'Bergamo', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Bergamo'),
  (545, '', 0, 3134, 'Brescia', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Brescia'),
  (546, '', 0, 3136, 'Busto Arsizio', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Busto Arsizio'),
  (547, '', 0, 3138, 'Cinisello', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Cinisello'),
  (548, '', 0, 3140, 'Cologno', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Cologno'),
  (549, '', 0, 3142, 'Como', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Como'),
  (550, '', 0, 3144, 'Cremona', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Cremona'),
  (551, '', 0, 3146, 'Lecco', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Lecco'),
  (552, '', 0, 3148, 'Legnano', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Legnano'),
  (553, '', 0, 3150, 'Lodi', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Lodi'),
  (554, '', 0, 3152, 'Luino', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Luino'),
  (555, '', 0, 3154, 'Mantova', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Mantova'),
  (556, '', 0, 3156, 'Milano', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Milano'),
  (557, '', 0, 3158, 'Monza Brianza', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Monza Brianza'),
  (558, '', 0, 3160, 'Pavia', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Pavia'),
  (559, '', 0, 3162, 'Rho', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Rho'),
  (560, '', 0, 3164, 'Sesto San Giovanni', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Sesto San Giovanni'),
  (561, '', 0, 3166, 'Sondrio', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Sondrio'),
  (562, '', 0, 3168, 'Varese', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Varese'),
  (563, '', 0, 3170, 'Vigevano', 'CARTOLINE>Paesaggistiche Italiane>Lombardia>Vigevano'),
  (564, '', 0, 0, 'Marche', ''),
  (565, '', 0, 3172, 'Ancona', 'CARTOLINE>Paesaggistiche Italiane>Marche>Ancona'),
  (566, '', 0, 3174, 'Ascoli Piceno', 'CARTOLINE>Paesaggistiche Italiane>Marche>Ascoli Piceno'),
  (567, '', 0, 3176, 'Fano', 'CARTOLINE>Paesaggistiche Italiane>Marche>Fano'),
  (568, '', 0, 3178, 'Fermo', 'CARTOLINE>Paesaggistiche Italiane>Marche>Fermo'),
  (569, '', 0, 3180, 'Macerata', 'CARTOLINE>Paesaggistiche Italiane>Marche>Macerata'),
  (570, '', 0, 3182, 'Pesaro Urbino', 'CARTOLINE>Paesaggistiche Italiane>Marche>Pesaro Urbino'),
  (571, '', 0, 0, 'Molise', ''),
  (572, '', 0, 3184, 'Campobasso', 'CARTOLINE>Paesaggistiche Italiane>Molise>Campobasso'),
  (573, '', 0, 3186, 'Isernia', 'CARTOLINE>Paesaggistiche Italiane>Molise>Isernia'),
  (574, '', 0, 0, 'Piemonte', ''),
  (575, '', 0, 3188, 'Alessandria', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Alessandria'),
  (576, '', 0, 3190, 'Asti', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Asti'),
  (577, '', 0, 3192, 'Biella', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Biella'),
  (578, '', 0, 3194, 'Cuneo', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Cuneo'),
  (579, '', 0, 3196, 'Moncalieri', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Moncalieri'),
  (580, '', 0, 3198, 'Novara', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Novara'),
  (581, '', 0, 3200, 'Rivoli', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Rivoli'),
  (582, '', 0, 3202, 'Torino', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Torino'),
  (583, '', 0, 3204, 'Verbano Cusio Ossola', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Verbano Cusio Ossola'),
  (584, '', 0, 3206, 'Vercelli', 'CARTOLINE>Paesaggistiche Italiane>Piemonte>Vercelli'),
  (585, '', 0, 0, 'Puglia', ''),
  (586, '', 0, 3208, 'Altamura', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Altamura'),
  (587, '', 0, 3210, 'Andria', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Andria'),
  (588, '', 0, 3212, 'Bari', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Bari'),
  (589, '', 0, 3214, 'Barletta', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Barletta'),
  (590, '', 0, 3216, 'Bisceglie', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Bisceglie'),
  (591, '', 0, 3218, 'Bitonto', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Bitonto'),
  (592, '', 0, 3220, 'Brindisi', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Brindisi'),
  (593, '', 0, 3222, 'Cerignola', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Cerignola'),
  (594, '', 0, 3224, 'Foggia', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Foggia'),
  (595, '', 0, 3226, 'Lecce', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Lecce'),
  (596, '', 0, 3228, 'Manfredonia', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Manfredonia'),
  (597, '', 0, 3230, 'Molfetta', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Molfetta'),
  (598, '', 0, 3232, 'San Severo', 'CARTOLINE>Paesaggistiche Italiane>Puglia>San Severo'),
  (599, '', 0, 3234, 'Taranto', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Taranto'),
  (600, '', 0, 3236, 'Trani', 'CARTOLINE>Paesaggistiche Italiane>Puglia>Trani'),
  (601, '', 0, 0, 'Sardegna', ''),
  (602, '', 0, 3238, 'Cagliari', 'CARTOLINE>Paesaggistiche Italiane>Sardegna>Cagliari'),
  (603, '', 0, 3240, 'Carbonia', 'CARTOLINE>Paesaggistiche Italiane>Sardegna>Carbonia'),
  (604, '', 0, 3242, 'Iglesias', 'CARTOLINE>Paesaggistiche Italiane>Sardegna>Iglesias'),
  (605, '', 0, 3246, 'Nuoro', 'CARTOLINE>Paesaggistiche Italiane>Sardegna>Nuoro'),
  (606, '', 0, 3248, 'Olbia', 'CARTOLINE>Paesaggistiche Italiane>Sardegna>Olbia'),
  (607, '', 0, 3250, 'Oristano', 'CARTOLINE>Paesaggistiche Italiane>Sardegna>Oristano'),
  (608, '', 0, 3252, 'Quartu Sant\'Elena', 'CARTOLINE>Paesaggistiche Italiane>Sardegna>Quartu Sant\'Elena'),
  (609, '', 0, 3254, 'Sassari', 'CARTOLINE>Paesaggistiche Italiane>Sardegna>Sassari'),
  (610, '', 0, 0, 'Sicilia', ''),
  (611, '', 0, 3256, 'Acireale', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Acireale'),
  (612, '', 0, 3258, 'Agrigento', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Agrigento'),
  (613, '', 0, 3260, 'Bagheria', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Bagheria'),
  (614, '', 0, 3262, 'Caltanissetta', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Caltanissetta'),
  (615, '', 0, 3264, 'Catania', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Catania'),
  (616, '', 0, 3266, 'Enna', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Enna'),
  (617, '', 0, 3268, 'Gela', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Gela'),
  (618, '', 0, 3270, 'Marsala', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Marsala'),
  (619, '', 0, 3272, 'Mazara del Vallo', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Mazara del Vallo'),
  (620, '', 0, 3274, 'Messina', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Messina'),
  (621, '', 0, 3276, 'Modica', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Modica'),
  (622, '', 0, 3278, 'Palermo', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Palermo'),
  (623, '', 0, 3280, 'Ragusa', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Ragusa'),
  (624, '', 0, 3282, 'Siracusa', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Siracusa'),
  (625, '', 0, 3284, 'Trapani', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Trapani'),
  (626, '', 0, 3286, 'Vittoria', 'CARTOLINE>Paesaggistiche Italiane>Sicilia>Vittoria'),
  (627, '', 0, 0, 'Toscana', ''),
  (628, '', 0, 3288, 'Arezzo', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Arezzo'),
  (629, '', 0, 3290, 'Carrara', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Carrara'),
  (630, '', 0, 3292, 'Empoli', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Empoli'),
  (631, '', 0, 3294, 'Firenze', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Firenze'),
  (632, '', 0, 3296, 'Grosseto', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Grosseto'),
  (633, '', 0, 3298, 'Livorno', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Livorno'),
  (634, '', 0, 3300, 'Lucca', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Lucca'),
  (635, '', 0, 3302, 'Massa', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Massa'),
  (636, '', 0, 3304, 'Pisa', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Pisa'),
  (637, '', 0, 3306, 'Pistoia', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Pistoia'),
  (638, '', 0, 3308, 'Prato', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Prato'),
  (639, '', 0, 3310, 'Scandicci', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Scandicci'),
  (640, '', 0, 3312, 'Siena', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Siena'),
  (641, '', 0, 3314, 'Viareggio', 'CARTOLINE>Paesaggistiche Italiane>Toscana>Viareggio'),
  (642, '', 0, 0, 'Trentino Alto Adige', ''),
  (643, '', 0, 3316, 'Bolzano', 'CARTOLINE>Paesaggistiche Italiane>Trentino Alto Adige>Bolzano'),
  (644, '', 0, 3318, 'Merano', 'CARTOLINE>Paesaggistiche Italiane>Trentino Alto Adige>Merano'),
  (645, '', 0, 3320, 'Trento', 'CARTOLINE>Paesaggistiche Italiane>Trentino Alto Adige>Trento'),
  (646, '', 0, 3322, 'Vipiteno', 'CARTOLINE>Paesaggistiche Italiane>Trentino Alto Adige>Vipiteno'),
  (647, '', 0, 0, 'Umbria', ''),
  (648, '', 0, 3324, 'Foligno', 'CARTOLINE>Paesaggistiche Italiane>Umbria>Foligno'),
  (649, '', 0, 3326, 'Perugia', 'CARTOLINE>Paesaggistiche Italiane>Umbria>Perugia'),
  (650, '', 0, 3328, 'Terni', 'CARTOLINE>Paesaggistiche Italiane>Umbria>Terni'),
  (651, '', 0, 0, 'Valle d\'Aosta', ''),
  (652, '', 0, 3330, 'Aosta', 'CARTOLINE>Paesaggistiche Italiane>Valle d\'Aosta>Aosta'),
  (653, '', 0, 0, 'Veneto', ''),
  (654, '', 0, 3332, 'Belluno', 'CARTOLINE>Paesaggistiche Italiane>Veneto>Belluno'),
  (655, '', 0, 3334, 'Chioggia', 'CARTOLINE>Paesaggistiche Italiane>Veneto>Chioggia'),
  (656, '', 0, 3336, 'Padova', 'CARTOLINE>Paesaggistiche Italiane>Veneto>Padova'),
  (657, '', 0, 3338, 'Rovigo', 'CARTOLINE>Paesaggistiche Italiane>Veneto>Rovigo'),
  (658, '', 0, 3340, 'Treviso', 'CARTOLINE>Paesaggistiche Italiane>Veneto>Treviso'),
  (659, '', 0, 3342, 'Venezia', 'CARTOLINE>Paesaggistiche Italiane>Veneto>Venezia'),
  (660, '', 0, 3344, 'Verona', 'CARTOLINE>Paesaggistiche Italiane>Veneto>Verona'),
  (661, '', 0, 3346, 'Vicenza', 'CARTOLINE>Paesaggistiche Italiane>Veneto>Vicenza'),
  (662, '', 0, 0, 'Paesaggistiche Estero', ''),
  (663, '', 0, 3348, 'Altre Nazioni', 'CARTOLINE>Paesaggistiche Estero>Altre Nazioni'),
  (664, '', 0, 3350, 'Austria', 'CARTOLINE>Paesaggistiche Estero>Austria'),
  (665, '', 0, 3352, 'Croazia', 'CARTOLINE>Paesaggistiche Estero>Croazia'),
  (666, '', 0, 3354, 'Danimarca', 'CARTOLINE>Paesaggistiche Estero>Danimarca'),
  (667, '', 0, 3356, 'Francia', 'CARTOLINE>Paesaggistiche Estero>Francia'),
  (668, '', 0, 3358, 'Germania', 'CARTOLINE>Paesaggistiche Estero>Germania'),
  (669, '', 0, 3360, 'Grecia', 'CARTOLINE>Paesaggistiche Estero>Grecia'),
  (670, '', 0, 3362, 'Gran Bretagna', 'CARTOLINE>Paesaggistiche Estero>Gran Bretagna'),
  (671, '', 0, 3364, 'Lubiana', 'CARTOLINE>Paesaggistiche Estero>Lubiana'),
  (672, '', 0, 3366, 'Spagna', 'CARTOLINE>Paesaggistiche Estero>Spagna'),
  (673, '', 0, 3368, 'Svizzera', 'CARTOLINE>Paesaggistiche Estero>Svizzera'),
  (674, '', 0, 3370, 'Egitto', 'CARTOLINE>Paesaggistiche Estero>Egitto'),
  (675, '', 0, 3372, 'Tunisia', 'CARTOLINE>Paesaggistiche Estero>Tunisia'),
  (676, '', 0, 3373, 'Ungheria', 'CARTOLINE>Paesaggistiche Estero>Ungheria'),
  (677, '', 0, 3374, 'U.S.A.', 'CARTOLINE>Paesaggistiche Estero>U.S.A.'),
  (678, '', 0, 0, 'Cartoline Tematiche', ''),
  (679, '', 0, 3376, 'Alberghi Ristoranti', 'CARTOLINE>Cartoline Tematiche>Alberghi Ristoranti'),
  (680, '', 0, 3378, 'Alpinismo Rifugi', 'CARTOLINE>Cartoline Tematiche>Alpinismo Rifugi'),
  (681, '', 0, 3380, 'Arte Cultura', 'CARTOLINE>Cartoline Tematiche>Arte Cultura'),
  (682, '', 0, 3382, 'Augurali', 'CARTOLINE>Cartoline Tematiche>Augurali'),
  (683, '', 0, 3384, 'Bimbi Dame Coppie', 'CARTOLINE>Cartoline Tematiche>Bimbi Dame Coppie'),
  (684, '', 0, 3386, 'Costumi Mestieri', 'CARTOLINE>Cartoline Tematiche>Costumi Mestieri'),
  (685, '', 0, 3388, 'Fauna', 'CARTOLINE>Cartoline Tematiche>Fauna'),
  (686, '', 0, 3390, 'Fiere Mostre Esposizioni', 'CARTOLINE>Cartoline Tematiche>Fiere Mostre Esposizioni'),
  (687, '', 0, 3392, 'Flora', 'CARTOLINE>Cartoline Tematiche>Flora'),
  (688, '', 0, 3394, 'Geografiche Topografiche', 'CARTOLINE>Cartoline Tematiche>Geografiche Topografiche'),
  (689, '', 0, 3396, 'Intestazione a Stampa', 'CARTOLINE>Cartoline Tematiche>Intestazione a Stampa'),
  (690, '', 0, 3398, 'Militari Patriottiche', 'CARTOLINE>Cartoline Tematiche>Militari Patriottiche'),
  (691, '', 0, 3400, 'Mobilità Trasporti', 'CARTOLINE>Cartoline Tematiche>Mobilità Trasporti'),
  (692, '', 0, 3402, 'Musica', 'CARTOLINE>Cartoline Tematiche>Musica'),
  (693, '', 0, 3404, 'Personaggi Illustri', 'CARTOLINE>Cartoline Tematiche>Personaggi Illustri'),
  (694, '', 0, 3406, 'Pubblicitarie', 'CARTOLINE>Cartoline Tematiche>Pubblicitarie'),
  (695, '', 0, 3408, 'Ricamate', 'CARTOLINE>Cartoline Tematiche>Ricamate'),
  (696, '', 0, 3410, 'Umoristiche', 'CARTOLINE>Cartoline Tematiche>Umoristiche'),
  (697, '', 0, 0, 'MATERIALE CARTACEO', ''),
  (698, '', 0, 5001, 'Autografi', 'MATERIALE CARTACEO>Autografi'),
  (699, '', 0, 5003, 'Calendari', 'MATERIALE CARTACEO>Calendari'),
  (700, '', 0, 5005, 'Cartamoneta Italiana', 'MATERIALE CARTACEO>Cartamoneta Italiana'),
  (701, '', 0, 5007, 'Cartamoneta Estera', 'MATERIALE CARTACEO>Cartamoneta Estera'),
  (702, '', 0, 5009, 'Decreti Editti', 'MATERIALE CARTACEO>Decreti Editti'),
  (703, '', 0, 5011, 'Diplomi Pagelle Menù', 'MATERIALE CARTACEO>Diplomi Pagelle Menù'),
  (704, '', 0, 5013, 'Documenti Passaporti', 'MATERIALE CARTACEO>Documenti Passaporti'),
  (705, '', 0, 5015, 'Ephemera', 'MATERIALE CARTACEO>Ephemera'),
  (706, '', 0, 5017, 'Giornali Manifesti Opuscoli', 'MATERIALE CARTACEO>Giornali Manifesti Opuscoli'),
  (707, '', 0, 5019, 'Lettere Vintage', 'MATERIALE CARTACEO>Lettere Vintage'),
  (708, '', 0, 5021, 'Sanità', 'MATERIALE CARTACEO>Sanità'),
  (709, '', 0, 0, 'Stampe', ''),
  (710, '', 0, 5023, 'Mappe Italiane', 'MATERIALE CARTACEO>Stampe>Mappe Italiane'),
  (711, '', 0, 5025, 'Mappe Straniere', 'MATERIALE CARTACEO>Stampe>Mappe Straniere'),
  (712, '', 0, 5027, 'Animali', 'MATERIALE CARTACEO>Stampe>Animali'),
  (713, '', 0, 5029, 'Architettura', 'MATERIALE CARTACEO>Stampe>Architettura'),
  (714, '', 0, 5031, 'Botanica', 'MATERIALE CARTACEO>Stampe>Botanica'),
  (715, '', 0, 5033, 'Decorative', 'MATERIALE CARTACEO>Stampe>Decorative'),
  (716, '', 0, 5035, 'Moda', 'MATERIALE CARTACEO>Stampe>Moda'),
  (717, '', 0, 5037, 'Religiose', 'MATERIALE CARTACEO>Stampe>Religiose'),
  (718, '', 0, 5039, 'Ritratti', 'MATERIALE CARTACEO>Stampe>Ritratti'),
  (719, '', 0, 5041, 'Scienza', 'MATERIALE CARTACEO>Stampe>Scienza'),
  (720, '', 0, 5043, 'Varie', 'MATERIALE CARTACEO>Stampe>Varie'),
  (721, '', 0, 5045, 'Tessere', 'MATERIALE CARTACEO>Stampe>Tessere')");
echo "<br />Creata tabella CAT";


// Struttura della tabella MNU
$PDO->exec("CREATE TABLE `".$_POST['pref']."mnu` (
    `bid` int(4) NOT NULL,
    `bprog` int(2) DEFAULT NULL COMMENT 'Progressivo',
    `bstat` varchar(1) DEFAULT NULL COMMENT 'A=annullato',
    `bmenu` varchar(20) DEFAULT NULL COMMENT 'Nome',
    `btipo` varchar(20) DEFAULT NULL COMMENT 'Aspetto',
    `btesto` varchar(100) DEFAULT NULL COMMENT 'Titolo',
    `bselect` int(1) DEFAULT NULL COMMENT 'Voce corrente'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
$PDO->exec("INSERT INTO `".$_POST['pref']."mnu` (`bid`, `bprog`, `bstat`, `bmenu`, `btipo`, `btesto`, `bselect`) VALUES
  (16, 57, '', 'admin', 'ul2', 'Amministrazione sito', 1),
  (17, 62, '', 'blog', 'ul2', 'Menù del sito', 0),
  (19, 67, 'A', 'red', 'ul2', 'Menù per template rosso', 0)");
  echo "<br />Creata tabella MNU";

// Struttura della tabella NAV
$PDO->exec("CREATE TABLE `".$_POST['pref']."nav` (
    `nid` int(4) NOT NULL COMMENT 'chiave unica',
    `nprog` int(3) NOT NULL COMMENT 'Progressivo',
    `nstat` varchar(1) DEFAULT NULL COMMENT 'A=annullato',
    `nmenu` varchar(20) NOT NULL COMMENT 'Nome menu',
    `nli` varchar(50) NOT NULL COMMENT 'Voce di menu',
    `ntesto` varchar(100) NOT NULL COMMENT 'Descrizione',
    `ndesc` varchar(50) DEFAULT NULL COMMENT 'Sottovoce',
    `ntarget` varchar(30) DEFAULT NULL COMMENT 'Target',
    `nselect` int(1) NOT NULL COMMENT 'Voce corrente',
    `ntipo` varchar(30) NOT NULL COMMENT 'tipo voce',
    `npag` varchar(1) NOT NULL COMMENT 'pagina voce',
    `nsotvo` varchar(30) NOT NULL COMMENT 'Comando',
    `nhead` int(1) NOT NULL COMMENT 'Header specifico',
    `ntitle` int(1) NOT NULL COMMENT 'Titolo pagina',
    `naccesso` int(1) NOT NULL COMMENT 'Liv.accesso',
    `nmetakey` varchar(50) NOT NULL COMMENT 'Meta keywords'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
$PDO->exec("INSERT INTO `".$_POST['pref']."nav` (`nid`, `nprog`, `nstat`, `nmenu`, `nli`, `ntesto`, `ndesc`, `ntarget`, `nselect`, `ntipo`, `npag`, `nsotvo`, `nhead`, `ntitle`, `naccesso`, `nmetakey`) VALUES
  (7, 123, '', 'admin', 'Backoffice', 'Voci di menu', 'Voci_menu', '', 0, 'ifr', ' ', 'gest_nav.php', 0, 0, 9, ''),
  (12, 140, '', 'admin', 'Backoffice', 'Gestione utenti', 'Utenti', '', 0, 'ifr', ' ', 'gest_ute.php', 0, 0, 9, ''),
  (19, 106, '', 'admin', 'Backoffice', 'Menu', 'Menu', '', 0, 'ifr', ' ', 'gest_mnu.php', 0, 0, 9, ''),
  (59, 250, '', 'admin', 'Utility', 'Configurazione', 'Configurazione', '', 0, 'ifr', ' ', 'gest_config.php', 0, 0, 9, ''),
  (109, 150, '', 'admin', 'Backoffice', 'Tipologie codificate', 'Tipologie', '', 0, 'ifr', ' ', 'gest_xdb.php', 0, 0, 5, ''),
  (187, 328, '', 'admin', 'Backoffice', 'Gestione template', 'Template', '', 0, 'ifr', '', 'gest_tmp.php', 0, 0, 9, ''),
  (211, 350, '', 'admin', 'E-commerce', 'Gestione articoli per valore', 'Articoli x valore', '', 1, 'ifr', 'V', 'gest_art.php', 0, 0, 5, ''),
  (234, 385, '', 'admin', 'Utility', 'Lingue per traduzioni', 'Lingue', '', 0, 'ifr', '0', 'gest_lang.php', 0, 0, 9, 'lingue'),
  (235, 390, '', 'admin', 'Backoffice', 'Gestione dei template', 'Cambio template', '', 0, 'ifr', '0', 'change_tmp.php', 0, 0, 9, 'template'),
  (260, 480, '', 'admin', 'Backoffice', 'Contatti', 'Contatti', '', 0, 'ifr', '0', 'gest_ctt.php', 0, 0, 9, ''),
  (261, 485, '', 'admin', 'Backoffice', '', 'Media', '', 0, 'ifr', '0', 'gest_media.php', 0, 0, 9, ''),
  (265, 505, '', 'admin', 'Backoffice', 'Lingue per tradizioni', 'Lingua', '', 0, 'ifr', '0', 'gest_lang.php', 0, 0, 9, ''),
  (266, 600, '', 'admin', 'Backoffice', 'Voci di menu', '', '', 0, 'ifr', ' ', '', 0, 0, 5, ''),
  (267, 700, '', 'admin', 'Utility', 'Utilità', '', '', 0, 'ifr', ' ', '', 0, 0, 9, ''),
  (268, 0, '', 'admin', 'E-commerce', 'Gestione e-commerce', '', '', 1, 'ifr', ' ', '', 0, 0, 5, ''),
  (270, 515, '', 'admin', 'Utility', 'Struttura tabelle', 'Struttura DB', '', 0, 'ifr', '0', 'struct_db.php', 0, 0, 0, ''),
  (271, 370, '', 'admin', 'Esportazione', '', '', '', 0, '', '0', '', 0, 0, 0, ''),
  (272, 360, '', 'admin', 'Importazione', '', '', '', 0, '', '0', '', 0, 0, 0, ''),
  (274, 710, '', 'admin', 'Esportazione', '', 'Esporta CSV', '', 0, 'ifr', '0', 'gest_csv_woo.php', 0, 0, 0, ''),
  (275, 715, '', 'admin', 'E-commerce', 'Categorie di prodotto', 'Categorie', '', 1, 'ifr', '0', 'gest_cat.php', 0, 0, 5, ''),
  (276, 349, '', 'admin', 'E-commerce', 'Articoli x progressivo', 'Articoli x progr.', '', 1, 'ifr', 'P', 'gest_art.php', 0, 0, 0, ''),
  (277, 710, '', 'admin', 'Importazione', 'Importa dati da gestire con WOO', 'Importa Articoli', '', 0, 'ifr', '0', 'gest_imp_ebay.php', 0, 0, 0, ''),
  (278, 717, '', 'admin', 'E-commerce', 'Cancella articoli fra progressivi', 'Cancella articoli', '', 1, 'ifr', '0', 'gest_canc_art.php', 0, 0, 0, ''),
  (279, 351, '', 'admin', 'E-commerce', 'Elenca articoli per codice', 'Articoli per codice', '', 1, 'ifr', 'C', 'gest_art.php', 0, 0, 0, '')");
  echo "<br />Creata tabella NAV";

// Struttura della tabella TMP
$PDO->exec("CREATE TABLE `".$_POST['pref']."tmp` (
    `tid` int(4) NOT NULL,
    `tprog` int(2) NOT NULL COMMENT 'Progressivo',
    `tstat` varchar(1) NOT NULL COMMENT 'Stato record',
    `tcod` varchar(20) NOT NULL COMMENT 'codice',
    `tsel` varchar(1) NOT NULL COMMENT '* = attivato',
    `ttipo` varchar(5) NOT NULL COMMENT 'Tipo',
    `ttdesc` varchar(50) NOT NULL COMMENT 'Nome template',
    `tfolder` varchar(50) NOT NULL COMMENT 'Percorso template',
    `tdesc` varchar(50) NOT NULL COMMENT 'Descrizione',
    `tmenu` varchar(20) NOT NULL COMMENT 'Menù base',
    `tlang` varchar(5) NOT NULL COMMENT 'Lingua',
    `tcolor` varchar(20) NOT NULL COMMENT 'Colore',
    `tslidebutt` int(1) NOT NULL COMMENT 'Bottoni navigazione',
    `tslidetime` int(6) NOT NULL COMMENT 'Tempo permanenza img',
    `tportitle` int(1) NOT NULL COMMENT 'titolo portfolio',
    `tportit` varchar(50) NOT NULL COMMENT 'titolo',
    `tportext` tinytext NOT NULL COMMENT 'testo',
    `tgliftitle` int(1) NOT NULL COMMENT 'glifi-titolo',
    `tgliftit` varchar(50) NOT NULL COMMENT 'titolo',
    `tgliftext` tinytext NOT NULL COMMENT 'glifi-testo',
    `tgliforma` varchar(20) NOT NULL COMMENT 'forma',
    `tglireverse` int(1) NOT NULL COMMENT 'In reverse',
    `tpromotitle` int(1) NOT NULL COMMENT 'titolo promo s/n',
    `tpromotit` varchar(50) NOT NULL COMMENT 'titolo promo',
    `tpromotext` tinytext NOT NULL COMMENT 'testo promo',
    `taccotitle` int(1) NOT NULL COMMENT 's-n titolo',
    `taccotit` varchar(50) NOT NULL COMMENT 'titolo',
    `taccotext` tinytext NOT NULL COMMENT 'testo',
    `tcttitle` int(1) NOT NULL COMMENT 's-n titolo',
    `tcttit` varchar(50) NOT NULL COMMENT 'titolo',
    `tcttext` tinytext NOT NULL COMMENT 'testo',
    `ttabtitle` int(1) NOT NULL COMMENT 'titolo s-n',
    `ttabtit` varchar(50) NOT NULL COMMENT 'titolo',
    `ttabtext` tinytext NOT NULL COMMENT 'testo',
    `tsldtitle` int(1) NOT NULL COMMENT 'titolo s-n',
    `tsldtit` varchar(50) NOT NULL COMMENT 'titolo',
    `tsldtext` tinytext NOT NULL COMMENT 'testo',
    `teditor` varchar(20) NOT NULL COMMENT 'editore testi',
    `tpri_color` varchar(10) NOT NULL,
    `tsec_color` varchar(10) NOT NULL,
    `tbg_color` varchar(10) NOT NULL,
    `tbutton_color` varchar(10) NOT NULL,
    `tx_pri_color` varchar(10) NOT NULL,
    `tx_sec_color` varchar(10) NOT NULL,
    `tx_color` varchar(10) NOT NULL,
    `tx_button_color` varchar(10) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
$PDO->exec("INSERT INTO `".$_POST['pref']."tmp` (`tid`, `tprog`, `tstat`, `tcod`, `tsel`, `ttipo`, `ttdesc`, `tfolder`, `tdesc`, `tmenu`, `tlang`, `tcolor`, `tslidebutt`, `tslidetime`, `tportitle`, `tportit`, `tportext`, `tgliftitle`, `tgliftit`, `tgliftext`, `tgliforma`, `tglireverse`, `tpromotitle`, `tpromotit`, `tpromotext`, `taccotitle`, `taccotit`, `taccotext`, `tcttitle`, `tcttit`, `tcttext`, `ttabtitle`, `ttabtit`, `ttabtext`, `tsldtitle`, `tsldtit`, `tsldtext`, `teditor`, `tpri_color`, `tsec_color`, `tbg_color`, `tbutton_color`, `tx_pri_color`, `tx_sec_color`, `tx_color`, `tx_button_color`) VALUES
  (6, 60, '', 'blog', '*', 'sito', 'Template Blog', 'templates/blog/', 'Template per FBOT', 'blog', 'it', 'danger', 1, 15000, 1, 'P O R T F O L I O', 'Esempi di siti realizzati da FB.\r\n', 1, 'Servizi', 'Servizi offerti dalla societÃ .\r\n', '', 0, 1, 'PROMO', 'Sezione delle promozioni', 0, 'Accordion', 'Testo per accordion', 1, 'Contatti', 'Per contattarmi compila il form sottostante.', 1, 'Articoli in tab', 'Gli articoli appartenenti alla categoria scelta sono selezionabili tramite tab.\r\n', 1, 'Articoli in slide', 'Gli articoli sono presentati con slide a tempo.\r\n', '', '#7d7814', '#afc236', '#dbb29a', '#b37650', '#fbf9f9', '#000000', '#000000', '#ffffff'),
  (10, 70, '', 'admin', '*', 'admin', 'Template Amministratore', 'templates/admin/', 'Template amministratore', 'admin', 'it', 'warning', 0, 0, 0, '', '', 0, '', '', '', 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', '', '#a7eca9', '#eae206', '#edd4d9', '#fafaeb', '#000000', '#000000', '#000000', '#816a6a'),
  (11, 75, '', 'red', ' ', 'sito', 'Template Rosso', 'templates/red/', 'Template rosso', 'admin', 'it', 'info', 0, 0, 0, '', '', 0, '', '', 'circle', 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '')");
  echo "<br />Creata tabella TMP";

// Struttura della tabella UTE
$PDO->exec("CREATE TABLE `".$_POST['pref']."ute` (
    `uid` int(2) NOT NULL,
    `ustat` varchar(1) NOT NULL COMMENT 'Stato record',
    `uprog` int(2) NOT NULL DEFAULT 0 COMMENT 'Progressivo',
    `username` varchar(20) DEFAULT NULL COMMENT 'Utente',
    `upassword` varchar(50) DEFAULT NULL COMMENT 'Password',
    `uaccesso` int(1) NOT NULL DEFAULT 0 COMMENT 'Liv. accesso',
    `uiscritto` int(1) NOT NULL COMMENT 'Nr.iscritto'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
$PDO->exec("INSERT INTO `".$_POST['pref']."ute` (`uid`, `ustat`, `uprog`, `username`, `upassword`, `uaccesso`, `uiscritto`) VALUES
  (13, '', 0, 'firmo', '68d11e563c6a399d2d457023a4e3a86d', 5, 999),
  (14, '', 6, 'fbstd', '5194fbbbb677c47c1c7373ee742db86c', 9, 5)");
  echo "<br />Creata tabella UTE";

// Struttura della tabella XDB
$PDO->exec("CREATE TABLE `".$_POST['pref']."xdb` (
    `xid` int(3) NOT NULL COMMENT 'chiave',
    `xstat` varchar(1) NOT NULL COMMENT 'stato record',
    `xprog` int(3) NOT NULL COMMENT 'progressivo',
    `xtipo` varchar(5) NOT NULL COMMENT 'tipo',
    `xcod` tinytext DEFAULT NULL COMMENT 'codice',
    `xdes` text NOT NULL COMMENT 'descrizione'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
$PDO->exec("INSERT INTO `".$_POST['pref']."xdb` (`xid`, `xstat`, `xprog`, `xtipo`, `xcod`, `xdes`) VALUES
  (7, '', 35, 'menu', 'txt', 'menu nel testo'),
  (9, '', 40, 'menu', 'uli', 'tab '),
  (10, '', 45, 'menu', 'ul1', 'tab una immagine'),
  (11, '', 50, 'menu', 'ul2', 'tab 2 immagini'),
  (12, '', 55, 'menu', 'lnk', 'link'),
  (13, '', 60, 'menu', 'fld', 'fieldset'),
  (20, '', 95, 'voce', 'art', 'voce tipo articolo'),
  (21, '', 100, 'voce', 'cap', 'voce tipo capitolo'),
  (22, '', 105, 'voce', 'arg', 'voce tipo argomento'),
  (23, '', 110, 'voce', 'vid', 'voce tipo video YouTube'),
  (24, '', 115, 'voce', 'gal', 'voce tipo gallery di Picasa'),
  (25, '', 120, 'voce', 'lnk', 'voce tipo link interno'),
  (32, '', 93, 'voce', '', 'Nessun tipo voce'),
  (33, '', 140, 'trg', '_blank', 'Nuova finestra'),
  (34, '', 145, 'trg', '', 'Nessun tipo trg'),
  (35, '', 150, 'trg', '_parent', 'Nella stessa finestra'),
  (36, '', 155, 'trg', '_scratch', 'Nuova finnestra'),
  (37, '', 160, 'trg', '_self', 'Stesso frame'),
  (38, '', 165, 'trg', '_top', 'Ricopre la stessa finestra'),
  (41, '', 180, 'voce', 'ifr', 'voce tipo PHP/HTML in iframe'),
  (42, '', 185, 'tab', 'n_arg', 'Argomenti'),
  (43, '', 190, 'tab', 'n_art', 'Articoli'),
  (44, '', 195, 'tab', 'n_cap', 'Capitoli'),
  (45, '', 200, 'tab', 'n_gal', 'Galleria fotografica'),
  (46, '', 205, 'tab', 'n_mnu', 'Menu'),
  (47, '', 210, 'tab', 'n_mod', 'Moduli'),
  (48, '', 215, 'tab', 'n_nav', 'Navigatore semplice'),
  (50, '', 225, 'tab', 'n_tmp', 'Templates'),
  (51, '', 230, 'tab', 'n_ute', 'Utenti'),
  (53, '', 236, 'tab', 'n_xdb', 'Tipologie'),
  (54, '', 126, 'voce', 'htm', 'voce tipo HTML custom'),
  (94, '', 379, 'stato', '', 'Attivo'),
  (95, '', 384, 'stato', 'A', 'Sospeso'),
  (865, '', 609, 'msg', '0', 'Operazione abortita per errori'),
  (866, '', 614, 'msg', ' ', ' '),
  (867, '', 619, 'msg', '1', 'Operazione invalida'),
  (868, '', 624, 'msg', '4', 'Effettuare una scelta'),
  (869, '', 629, 'msg', '5', 'Pagamento giÃ  effettuato'),
  (870, '', 634, 'msg', '2', 'Operazione annullata dall\' utente'),
  (871, '', 639, 'msg', '53', 'Record cancellato'),
  (872, '', 644, 'msg', '54', 'MSG_RECORD_ADD'),
  (873, '', 649, 'msg', '55', 'Record modificato'),
  (874, '', 654, 'msg', '56', 'Immagine cancellata'),
  (875, '', 659, 'msg', '57', 'Immagine caricata'),
  (876, '', 664, 'msg', '58', 'Immagine scaricata'),
  (877, '', 669, 'msg', '59', 'Record archiviato'),
  (878, '', 674, 'msg', '60', 'Record ripristinato'),
  (879, '', 679, 'msg', '101', 'Nota'),
  (880, '', 684, 'msg', '151', 'Informazione'),
  (882, '', 694, 'lin', 'it', 'Italiano'),
  (883, '', 699, 'lin', 'fr', 'Francese'),
  (884, '', 704, 'lin', 'en', 'Inglese'),
  (885, '', 709, 'ttmp', 'admin', 'Template amministratore'),
  (886, '', 714, 'ttmp', 'sito', 'Template del sito'),
  (887, '', 719, 's-n', '1', 'SI'),
  (888, '', 724, 's-n', '0', 'NO'),
  (889, '', 729, 'color', 'danger', 'Rosso'),
  (890, '', 734, 'color', 'warning', 'Ocra'),
  (891, '', 739, 'color', 'info', 'Azzurro'),
  (892, '', 744, 'color', 'default', 'Bianco'),
  (893, '', 749, 'color', 'primary', 'Blue'),
  (894, '', 754, 'color', 'basic', 'Grigio'),
  (895, '', 759, 'forma', 'square', 'Quadrata'),
  (896, '', 764, 'forma', 'circle', 'Circolare'),
  (897, '', 769, 'forma', 'square-arr', 'Quadrata arrotondata'),
  (898, '', 774, 'acc', '0', 'Ospite'),
  (899, '', 779, 'acc', '5', 'Utente'),
  (900, '', 784, 'acc', '9', 'Amministratore'),
  (943, '', 529, 'tipo', 'header', 'Testata di sito con navigatore'),
  (944, '', 524, 'tipo', 'arttab', 'Articoli in tab orizzontale'),
  (945, '', 519, 'tipo', 'portfolio', 'Portfolio'),
  (946, '', 514, 'tipo', 'slide', 'Slide di immagini'),
  (947, '', 544, 'tipo', ' ', ' '),
  (948, '', 539, 'tipo', 'artimg', 'Articolo con immagine a dx o sx'),
  (949, 'A', 534, 'tipo', 'artslide', 'Articoli in slide'),
  (950, '', 724, 'tipo', 'contatti', 'Contatti del sito'),
  (953, '', 530, 'tipo', 'article', 'Articoli singoli'),
  (954, '', 659, 'tipo', 'glyph', 'Glifi'),
  (955, '', 664, 'tipo', 'footer', 'Footer di pagina'),
  (956, '', 959, 'tipo', 'promo', 'Modulo promo'),
  (957, '', 964, 'imgvd', 'video', 'Video YouTube'),
  (958, '', 969, 'imgvd', 'img', 'Immagine'),
  (974, '', 494, 'col', 'col-md-6 col-sm-12', 'Colonna valore 6-12 (50-100%)'),
  (975, '', 499, 'col', 'col-md-4', 'Colonna valore 4 (33%)'),
  (976, '', 504, 'col', 'col-md-3 col-sm-6', 'Colonna valore 3-6 (25-50%)'),
  (977, '', 509, 'col', 'col-md-8', 'Colonna valore 8 (66%)'),
  (978, '', 549, 'col', 'col-md-12', 'Colonna valore 12 (100%)'),
  (979, '', 554, 'col', 'col-md-1', 'Colonna valore 1 (8,33%)'),
  (980, '', 559, 'col', 'col-md-3', 'Colonna valore 3 (25%)'),
  (981, '', 564, 'col', 'col-md-6', 'Colonna valore 6 (50%)'),
  (982, '', 569, 'col', 'col-md-5', 'Colonna valore 5 (41%)'),
  (983, '', 574, 'col', 'col-md-7', 'Colonna valore 7 (58%)'),
  (984, '', 684, 'col', 'col-md-2', 'Colonna valore 2 (16,66%)'),
  (985, '', 689, 'col', 'col-md-9', 'Colonna valore 9 (75%)'),
  (986, '', 694, 'col', 'col-md-10', 'Colonna valore 10 (83,33%)'),
  (987, '', 699, 'col', 'col-md-11', 'Colonna valore 11 (91,66%)'),
  (988, '', 964, 'col', '', 'Proporzionale'),
  (989, '', 974, 'posim', 'sx', 'Immagine a sinistra'),
  (990, '', 979, 'posim', 'dx', 'Immagine a destra'),
  (993, '', 994, 'tifoo', 'img', 'Immagine'),
  (994, '', 999, 'tifoo', 'cnt', 'Contatto'),
  (995, '', 1004, 'tictt', 'u', 'Utente'),
  (996, '', 1009, 'tictt', 'o', 'Ospite'),
  (997, '', 1014, 'tictt', 'c', 'Contatto'),
  (998, '', 594, 'dim', 'fa-lg', 'Glifo 1em'),
  (999, '', 599, 'dim', 'fa-2x', 'Glifo 2em'),
  (1000, '', 604, 'dim', 'fa-3x', 'Glifo 3em'),
  (1001, '', 609, 'dim', 'fa-4x', 'Glifo 4em'),
  (1002, '', 614, 'dim', 'fa-5x', 'Glifo 5em'),
  (1004, '', 1019, 'tipo', 'artacc', 'Articoli in accordion'),
  (1005, '', 1024, 'col', 'fb-col4', 'griglia 4 colonne'),
  (1006, '', 1029, 'tedit', 'tinymce', 'Editor Tinymce'),
  (1007, '', 1034, 'tedit', 'ckeditor', 'Editor CKEditor'),
  (1008, '', 1039, 'tipo', 'artcol', 'Articoli in colonna'),
  (1009, '', 1044, 'pathi', '../templates/blog/images/', 'Template blog'),
  (1010, '', 1049, 'pathi', '../templates/blog/images/logo/', 'Template blog/logo'),
  (1011, '', 1054, 'pathi', '../templates/red/images/', 'Template red'),
  (1012, '', 1059, 'pathi', '../templates/red/images/logo/', 'Template red/logo'),
  (1013, '', 1064, 'pathi', 'images/archivi/', 'Admin archivi'),
  (1014, '', 1069, 'pathi', 'images/bottoni/', 'Admin bottoni'),
  (1015, '', 1074, 'pathi', 'images/logo/', 'Admin logo'),
  (1016, '', 1079, 'pathi', '../images/', 'Sito immagini'),
  (1017, '', 556, 'col', 'f-dim1', 'Tutte uguali'),
  (1018, '', 558, 'col', 'f-dim2', 'Doppia'),
  (1019, '', 560, 'col', 'f-dim3', 'Tripla'),
  (1020, '', 1084, 'link', '#slider', 'Slider'),
  (1021, '', 1089, 'link', '#promo', 'Promo'),
  (1022, '', 1094, 'link', '#artimg', 'Articoli con immagine'),
  (1023, '', 1099, 'link', '#portfolio', 'Portfolio'),
  (1024, '', 1104, 'link', '#article', 'Articoli'),
  (1025, '', 1109, 'link', '#arttab', 'Articoli TABS'),
  (1026, '', 1114, 'link', '#artacc', 'Accordion'),
  (1027, '', 1119, 'link', '#glyph', 'Glifi'),
  (1028, '', 1124, 'link', '#contatti', 'Contatti'),
  (1029, '', 1129, 'link', 'https://colnect.com/it/stamps/countries', 'HTTP Colnect'),
  (1030, '', 1134, 'link', 'http://fbsoftware.altervista.org/joomla/', 'HTTP FBOT'),
  (1031, '', 1139, 'pathi', 'images/', 'Admin immagini'),
  (1032, '', 1144, 'categ', '', '-- scegli la categoria --'),
  (1033, '', 1149, 'categ', 'cart', 'Cartolina'),
  (1034, '', 1154, 'categ', 'fram', 'Frammento'),
  (1035, '', 1159, 'categ', 'bollo', 'Francobollo'),
  (1036, '', 674, 'msg', '62', 'File CSV creato!'),
  (1037, '', 0, '', '', ''),
  (1038, '', 0, '', '', ''),
  (1039, '', 0, '', '', '')");
  echo "<br />Creata tabella XDB";

// Indici per le tabelle scaricate
// ===============================
$PDO->exec("ALTER TABLE `".$_POST['pref']."art`
    ADD PRIMARY KEY (`aid`)");

$PDO->exec("ALTER TABLE `".$_POST['pref']."cat`
    ADD PRIMARY KEY (`cid`)");

$PDO->exec("ALTER TABLE `".$_POST['pref']."mnu`
    ADD PRIMARY KEY (`bid`)");

$PDO->exec("ALTER TABLE `".$_POST['pref']."nav`
    ADD PRIMARY KEY (`nid`)");

$PDO->exec("ALTER TABLE `".$_POST['pref']."tmp`
    ADD PRIMARY KEY (`tid`)");

$PDO->exec("ALTER TABLE `".$_POST['pref']."ute`
    ADD PRIMARY KEY (`uid`)");

$PDO->exec("ALTER TABLE `".$_POST['pref']."xdb`
    ADD PRIMARY KEY (`xid`)");

// AUTO_INCREMENT per le tabelle
// =============================
$PDO->exec("ALTER TABLE `".$_POST['pref']."art`
    MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID'");

$PDO->exec("ALTER TABLE `".$_POST['pref']."cat`
    MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=734");

$PDO->exec("ALTER TABLE `".$_POST['pref']."mnu`
    MODIFY `bid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20");

$PDO->exec("ALTER TABLE `".$_POST['pref']."nav`
    MODIFY `nid` int(4) NOT NULL AUTO_INCREMENT COMMENT 'chiave unica', AUTO_INCREMENT=280");

$PDO->exec("ALTER TABLE `".$_POST['pref']."tmp`
    MODIFY `tid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12");

$PDO->exec("ALTER TABLE `".$_POST['pref']."ute`
    MODIFY `uid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15");

$PDO->exec("ALTER TABLE `".$_POST['pref']."xdb`
    MODIFY `xid` int(3) NOT NULL AUTO_INCREMENT COMMENT 'chiave', AUTO_INCREMENT=1040");
$PDO->exec("COMMIT");

// chiusura database
$PDO = NULL;
echo "<br />Tutte le tabelle e i relativi indici sono stati creati" ;
?>
  </body>
</html>
