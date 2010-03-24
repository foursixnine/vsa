<?php
	function reload(){
		exec("sudo service squid3 reload");
	}

	function restart(){
		exec("sudo service squid3 restart");
	}

	function halt(){
		exec("sudo shutdown -h now");
	}


	if(isset($_GET['act'])){
		$accion = $_GET['act'];
		$accion();
	}

?>
<html>
<STYLE TYPE="text/css" >
<!--
/* #  li { display:inline; } */
 ul {
	margin-left: 0;
	padding-left: 0;
	display: inline;
	} 

ul li {
	margin-left: 0;
	margin-bottom: 0;
	padding: 2px 15px 5px;
	border: 1px solid #000;
	list-style: none;
	display: inline;
	}
	
		
 ul li.here {
	border-bottom: 1px solid #ffc;
	list-style: none;
	display: inline;
	}
-->
</STYLE>
	<body>
		<b style="padding:1em;margin-bottom:1em;">Mini panel de Administracion del Proxy de AUDICON</b><br /><br>
		<ul id="tabs"> 
			<li><a href="<?=$_SERVER['PHP_SELF']?>?act=reload">Cargar la configuracion</a></li>
			<li><a href="<?=$_SERVER['PHP_SELF']?>?act=restart">Reiniciar el servicio</a></li>
			<li><a href="<?=$_SERVER['PHP_SELF']?>?act=halt">Apagar el Servidor</a></li>
			<li><a href="ip.php" target="cuerpo">Modificar Ip privilegiada</a></li>
			<li><a href="paginas-bloqueadas.php" target="cuerpo">Modificar Paginas Bloqueadas</a></li>
			<li><a href="redes-sociales.php" target="cuerpo">Modificar Redes Sociales</a></li>
		</ul>
	</body>
</html>
