<?php

    function connectionToBD(){
        try
        {

            $configs_env = file_get_contents('../config.json');
            $configs_env = json_decode($configs_env,true);

            $USERS_db=  $configs_env['user'];
            $PASSWORD_db= $configs_env['password'];
            $HOST_db= $configs_env['hostname'];
            $NAME_db= $configs_env['dbname'];

            $bdconect = new PDO("mysql:host=".$HOST_db.";dbname=".$NAME_db."",
                $USERS_db, $PASSWORD_db, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8")
            );
            // $bdd = new PDO("mysql:host=".$host.";dbname=".$dbname."", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
            // echo 'base de donnees connectee';
            return $bdconect;
        }catch(Exception $e){
            echo "Erreur: ".$e->getMessage();
            die("<h2>Impossible de se connecter à la base de données !</h2>");
        }

    }

function sendMail($email,$object,$contenu){

$header="MIME-Version: 1.0\r\n";
	$header.='From:"PrimFX.com"<support@glazikautoecole.com>'."\n";
	$header.='Content-Type:text/html; charset="uft-8"'."\n";
	$header.='Content-Transfer-Encoding: 8bit';
	$message="
	<html>
	    <body>
	        <div align='center'>
	            <img src='http://www.primfx.com/mailing/banniere.png'/>
	            <br/>
	                {$contenu}
	            <br/>
	            <img src='http://www.primfx.com/mailing/separation.png'/>
	        </div>
	</body>
	</html>
	";
	mail($email, $object, $message, $header);

}