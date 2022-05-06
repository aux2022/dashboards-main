<?php
function conect(){
    
    $serverName = "172.16.10.113\BIOFLEXSQL2018"; //serverName\instanceName
    $connectionInfo = array( "Database"=>"bioflex_sap", "UID"=>"UserBFSAP", "PWD"=>"Pwd_@bfsap");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

  
	if (!$connectionInfo){
			echo '<script>alert("No pudo conectarse a la BD")</script> ';
		}
	return $conn;
}

function desconect(){
   if(isset($_SESSION['tiempo']) ) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 1200;//20min en este caso.

        //Calculamos tiempo de vida inactivo.
        $vida_session = time() - $_SESSION['tiempo'];

            //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
            if($vida_session > $inactivo)
            {
                //Removemos sesión.
                session_unset();
                //Destruimos sesión.
                session_destroy();              
                //Redirigimos pagina.
                header("Location: index.php");

                exit();
            }

    }
    $_SESSION['tiempo'] = time();
}



?>