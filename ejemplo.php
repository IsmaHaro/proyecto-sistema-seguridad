<?php
	// ARRREGLOS
	$arreglo = array('Mustang', 'Camaro');
	$arreglo[0] = 'Mustang';
	$arreglo[1] = 'Camaro';

	$lista = array('aceptado'  => array('Juan', 'Luis'),
		           'rechazado' => 'Pedro');

	print_r($lista['aceptado']);
	echo '<br>'.$lista['rechazado'].'<br>';

	echo $arreglo[1];

	$numero = 30;

	// CICLO While
	$numero = 0;
	while($numero <= 10){
		echo $numero.'<br>';
		$numero++;
	}

	// Ciclo do-while
	do{
		$numero--;
		echo $numero.'<br>';
	}while($numero > 0);

	// Ciclo for
	for($i = 0; $i <= 10; $i++){
		echo $i;
	}


	$paises_ciudades = array('Estados Unidos' => array('California', 'Nevada'),
							 'México' => array('Puebla', 'DF'));

	echo '<br>------------------------<br>';
	foreach($paises_ciudades as $llave => $valor){
		echo 'País: '.$llave;
		foreach($valor as $estado){
			echo '<br>Estado: '.$estado;
		}
		echo '<br>***********<br>';
	}
	echo '<br>------------------------<br>';

	echo '<br>';
	echo __FILE__;
	echo '<br>';
	echo dirname(__FILE__);
	echo '<br>';
	require_once(dirname(__FILE__).'/libs/custom.php');

	echo 'numero: ';
	imprimir($numero);
	echo ' ...<br>';

	switch($numero){

		case 10:
			echo 'Numero es diez';
		break;

		case 20:
			echo 'Numero es veinte';
		break;

		default:
			echo 'Numero es: '.$numero;
	}

	echo gettype($arreglo).'<br>';
	echo gettype($numero).'<br>';
	//echo gettype($menu_array[0]).'<br>';


	$usuario_rango = 6;

if($usuario_rango == 6){
	echo '<section class="secccion-logo">
					<div class="caja-logo">
						<img src="http://lorempixel.com/400/200" class="logo"/>
						<ul>
							<li><i class="fa fa-facebook-official"></i></li>
							<li><i class="fa fa-twitter-square"></i></li>
							<li><i class="fa fa-google-plus-square"></i></li>
						</ul>
					</div>
					<img src="http://lorempixel.com/400/200" class="banner">
				</section>';

}elseif($usuario_rango == 5){

}elseif($usuario_rango == 2){

}else{

}

$variable = 'a';
switch($variable){
	case 'a':

		break;

	case 'b':

		break;
}
?>