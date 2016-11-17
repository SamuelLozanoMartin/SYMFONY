<?php
require_once ('mvcUsuarios.php');

$usuario1 = new Usuario();
$usuario1->get('juangutierrez@gmai.com');

$template = file_get_contents('mvcTemplate.tpl');

foreach ($usuario1->getRows() as $clave=>$valor) {
	$template = str_replace('{'.$clave.'}', $valor, $template);
}

print $template;
?>

