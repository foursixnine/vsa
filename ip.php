<?php
	include 'global.inc.php';

	if(isset($_POST['lista']) && count($_POST['lista']) > 0 ){
		
		if(($nuevoItem = trim($_POST['agregar-a-lista'])) != '000'){
			array_push($_POST['lista'], '192.168.0.'.$nuevoItem);
		}
	
		escribir(SQUID_LIBRES,$_POST['lista']);
	}

	$archivo = leer(SQUID_LIBRES);

	$LISTA = array();
	foreach ($archivo as $redes )  {
		if('' != trim($redes)){
			$LISTA[] = "\t\t".'<input type="checkbox" name="lista[]" value="'.trim($redes).'" checked/><b>'.trim($redes).'</b><br />';
		}

	}

?>
<div align="center">
<fieldset style="align:center;text-align:left;width:400px">
<legend>Direcciones IP PRIVILEGIADAS</legend>
<p>Las direcciones IP aqui listadas, podran acceder a cualquier pagina <a href="paginas-bloqueadas.php" target="cuerpo">BLOQUEADA</a> o
<a href="redes-sociales.php" target="cuerpo">RESTRINGIDA</a> sin ningun tipo de restricciones por Horario o Contenido.
</p>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
	Ingrese la direccion IP: <b><i>Solo el ultimo segmento.</b></i> <br />
	
	192.168.0.<input type="text" name="agregar-a-lista" value="000" maxlength="3"><br /><br />
	
	<fieldset style="align:center;text-align:left;width:200px">
	<legend>Direcciones IP privilegiadas actualmente</legend>
<?=implode("\n",$LISTA)."\n";?>
	</fieldset>
	
	<input type="submit" style=""/>
</form>
</fieldset>
</div>
