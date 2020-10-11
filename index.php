
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
    Para la evaluación de prestación de dinero de la entidad financiera Caja Trujillo
  </p>

</div>


<div class="Cuerpo">

  <?PHP

    if (isset ($_REQUEST['envia']))
	  {
									
			$t=$_REQUEST['TIPO'];
      $output = `swipl -s ejemplo.pl -g "test$t." -t halt.`;
      echo($output);
	   }
     
  ?>


     <!-- Formulario -->

     <form action="respuesta.php" method="post">
     

      <div class="cuadro">

          <!-- Carátula Integrantes -->
            <p class="TituloIntegrantes"><b>Integrantes</b></p>
            <p class="Nombre1"><b>Héctor Medina Febre</b></p>
            <p class="Nombre2"><b>María Quezada Rivera</b></p>
            <p class="Nombre3"><b>Jeyson Zavaleta Cortez</b></p>



          <!-- Preguntas Cuestionario -->
            <p class="texto"><b>1. ¿Cuál es la Reputación Financiera del cliente?</b></p>
            <input class="CajasNumeros" name="p1" type="number" min="0" max="5" value="0"/>

            <p class="textoA"><b>2. ¿Tiene dinero invertido en algún negocio?</b></p>
            <select class="CajaRecibos" name="p2" >
                  <option value="NO">NO </option>
                  <option value="SI">SI </option>
            </select>

            <p class="textoA"><b>3. ¿Cuántas propiedades tiene a su nombre?</b></p>
            <input class="CajasNumeros" name="p3" type="number" min="0"  value="0"/>

            <p class="textoA"><b>4. ¿Es puntual en el pago de sus recibos de Luz y Agua?</b></p>
            <select class="CajaRecibos" name="p4" >
                  <option value="NO">NO </option>
                  <option value="SI">SI </option>
            </select>

            <p class="textoA"><b>5. ¿A cuánto asciende su sueldo mensual?</b></p>
            <input class="CajasTexto" name="p5"/>

            <p class="textoA"><b>6. ¿Cuál es el monto que necesita el cliente?</b></p>
            <input class="CajasTexto" name="p6"/>

            <p class="textoA"><b>7. ¿Qué plazo eligió el cliente?</b></p>
            <select class="CajaPlazos" name="p7" >
                  <option value="1">3 meses </option>
                  <option value="2">6 meses </option>
                  <option value="3">12 meses </option>
                  <option value="4">15 meses </option>
                  <option value="5">18 meses </option>
            </select>
      
            <div align="right">
                <a href="respuesta.php"><input  class="Boton" type="submit" name="envia"id="envia" value="Consultar" /></a>
            </div>

            <img class="logo" src="logo.png" alt="">

     </div>

     </form>

<<<<<<< HEAD
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

=======
>>>>>>> 489e94bd770d35694d9943edce06ee0ceaac0361
</div>
