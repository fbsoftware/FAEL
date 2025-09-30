<?php
if(isset($_POST['submit']))
{
   $gruppoVoci = $_POST['lista'];
   $singolaVoce="";
   foreach($_POST['lista'] as $value)
   {
      echo "<br>".$value;
   }
   print_r($_POST['lista']);
}
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>select multipla</title>
  </head>
  <body>
    <form method="post">
    <label for="lista[]">Seleziona le tue città preferite</label><br>
       <select name="lista[]" multiple>
         <option value="1-Roma">Roma</option>
         <option value="2-Milano">Milano</option>
         <option value="3-Torino">Torino</option>
         <option value="4">Napoli</option>
         <option value="5-Firenze">Firenze</option>
       </select><br>
      <input type="submit" name="submit" value="invia">
      <input type="submit" name="reset" value="resetta">
    </form>

  </body>
</html>
