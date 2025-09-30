<?php
 include'funzioni/utility.php';
$d=new decimali($imp);
$a=1300.01;
$d=new decimali($a);
echo $d->getDecimali(); 
echo "<br />alfa=".$alfa = (string) $a;
$dec=substr($alfa,-2,2); 
echo "<br />decimali=/".$dec;  
?>