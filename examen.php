<?PHP
								
if (isset ($_REQUEST['envia']))
	 {
									
									$t=$_REQUEST['TABLA'];
									echo " SELECIONASTE LA TABLA DEL ".$t." <br>" ;
		for ($i=1; $i<=10; $i++)
	{
				$r=$i*$t;
				echo " " .$t . " x ".$i."=".$r."<br>" ;
	}	
	   }
     
?>
<html>
<head>

</head>

<body>
<form id="form1"  name="form1" method="post" action="examen.php">
  <p>SELECIONE SU TABLA </p>
  <p>
   
    </select>
    <select name="TABLA" >
    <option selected value="0"> Elige un usuario </option>
      <option value="1">uno </option>
      <option value="2">dos </option>
      <option value="3">tres </option>
      <option value="4">cuarto </option>
      <option value="5">cinco </option>
      <option value="6">seis </option>
      <option value="7">siete  </option>
      <option value="8">ocho</option>
      <option value="9">nueve </option>
      <option value="10">diez </option>
    </select>
  </p> 
  <p>
    <input type="submit" name="envia"id="envia" value="envia" />
  </p>
</form>
</body>
</html>




<?PHP
    
    if (isset ($_REQUEST['envia']))
	  {
									
			$t=$_REQUEST['TIPO'];
      $output = `swipl -s ejemplo.pl -g "test$t." -t halt.`;
      echo($output);
	   }
     
  ?>