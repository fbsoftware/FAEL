<?php  
include 'classi/FB.class.php';
echo $in =  'T r E';
echo "<br />";
$h   = new alias($in);
echo $h->fa_alias();
$ini='valoreinizio';
  $f = new input($ini,'post',20,'Etichetta','etich','ip','help 2');
  $f->field();
  
?>
<html>
<style>
.btn-group {
    position: relative;
    display: inline-block;
    font-size: 0;
    vertical-align: middle;
    white-space: nowrap;
}
div {
    display: block;
}
input[type=radio] {
    display: none;
        float: left;
    margin-left: -20px;
}
</style>
<br />
<div class="controls">
 <fieldset class="btn-group"> 
 <input type="radio" id="jform_showtitle0" name="jform[showtitle]" value="1" checked="checked">
 <label for="jform_showtitle0" class="btn active btn-success">Mostra</label>  
 </fieldset>
 </div>
</html>
