<?php
session_start();
ob_start();
include('init_admin.php');
include('../connectDB.php');
$si_errori=0;
$azione =$_POST['submit'];
//print_r($_POST);//debug

switch ($azione)
{
// chiudi -----------------------------------------------------
case 'chiudi':
$_SESSION['esito'] = 2;
               $loc = "location:admin.php";
               header($loc);
               break;
// upload -----------------------------------------------------
default:
$filename = "../CSV/articoli.csv";
if  (($handler = fopen($filename, 'r')) !== false )
{
// cerca il 1° progressivo
      $arg = new DB_ins('art','aprog');
          $prog =  $arg->insert();

while (($data = fgetcsv($handler,0,";")) !== false )
	{  // omette testata
    if ($data[2] === 'Categorie')
    {
      continue;
    }
/**
echo     $sql = "INSERT INTO `".DB::$pref."art` (`aflag`,`astat`,`acod`,`atit`,`ades`,`aprez`,`acat`, `aimg`, `aprog`)
      					VALUES (' ',' ','".$data[1]."', '".htmlentities($data[0]."',
                '".htmlentities($data[4], ENT_QUOTES, 'UTF-8')."',' ".number_format($data[3],2,'.','')."','".$data[2]."','
                   ".$data[5]."',' ".$prog."')";
                   */
                   echo     $sql = "INSERT INTO `".DB::$pref."art` (`aflag`,`astat`,`acod`,`atit`,`ades`,`aprez`,`acat`, `aimg`, `aprog`)
                         					VALUES (' ',' ','".addslashes($data[1])."', '".$data[0]."',
                                   '".addslashes($data[4])."',' ".number_format($data[3],2,'.','')."','".$data[2]."','
                                      ".$data[5]."',' ".$prog."')";

				   $prog++;
                $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
                $PDO = new PDO($con,DB::$user,DB::$pw);
                $PDO->beginTransaction();
                $PDO->exec($sql);
                $PDO->commit();
    }
}
}
fclose($handler);
$_SESSION['esito'] = 63;
 $loc = "location:admin.php?forma=Importazione&sub=Importa%20articoli&content=ifr&urla=gest_imp_art.php&pag=0";
if ($si_errori === 0) {
  header($loc);
}

ob_end_flush();
?>
