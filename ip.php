<?php
	include 'global.inc.php';

	if(isset($_POST['ip']) && count($_POST['ip']) > 0 ){
		$IPS = implode("\n",$_POST['ip']);
		
		if(($ipNueva = trim($_POST['agregar-ip'])) != '192.168.1.xx'){
			print 'Agregando una nueva IP<br />';
			$IPS .= "\n".$ipNueva;
		}
	
		print 'Escribiendo las ips<br />';
		print 'Para tomar en cuenta estos cambios.';	
		file_put_contents(SQUID_LIBRES,$IPS);
	}

	$archivo = file(SQUID_LIBRES);

	$IPS = array();
	foreach ($archivo as $ip )  {
	
		$IPS[] = '<input type="checkbox" name="ip[]" value="'.trim($ip).'" checked/><b>'.trim($ip).'</b><br />';

	}

?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
	<input type="text" name="agregar-ip" value="192.168.1.xx"> Direccion IP a agregar <br /
	<?=implode("\n\t",$IPS)."\n";?>
	<input type="submit">
</form>
