<?php
$str= 'varchar(8)' ;
$x1=strpos($str,'(');
if ($x1)
   {	  
   $x2=strpos($str,')');       
   $lun=(($x2-$x1)-1);
   $start=($x1+1);                   
   echo $num=substr($str,$start,$lun);
   }
else
   echo $num=-1;
?>
