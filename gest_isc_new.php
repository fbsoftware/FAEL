<?php
session_start();
include_once 'include_gest.php';
$tipo = $_SESSION['pag'];
$head = new getBootHead('gestione iscritti');
     $head->getBootHead();
?>
</head>
<script>
$(function () {

    $("#cerca_anagrafico").autocomplete({
        minLength: 2,
        source: "autocomplete_anagrafico.php",
        select: function (event, ui) {
            $("#anagrafico_id").val(ui.item.id);
        }
    });

});
</script>
<<?php 
echo "<body>";
//include_once 'include_gest.php';
$tipo= isset($_GET['pag']) ? $_GET['pag'] : 'I';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
 
 //   bottoni gestione
if ($tipo == 'I') 
          { 
          $param  = array('mostra','nuovo','modifica','cancella','archivia','aiuto','chiudi');    
          $btx    = new bottoni_str_par('Gestione iscritti','isc','upd_isc.php',$param);  
               $btx->btn();
          }
elseif ($tipo == 'A') 
          { 
          $param  = array('mostra','ripristina','aiuto','chiudi');    
          $btx    = new bottoni_str_par('Gestione archiviati','isc','upd_isc.php',$param);  
               $btx->btn();
          }
          
// zona messaggi
$msg = new msg($_SESSION['errore']);
     $msg->msg();
          
// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];    

// autocomplete  =========================================================================
echo  "<fieldset style='display:flex; align-items: baseline;'>";
?>
<label for="cerca_anagrafico">Cerca anagrafico:</label>
<input type="text" id="cerca_anagrafico" placeholder="Cerca cognome o codice">
<input type="hidden" id="anagrafico_id" name="id">
<input type="hidden" id="atipo" name="tipo" value="<?php echo $tipo; ?>">
<div id="scheda_anagrafico"></div>
<?php
echo "</fieldset >"; 
echo "</form>";    
?>