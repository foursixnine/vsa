<?php
	include 'global.inc.php';

	if(isset($_POST['paginas-bloqueadas']) && count($_POST['paginas-bloqueadas']) > 0 ){
		$IPS = implode("\n",$_POST['paginas-bloqueadas']);
		
		if(($redesNuevas = trim($_POST['agregar-paginas-bloqueadas'])) != 'dominio.com'){
			print 'Agregando una nueva pagina<br />';
			$IPS .= "\n".$redesNuevas;
		}
	
		print 'Escribiendo las paginas-bloqueadas<br />';
		print 'Para tomar en cuenta estos cambios.';	
		file_put_contents(SQUID_PAGINAS_BLOQUEADAS,$IPS);
	}

	$archivo = file(SQUID_PAGINAS_BLOQUEADAS);

	$IPS = array();
	foreach ($archivo as $redes )  {
	
		$IPS[] = '<input type="checkbox" name="paginas-bloqueadas[]" value="'.trim($redes).'" checked/><b>'.trim($redes).'</b><br />';

	}

?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
	<input type="text" name="agregar-paginas-bloqueadas" value="dominio.com"> Ingrese el nombre de dominio sin www ni http:// <br />
	<?=implode("\n\t",$IPS)."\n";?>
	<input type="submit" />
</form>
