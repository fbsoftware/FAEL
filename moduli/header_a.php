<?php
echo "<header>"; 
echo "<img class='marchio' src='images/logo/logo.png' alt='logo.png' title='logo'>";
echo " <img class='marchio' src='images/".$_COOKIE['admin'].".png' alt='".$_COOKIE['admin'].".png' title='".$_COOKIE['admin']."' >";
echo "<p>&nbsp;&nbsp;Amministrazione&nbsp;-&nbsp;".DB::$page_title." 
          <span class='right little'>Versione ".DB::$livello.".".DB::$rilascio.".".DB::$modifica."</span></p>";
echo "</header>";
?>                             
   
