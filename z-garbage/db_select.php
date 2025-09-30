<html>
<head>
<title>MySQL Database Structure Viewer</title>
<style type="text/css">
table      {  border-right:1px solid #ccc; 
              border-bottom:1px solid #ccc; 
              border-collapse:collapse; 
              border-spacing:0;}
table  th  {  background:#eee; 
              padding:5px; 
              border-left:1px solid #ccc; 
              border-top:1px solid #ccc; }
table  td  {  padding:5px; 
              border-left:1px solid #ccc; 
              border-top:1px solid #ccc; }
</style>
</head>
<body>
<?php
include_once('classi/DB.php');

$db2 = new DB('sito');   $db2->config();  $db2->openDB();
/* Mostra struttura tabelle del database */
$result = mysql_query('SHOW TABLES');
while($tableName = mysql_fetch_row($result)) 
{
$table = $tableName[0];
// $table = 'n_vid';
	echo '<h3>',$table,'</h3>';
	$result2 = mysql_query('SHOW FULL COLUMNS FROM '.$table) or die('Manca tabella '.$table);
	if(mysql_num_rows($result2)) 
     {
		echo '<table>';
		echo '<tr>
          <th>Campo</th>
          <th>Lunghezza</th>
          <th>Collation</th>
          <th>Nullo</th>
          <th>Attrib.</th>
          <th>Predefinito</th>
          <th>Extra</th>
          <th>Azioni</th>
          <th>Descrizione</th>
          </tr>';
		while($row2 = mysql_fetch_row($result2)) 
          {
			echo '<tr>';
			//foreach($row2 as $key=>$value) 
               {
		//		echo '<td>',$value,'</td>';
				echo '<td>',$row2[0],'</td>';
				echo '<td>',$row2[1],'</td>';
        echo '<td>',$row2[2],'</td>';
        echo '<td>',$row2[3],'</td>';
        echo '<td>',$row2[4],'</td>';
        echo '<td>',$row2[5],'</td>';
        echo '<td>',$row2[6],'</td>';
        echo '<td>',$row2[7],'</td>';
        echo '<td>',$row2[8],'</td>';				
			}
			echo '</tr>';
		}
		echo '</table><br >';
	}
}
?>
</body>
</html>
