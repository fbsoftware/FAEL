<?php
/**=============================================================================== 
  Calcola in valore del progressivo per inserimento record nel database
  Metodi:       
  numera()       
  Ritorna : progressivo per inserimento e lo memorizza sul file
/**  -----------------------------------------------------------
  Esempio: $num = new DB_bolle(anno);
			$max = $num->numera();	($max=nuovo n° incrementato di 1)
==================================================================================
	Dal 2023 il numeratore sarà unico e per determinare il n° di bolletta
	si leggerà la tipologia 'bolle' + anno per reperire l'ultimo n° assegnato.
============================================================================= */
class DB_bolle          extends DB

{       public $anno ='';
// variabili interne
        public $max     = 0;  
  
    public function __construct($anno)       
           { 
           $this->anno = $anno;
		   $this->max = $max;       // campo del progressivo di bolletta
           }  
		   
/**==================================================================
 19/01/2023	calcola il nuovo n° di bolla e lo memorizza
==================================================================*/
	public function numera() {

	          $con = "mysql:host=".self::$host.";dbname=".self::$db.""; 
              $PDO = new PDO($con,self::$user,self::$pw);
              $PDO->beginTransaction(); 
                                        
             $sql = "   SELECT * 
                         FROM ".self::$pref.xdb."
						 WHERE xtipo = 'bolle' 
						 AND   xcod  = ".$this->anno." ";
			  foreach($PDO->query($sql) as $row)                      
                    { 
					echo "<br />xdes =".$row['xdes'];//debug
                    $this->max  =($row['xdes'] + 1); 
                    }
                    if ($this->max == 0) {$this->max = 1;}
			   
			   // backup nuovo valore di bolla su "xdb"
	          $con = "mysql:host=".self::$host.";dbname=".self::$db.""; 
              $PDO = new PDO($con,self::$user,self::$pw);
              $PDO->beginTransaction(); 
 echo			    $sql2 = "UPDATE `".DB::$pref."xdb`
							SET xdes = '".$this->max."'
							WHERE xtipo = 'bolle' 
							AND   xcod  = '".$this->anno."' 
							 ";
						$PDO->exec($sql2);    
						$PDO->commit();
			return $this->max;

}

}
?>