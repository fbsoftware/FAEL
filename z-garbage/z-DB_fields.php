<?php
/**
 * @class:      DB-fields
 *
 * @description:
 *
 * @author Fausto Bresciani <fbsoftware@libero.it>
 * @version 0.1
 */

class DB_fields
{ // BEGIN class DB-fields

     // variabili
     public $tabella = '';

// costruttore
  public function __construct($tabella)
     {
     $this->tabella = $tabella ;
     }
     /************************************************
      * @method:   getFields()
      * @description:  ricava le variabili di tuttii campi della tabella.
      * **********************************************/
       public function getFields()
          {
          $db1 = new DB('sito');       $db1->openDB();  
          $sql = "SHOW FULL COLUMNS FROM ".DB::$pref.$this->tabella."";
          $res = mysql_query($sql);
          if(mysql_num_rows($res))
               {    echo "<?php";
               while($row2 = mysql_fetch_row($res))
                    { 
                    $r = $row2[0];
                    echo  "<br />\$".$r." = \$row['".$r."']";
                    }    
               }
          }     // END class DB-fields 
}   
?>
