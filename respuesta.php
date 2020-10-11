<link rel="stylesheet" href="estilos.css">
<link rel="stylesheet" href="estilo_cuerpo.css">

<div class="cabecera">

  <p class="titulo">
    <?php  
      $output = `swipl -s ejemplo.pl -g "test." -t halt.`;
      /*echo($output);*/
    ?>
    Sistema Experto de Crédito
  </p>


  <p class="Subtitulo">
    <?php
      $output1= `swipl -s ejemplo.pl -g "test1." -t halt.`; 
      /*echo($output1);*/
    ?>
    Para la evaluación de prestación de dinero de la entidad Caja Trujillo
  </p>

</div>


<div class="CuerpoRespuesta">


     <div class="cuadroRespuesta">
        <?php


            
            $pregunta1 = $_POST['p1'];
            $pregunta2 = $_POST['p2'];
            $pregunta3 = $_POST['p3'];
            $pregunta4 = $_POST['p4'];
            $pregunta5 = $_POST['p5'];
            $pregunta6 = $_POST['p6'];
            $pregunta7 = $_POST['p7'];
            global $variable4y5;
            global $variable6;
            global $variable6y7;
            global $respuesta;

            // PREGUNTA 1
            if($pregunta1==0){
              $pregunta1=`swipl -s ejemplo.pl -g "test4." -t halt.`;
            }
            if($pregunta1==1){
              $pregunta1=`swipl -s ejemplo.pl -g "test4." -t halt.`;
            }
            if($pregunta1==2){
              $pregunta1=`swipl -s ejemplo.pl -g "test3." -t halt.`;
            }
            if($pregunta1==3){
              $pregunta1=`swipl -s ejemplo.pl -g "test3." -t halt.`;
            }
            if($pregunta1==4){
              $pregunta1=`swipl -s ejemplo.pl -g "test2." -t halt.`;
            }
            if($pregunta1==5){
              $pregunta1=`swipl -s ejemplo.pl -g "test2." -t halt.`;
            }
            
            $caracter=$pregunta1;



            // PREGUNTA 2
            if($pregunta2=="NO"){
              $pregunta2=`swipl -s ejemplo.pl -g "test6." -t halt.`;
            }else{
              $pregunta2=`swipl -s ejemplo.pl -g "test5." -t halt.`;
            }

            $capital=$pregunta2;



            // PREGUNTA 3
            if($pregunta3==0){
              $pregunta3=`swipl -s ejemplo.pl -g "test8." -t halt.`;
            }else{
              $pregunta3=`swipl -s ejemplo.pl -g "test7." -t halt.`;
            }

            $colateral=$pregunta3;


            // PREGUNTA 4
            //if($pregunta4=="NO"){
            //  $pregunta4="Rechazado";
            //}else{
            //  $pregunta4="Aceptado";
            //}

            //$capacidadPago=$pregunta4;


            // PREGUNTA 5
            //if($pregunta5>=1200){
            //  $pregunta5="Aceptado";
            //}else{
            //  $pregunta5="Rechazado";
            //}

            //$capacidadPago=$pregunta5;

            // Juntar 4 y 5 para sacar Capacidad de pago
            if($pregunta4=="SI" && $pregunta5>=1200){
              $variable4y5=`swipl -s ejemplo.pl -g "test9." -t halt.`;
            }else{
              $variable4y5=`swipl -s ejemplo.pl -g "test10." -t halt.`;
            }

            $capacidadPago=$variable4y5;


            // PREGUNTA 6
            if($pregunta5>=1200 && $pregunta5<2000){
              $variable6=3000;
            }elseif($pregunta5>=2000 && $pregunta5<2500){
              $variable6=5000;
            }elseif($pregunta5>=2500){
              $variable6=10000;
            }


            // PREGUNTA 7
            //Llega la misma variable
            //Tasa mensual de 5.8%
            if($pregunta7==1){ //3meses
              $Tasa=5.8;
            }if($pregunta7==2){ //6meses
              $Tasa=7.8;
            }if($pregunta7==3){ //12meses
              $Tasa=9.8;
            }if($pregunta7==4){ //18meses
              $Tasa=11.8;
            }if($pregunta7==5){ //24meses
              $Tasa=13.8;
            }
            
            if($variable6==3000){
              $variable6y7=`swipl -s ejemplo.pl -g "test11." -t halt.`;
            }if($variable6==5000){
              $variable6y7=`swipl -s ejemplo.pl -g "test12." -t halt.`;
            }if($variable6==10000){
              $variable6y7=`swipl -s ejemplo.pl -g "test13." -t halt.`;
            }
            
            $condiciones=$variable6y7;
            

            // PREGUNTA 7
            //echo "Pre: ".$capacidadPago."<br/>";
            //echo "Pregunta 1 es: ".$caracter."<br/>";
            //echo "Pregunta 2 es: ".$capital."<br/>";
            //echo "Pregunta 3 es: ".$colateral."<br/>";

            // Regla1
            if($caracter=="Bueno" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="ACEPTADO";
            }

            // Regla2
            if($caracter=="Bueno" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="RECHAZADO";
            }

            // Regla3
            if($caracter=="Bueno" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="RECHAZADO";
            }

            // Regla4
            if($caracter=="Bueno" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="RECHAZADO";
            }

            // Regla5
            if($caracter=="Bueno" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="RECHAZADO";
            }

            // Regla6
            if($caracter=="Bueno" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="RECHAZADO";
            }

            // Regla7
            if($caracter=="Bueno" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="RECHAZADO";
            }

            // Regla8
            if($caracter=="Bueno" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="RECHAZADO";
            }

            // Regla9
            if($caracter=="Regular" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Aceptado";
            }

            // Regla10
            if($caracter=="Regular" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla11
            if($caracter=="Regular" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla12
            if($caracter=="Regular" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla13
            if($caracter=="Regular" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla14
            if($caracter=="Regular" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla15
            if($caracter=="Regular" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla16
            if($caracter=="Regular" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla17
            if($caracter=="Malo" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla18
            if($caracter=="Malo" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla19
            if($caracter=="Malo" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla20
            if($caracter=="Malo" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla21
            if($caracter=="Malo" AND 
                  $capital=="Aceptado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla22
            if($caracter=="Malo" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Aceptado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla23
            if($caracter=="Malo" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Aceptado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }

            // Regla24
            if($caracter=="Malo" AND 
                  $capital=="Rechazado" AND 
                    $colateral=="Rechazado" AND
                      $capacidadPago=="Rechazado" AND
                        ($condiciones=="Aceptable" OR
                          $condiciones=="En Rango" OR
                            $condiciones=="Alto")){
              $respuesta="Rechazado";
            }


            //echo "Pregunta 4 es: ".$respuesta."<br/>";
            //echo "Pregunta 5 es: ".$pregunta5."<br/>";
            //echo "Pregunta 6 es: ".$pregunta6."<br/>";
            //echo "Pregunta 7 es: ".$pregunta7."<br/>";

        ?>

        <p class="textoRespuesta"><b>La evaluación realizada nos da como resultado</b></p>
     
        <p class="TextoPrestamo">Préstamo</p>
        <input class="CajasTextoRespuesta" id="" type="" value="<?php echo $respuesta?>"/>
     
     </div>

     <div align="right">
     <a href="index.php"> <input class="BotonRespuesta" type="submit" name="envia"id="envia" value="Inicio" /></a>
     
      </div>
   <!--  
  <form id="form1"  name="form1" method="post" action="index.php">

    <p class="">CLIENTE</p>

    <p>
      <select name="TIPO" >
            <option selected value="0"> Elige un usuario </option>
            <option value="2">Moroso </option>
            <option value="3">Limpio </option>
      
      </select>
    </p> 

    <p>
        <input type="submit" name="envia"id="envia" value="envia" />
    </p>

  </form>
    -->

</div>
