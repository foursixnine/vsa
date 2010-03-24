<?php
	define('SQUID_LIBRES', dirname(__FILE__).'/free_ip.lst');
	define('SQUID_REDES_SOCIALES', dirname(__FILE__).'/REDES_SOCIALES.lst');
	define('SQUID_PAGINAS_BLOQUEADAS', dirname(__FILE__).'/PAGINAS_BLOQUEADAS.lst');
	ini_set('error_reporting', E_ALL|E_STRICT);

	/**
	 * Para facilitar las cosas
	 **/
	
	/**
	 * Funcion Escribir
	 * parametros: $quien archivo, $que array;
	 * La idea es escribir directamente el archivo, sin necesidad de tener que verificar mucho
	 * las cosas.
	 **/
	function escribir($quien, $que){
		// Agregamos el salto de linea final.
		array_push($que, "\n");
		return file_put_contents($quien,implode("\n",$que));
	}

	function leer($quien){
		$quien = file($quien);
		array_pop($quien);
		return $quien;
	}

?>
