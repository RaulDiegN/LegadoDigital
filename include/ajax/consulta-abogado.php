<?php
require_once '../config.php';

use LegadoDigital\App\UsuarioConsulta;

// Data from ajax serialize
$idd_consulta = intval(htmlspecialchars(strip_tags(trim($_POST['idd']))));
$consulta = UsuarioConsulta::buscarConsultaPorID($idd_consulta);

$result = array();

$result['response'] = $consulta ? 'ok' : 'No se ha podido encontrar la consulta';

if ($consulta) {
	$result['consulta'] = $consulta;
}

echo json_encode($result);

exit();