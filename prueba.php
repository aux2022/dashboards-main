

<?php
include 'session.php';

$conn = conect();

$tsql = "SELECT Num as Maquina
	  
,SUBSTRING(Formula, 1,CHARINDEX(' ', Formula, 1)) as Formula
,[Orden]
,[PrintCard]
,[Producto]
,[KGSolicitados]
,[TotalProducido]  
,[KGFaltantes]
,[Porcentaje]  
FROM [bioflex_sap].[dbo].[vwTableroExtrusion]
";
$stmt = sqlsrv_query($conn, $tsql);


?>
<!doctype html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta property="og:type" content="website" />
     <META http-equiv=refresh content=30>
      <title>DASHBOARDS</title>
      <meta name="description" content="all">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="./style2.css">
   
</head>
    <body>
        <div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
      
<div class="material_contenedor">
   
    <div class="material_elemento">
  
      <div class="foto_contenedor">


<script src="//widget.time.is/es.js"></script>
<script>
time_is_widget.init({_z159:{template:" <FONT SIZE=2><h1 class=dia>DATE</h1> <h1 class=hora>TIME</h1></FONT> ", date_format:"dayname daynum/monthnum/yy",time_format:"12hours:minutesAMPM"}});
</script>
<style type="text/css" media="all">
   
 


         .hora{margin-left:.6cm;
    text-decoration: underline white; 
 color: #c8efee;
text-shadow: 0px 0px 10px #c8efee,
0px 0px 10px #c8efee,
/* Repetimos el resplandor */
0px 0px 40px #46c9c5,
0px 0px 40px #46c9c5,
0px 0px 40px #46c9c5,
 }
   .dia{
    color: #c8efee;
text-shadow: 0px 0px 10px #c8efee,
0px 0px 10px #c8efee,
/* Repetimos el resplandor */
0px 0px 40px #46c9c5,
0px 0px 40px #46c9c5,
0px 0px 40px #46c9c5,
   }
    h1{display: inline;}
   
@import url('https://fonts.googleapis.com/css?family=Exo:400,700');

* {
    margin: 0px;
    padding: 0px;
}





.area {
  background: #555555;
  background: -webkit-linear-gradient(to left, #fb8f8f, #4e54c8);
  width: 100%;
  height: 100vh;


}

.circles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li {
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;

}

.circles li:nth-child(1) {
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2) {
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3) {
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4) {
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5) {
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6) {
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7) {
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8) {
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9) {
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10) {
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes animate {

    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100% {
        transform: translateY(-2000px) rotate(720deg);
        opacity: 0;
        border-radius: 10%;
    }

}
      
  
</style>
<br>

<h1 class="titulo" > ORDENES ACTIVAS DE EXTRUSIÓN 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;<h1  class="time" align="center" id="_z159" style="font-size:25px"></h1><img margin-left="15cm" width="220px"  height="60px"  src="logo_bioflex.png" align="right"></h1>



</ul>

       
        <br><br><br><br><br>
      
    <?php
    echo '<div id="demo" width:100%">                         
        <table style="width:100%"  height="100%" border="2">
        <tr class="encabezados">
         <th width="5%">Extruder</th>
         <th width="5%">Fórmula</th>
         <th width="5%">Orden</th>
         <th width="10%">PrintCard</th>
         <th width="30%">Producto</th>
         <th width="12%">Kilos solicitados</th>
         <th width="12%">Kilos producidos</th>
         <th width="12%">Kilos faltantes</th>
         <th width="9%">Porcentajes</th>
         </tr>
        </table></div>';
    echo '<div class="table-responsive row">';
    echo '<table id="tablaclientes">';
    echo '<tbody>';
    $TotalKS = 0;
    $TotalKP = 0;
$TotalKF = 0;
$TotalK=0;
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
        $kgS = number_format($row[5]) . ' kg';
        $kgP = number_format($row[6]) . ' kg';
        $kgF = number_format($row[7]) . ' kg';
        $porcentaje = number_format($row[8]) . ' %';
$extruder=($row[0]);
$formula=($row[1]);
$orden=($row[2]);
$print=($row[3]);
$prod=($row[4]);
        echo '<tr >';

        echo '<td width="5%" align="center" style="font-size: 14px;" >' . utf8_encode($extruder) . '</td>';




        if($formula==''){
 echo '<td width="5%" align="center" style="color:#DC7633";>' . utf8_encode('--') . '</td>';

        }else{
 echo '<td width="5%" align="center">' . utf8_encode($formula) . '</td>';
        }
  
        if($orden=='--'){
            echo '<td width="5%" align="center" style="color:#DC7633";>' . utf8_encode($orden) . '</td>';
        }else{
           
 echo '<td width="5%" align="center" >' . utf8_encode($orden) . '</td>'; 
        }

        if($print=='--'){
            echo '<td width="10%" align="center" style="color:#DC7633";>' . utf8_encode($print) . '</td>';
        

        }else{
            echo '<td width="10%" align="center" >' . utf8_encode($print) . '</td>';
       
        }
        if($prod=='--'){
            
            echo '<td width="30%" align="center" style="color:#DC7633";>' . utf8_encode($prod) . '</td>';
      

        }else{  echo '<td width="30%" align="center" >' . utf8_encode($prod) . '</td>';}

        






        if ($kgS == 0 ) {
            echo '<td width="12%" align="center" style="color:#DC7633";>' .
                utf8_encode($kgS) .
                '</td>';
         
           
        }   else {
            echo '<td width="12%" align="center" >' .
                utf8_encode($kgS) .
                '</td>';
        }
         if( $kgP == 0){
            echo '<td width="12%" align="center"  style="color:#DC7633";>' .
            utf8_encode($kgP) .
            '</td>';
        }
        else {
            
            echo '<td width="12%" align="center">' . utf8_encode($kgP) . '</td>';
            
        } if( $kgF == 0){
            echo '<td width="12%" align="center"  style="color:#DC7633";>' .
            utf8_encode($kgF) .
            '</td>';
        } else {
            
            echo '<td width="12%" align="center">' . utf8_encode($kgF) . '</td>';
          
        }
       
        if( $porcentaje == 0){
           
            echo '<td width="9%" align="center" style="color:#DC7633";>' .
                utf8_encode($porcentaje) .
                '</td>';
                
        }
        else if( $porcentaje>=110){
           
            echo '<td width="9%" align="center" style="color:red";>' .
                utf8_encode($porcentaje) .
                '</td>';
                
        }
        
        else {
            
            echo '<td width="9%" align="center">' .
                utf8_encode($porcentaje) .
                '</td>';
        }

        echo '</tr>';

   
         $TotalKS = $TotalKS + $row[5];
         $TotalKP = $TotalKP + $row[6];
         if($row[7]>-1){
            $TotalKF = $TotalKF + $row[7];
         }
         
         $T1=number_format($TotalKS) . ' kg';
         $T2=number_format($TotalKP) . ' kg';
         $T3=number_format($TotalKF) . ' kg';
         
         
    }



    
    $TotalPP=1;
    $T4=number_format($TotalPP);

    echo '</tbody>';
    echo '</table>';

    echo '</div>';

    echo '<div id="demo" width:100%">   <table style="width:100%"  height="100%" border="2">';
    echo '<tr>';
    echo '<th width="55.1%">' . utf8_encode('TOTALES:') . '</th>';
    echo '<th width="12%"  style="color:#FF0000";>' .
        utf8_encode($T1) .
        '</th>';
    echo '<th width="12%"  style="color:#FF0000";>' .
        utf8_encode($T2) .
        '</th>';
    echo '<th width="12%"  style="color:#FF0000";>' .
        utf8_encode($T3) .
        '</th>';
   
        $T4=number_format(100/$TotalKS*$TotalKP) . ' %' ;



    echo '<th width="9%"  style="color:#FF0000";>' . ($T4) . '</th>';

    echo '</tr>';
    echo '</table>';
    echo '</div>';
    echo '<div class="table-responsive row">';
    echo '<table id="tablaclientes">';
    echo '<tbody>';


    ?>

    
</div>  
     </div>
     </div>
     
</div></ul>
</body>

</html>