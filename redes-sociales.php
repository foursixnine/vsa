<?php
	include 'global.inc.php';

	if(isset($_POST['lista']) && count($_POST['lista']) > 0 ){
		
		if(($nuevoItem = trim($_POST['agregar-a-lista'])) != 'dominio.com'){
			array_push($_POST['lista'], $nuevoItem);
		}
	
		escribir(SQUID_REDES_SOCIALES,$_POST['lista']);
	}

	$archivo = leer(SQUID_REDES_SOCIALES);

	$LISTA = array();
	foreach ($archivo as $redes )  {
		if('' != trim($redes)){
			$LISTA[] = "\t\t".'<input type="checkbox" name="lista[]" value="'.trim($redes).'" checked/><b>'.trim($redes).'</b><br />';
		}

	}

?>
<div align="center">
<fieldset style="align:center;text-align:left;width:400px">
<legend>Paginas restringidas en horas de trabajo.</legend>
<p>Las paginas aqui listadas, estaran restringidas para todos los usuarios menos aquellos que esten incluidos
en la lista de usuarios <a href="ip.php" target="cuerpo">PRIVILEGIADOS</a>. Estas paginas estaran disponibles en un horario
comprendido entre las 7:00AM a 8:00AM y 12:00PM a 1:00PM.
</p>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
	Ingrese el nombre de dominio sin <b><i>www ni http://</b></i> <br />
	<input type="text" name="agregar-a-lista" value="dominio.com"><br /><br />
	
	<fieldset style="align:center;text-align:left;width:200px">
	<legend>Paginas restringidas actualmente</legend>
<?=implode("\n",$LISTA)."\n";?>
	</fieldset>
	
	<input type="submit" style=""/>
</form>
</fieldset>
</div>
