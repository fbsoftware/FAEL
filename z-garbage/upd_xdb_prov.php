<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
=============================================================================  
   * accoda province a tbl_xdb
=============================================================================  */
$sql      = "SELECT * FROM tbl_servizio_provincia";
$res      = mysql_query($sql);
           if (!$res) die('upd_prov.php:'.mysql_error());
           while($row = mysql_fetch_array($res))
           {
           $id           =$row['id'];
           $sigla        =$row['sigla'];
           $provincia    =$row['provincia'];

               $prog=(1+$prog);   
               mysql_query("INSERT INTO `tbl_xdb` 
                         (xid,xstat,xprog,xtipo,xcod,xdes) 
                         VALUES (NULL,' ','$prog','pr','$sigla','$provincia')");   
           }
echo      "<br />accodato province a: tbl_xdb";
?>