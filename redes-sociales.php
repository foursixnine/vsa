<?php
	include 'global.inc.php';

	if(isset($_POST['redes-sociales']) && count($_POST['redes-sociales']) > 0 ){
		$IPS = implode("\n",$_POST['redes-sociales']);
		
		if(($redesNuevas = trim($_POST['agregar-redes-sociales'])) != 'dominio.com'){
			print 'Agregando una nueva IP<br />';
			$IPS .= "\n".$redesNuevas;
		}
	
		print 'Escribiendo las redes-sociales<br />';
		print 'Para tomar en cuenta estos cambios.';	
		file_put_contents(SQUID_REDES_SOCIALES,$IPS);
	}

	$archivo = file(SQUID_REDES_SOCIALES);

	$IPS = array();
	foreach ($archivo as $redes )  {
	
		$IPS[] = '<input type="checkbox" name="redes-sociales[]" value="'.trim($redes).'" checked/><b>'.trim($redes).'</b><br />';

	}

?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
	<input type="text" name="agregar-redes-sociales" value="dominio.com"> Ingrese el nombre de dominio sin www ni http:// <br />
	<?=implode("\n\t",$IPS)."\n";?>
	<input type="submit" />
</form>
