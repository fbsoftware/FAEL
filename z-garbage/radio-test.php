<?php
include_once('classi/sn.php');


echo @$rstat = $_POST['rstat'];
echo "<form action='radio-write.php' method='post'>" ;
$s2 = new sn($rstat,'rstat','Mostra il titolo');  $s2->show(); echo"write_sino<br >";
echo "<button type='submit' name='submit' value='Conferma'>Conferma</button>";
echo "</form>";
?>
