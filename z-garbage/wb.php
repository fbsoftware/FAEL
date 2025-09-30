<?php   session_start();
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
=============================================================================
   *  WORKBENCH MYSQL
=============================================================================  */

include_once('classi/DB.php');
$db1      = new DB('sito');  $db1->openDB();  DB::config();

$dbhost = DB::$a;
$dbuser = DB::$b;
$dbname = DB::$c;
$dbpass = DB::$p;
try  {
     $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
     } catch(PDOException $e) { echo $e->getMessage();  }

    $result2 = mysql_query("SELECT * FROM `".DB::$pref."isc`
                 WHERE stato = 'I'
                 ORDER BY cognome,nome ");
	if(mysql_num_rows($result2))        
          {                               
            echo '<table cellpadding="0" cellspacing="0"  border="1">';           
		echo '<tr><th>Campo</th><th>Tipo</th><th>Key</th><th>Default<th>Extra</th><th>Descrizione</th></tr>';           
		while($row2 = mysql_fetch_row($result2))                                                                        
               {                           
			echo '<tr>';                
	           echo '<td class="fc">',$row2[0],'</td>';               
               echo '<td>',$row2[1],'</td>';
               echo '<td>',$row2[3],'</td>';
               echo '<td>',$row2[4],'</td>';
               echo '<td>',$row2[6],'</td>';
               echo '<td>',$row2[8],'</td>';
			}                           
			echo '</tr>';               
         }
  
		echo '</table><br />';           
                   
    ?>
