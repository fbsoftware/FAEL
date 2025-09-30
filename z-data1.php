<?php
include_once 'include_gest.php';
echo "<!DOCTYPE html><html><head>";                    
echo "<title>Titolo</title>
     <meta name='viewport' content='width=device-width, initial-scale=1'>";
    
//-- Bootstrap -->
echo "<link  rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
     <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
     <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
     <link  rel='stylesheet' href='css/stili-custom.css' type='text/css' media='screen'>";  
//-- Jquery -->
echo "<link  rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>";
//-- jQuery style for Tooltips -->
echo "<link  rel='stylesheet' href='https://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css'>     
     <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
     <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>";  
//-- personali -->
include 'include_head.php';      
echo "</head>";
     $f4 = new input(array(date("d-m-Y"),'vdata',11,'Data','Data del versamento','d1'));              
          $f4->field();

?>