<?php
/**
 *
 */
class FB_login_test
{
  public $uten   ='';
  public $pass    ='';
  function __construct($uten,$pass)
  {
    $this->uten    = $uten;
    $this->pass    = $pass;
  }

  public function login_test()
  {
    $passmd5   =md5($this->pass);    // cripto la password

echo    $sql = "SELECT * FROM `".DB::$pref."ute`
            WHERE username='".$this->uten."' and ustat<>'A'";
    $statement = $PDO->prepare($sql);
    $statement->execute();

    		if ($statement->rowCount() < 1)
    			{	// utente sconosciuto
    			setcookie('err','2',time()+3600,'','','');
    			//header('location:login.php') ;
          return "utente sconosciuto";
    			}

    foreach($PDO->query($sql) as $row)
      {
        	if ( $row['upassword'] == $passmd5)
                {
                // password valida
                setcookie('admin',$username,time()+3600,'','','');
                setcookie('accesso',$row['uaccesso'],time()+3600,'','','');
                setcookie('numero',$row['uiscritto'],time()+3600,'','','');
                setcookie('err','0',time()+3600,'','','');
    			//header('location:admin.php?urla=widget.php&pag=');
          return "ok";
    			}
           else
               {
    			// pw invalida
               setcookie('err','1',time()+3600,'','','');
               return "pw invalida";
               //header('location:login.php') ;
               }

        }
  }
}

 ?>
