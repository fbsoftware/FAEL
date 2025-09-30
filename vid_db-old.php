<?php   session_start();
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
=============================================================================
   *  visualizza struttura tabella database
=============================================================================  */
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('Struttura DB',$_SESSION['ambito']);
     $head->getBootHead(); 
echo "</head>";  

print_r($_POST);//debug
$azione = $_POST['submit'];
$table  = $_POST['table'];
   
      //   bottoni gestione
 //    $param  = array( ,'config','widget.php','ritorno');  
 //    $btx    = new bt_param($param);     $btx->show_bottoni($param);
$param  = array('ritorno','chiudi');    
$btx    = new bottoni_str_par('Struttura della tabella : <strong>'.$table.'</strong>','config','index.php?urla=widget.php&pag=',$param);  
     $btx->btn();
	 
switch ($azione) 
     {
            case 'chiudi':
            $loc = "location:index.php?urla=widget.php&pag=";
                 //header($loc);                          
            break;
            case 'ritorno':
             $loc = "location:index.php?".$_SESSION['location']."";
                 // header($loc);
            break;
            
     default:
/*include_once 'classi/DB.php';   
$db1 = new DB('sito');       $db1->openDB();  
$db1 = new DBY();
$db1->connect();*/
echo "<br>tabella=".$table."<br>"; //debug
//if (isset($table))
     {
 //    echo '<h3>Tabella : '.$table.'</h3>';
 echo "SHOW FULL COLUMNS FROM ".$table." ";
echo $result2 = mysql_query("SHOW FULL COLUMNS FROM ".$table." "); // or die('Non trovata tabella: '.$table);
if(mysql_num_rows($result2))
          {
          echo '<table cellpadding="0" cellspacing="0">';
          echo '<tr><th>Campo</th><th>Tipo</th><th>Key</th><th>Default<th>Extra</th><th>Descrizione</th></tr>';
          while($row2 = mysql_fetch_row($result2))
               {
               echo '<tr>';
               echo '<td class="fc">',$row2[0],'</td>';
               echo '<td>',$row2[1],'</td>';  // nome campo
               echo '<td>',$row2[3],'</td>';  // tipo campo
               echo '<td>',$row2[4],'</td>';  // key si-no
               echo '<td>',$row2[6],'</td>';  // extra
               echo '<td>',$row2[8],'</td>';  // descrizione
               echo '</tr>';               
               }

          echo '</table>';
          }
          break;

     }
}
?>