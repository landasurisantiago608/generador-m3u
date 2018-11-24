<?php
/**
 * @author alebupal
*/
$nombre_fichero = 'channels.m3u';

$usuario_tvheadend = $_POST["usuario_tvheadend"];
$contrasena_tvheadend = $_POST["contrasena_tvheadend"];

$usuario_lista = $_POST["usuario_lista"];
$contrasena_lista = $_POST["contrasena_lista"];

$ip = $_POST["ip_tvheadend"];
$puerto = $_POST["puerto_tvheadend"];
$url = "http://".$ip.":".$puerto;

descargarFichero($nombre_fichero, $usuario_tvheadend, $contrasena_tvheadend, $url);
generarFichero($nombre_fichero, $usuario_lista, $contrasena_lista, $url, $ip, $puerto);

function descargarFichero($nombre_fichero, $usuario_tvheadend, $contrasena_tvheadend ,$url){
	if (file_exists($nombre_fichero)) {
		//echo "El fichero $nombre_fichero existe";
		unlink("channels.m3u");
	}
	//echo "El fichero $nombre_fichero no existe";
	$source = $url."/playlist/channels.m3u";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_USERPWD, $usuario_tvheadend.":".$contrasena_tvheadend);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_URL, $source);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSLVERSION,3);
	$data = curl_exec ($ch);
	$error = curl_error($ch);
	curl_close ($ch);

	$destination = "./".$nombre_fichero;
	$file = fopen($destination, "w+");
	fputs($file, $data);
	fclose($file);
}

function generarFichero($nombre_fichero, $usuario_lista, $contrasena_lista, $url, $ip, $puerto){
	$archivo_zip = "./lista.zip";
	if (file_exists($archivo_zip)) {
		//echo "El fichero $nombre_fichero existe";
		unlink($archivo_zip);
	}
	$m3u = file_get_contents("./".$nombre_fichero);

	$patron = "/(?<=\?)(.*)(?=profile)/i";
	$sustitucion = "";
	$resultado = preg_replace($patron, $sustitucion, $m3u);

	ob_start();
	$archivo_salida_m3u="canales-".$usuario_lista.".m3u";
	file_put_contents($archivo_salida_m3u, $resultado);
	ob_end_flush();

	$m3u = file_get_contents("./".$archivo_salida_m3u);
	$patron = $url;
	$sustitucion= "http://".$usuario_lista.":".$contrasena_lista."@".$ip.":".$puerto;
	$resultado = str_replace($patron,$sustitucion,$m3u);

	ob_start();
	$archivo_salida_m3u="canales-".$usuario_lista.".m3u";
	file_put_contents($archivo_salida_m3u, $resultado);
	ob_end_flush();


	$zip = new ZipArchive();
	if($zip->open($archivo_zip,ZIPARCHIVE::CREATE)===true) {
		$zip->addFile($archivo_salida_m3u);
		$zip->close();
		//eliminamos m3u
		unlink("./".$archivo_salida_m3u);
		unlink("./".$nombre_fichero);
		header("Location: ".$archivo_zip);
	}
	else {
		echo "Error al crear zip";
	}

}

?>
