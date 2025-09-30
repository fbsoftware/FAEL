<?php
echo "<!DOCTYPE <html></head>";
//-- Bootstrap -->
echo "<link  rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
     <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
     <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
     <link  rel='stylesheet' href='css/stili-custom.css' type='text/css' media='screen'>"; 
echo "
     <link rel='stylesheet' href='http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css' />
     <script src='http://code.jquery.com/jquery-1.12.4.js'></script>
     <script src='http://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
     <script src='js/FBbase.js'></script>
       <link rel='stylesheet' type='text/css' href='css/nav2.css'>
      <link rel='stylesheet' type='text/css' href='css/style.css'>
      <link rel='stylesheet' type='text/css' href='css/stili-custom.css'>";
     
echo " ";
echo "<head>";
include_once('classi/field.php');
     $f4 = new field(date("d-m-Y"),'edata',11,'Data');              
          $f4->field_d1();
?>