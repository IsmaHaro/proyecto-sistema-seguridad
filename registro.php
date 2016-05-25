<?php
require_once(dirname(__FILE__).'/libs/custom.php');

$html = '';

if(isset($_POST['nombre'])){
	try{
		if(!empty($_POST['nombre']) and !empty($_POST['email']) and !empty($_POST['password1']) and !empty($_POST['password2']) and !empty($_POST['g-recaptcha-response'])){

			if($_POST['password1'] != $_POST['password2']){
				throw new Exception('Error: Las contraseñas deben de ser iguales');
			}

			if(recaptcha_validate($_POST['g-recaptcha-response'])){

				$password = hash('sha256', $_POST['password1']);
				$fecha    = date("Y-m-d");

				sql_query('INSERT INTO `usuarios` (`status`, `nombre`, `password`, `email`, `fecha`)
					         VALUES                 ("registrado", "'.$_POST['nombre'].'", "'.$password.'", "'.$_POST['email'].'", "'.$fecha.'" )');

				$html .= mensaje_html('Usuario registrado: '.$_POST['nombre'], 'exito');
			}

		}else{
			throw new Exception('Error: Ningun campo puede estar vacio');
		}

	}catch(Exception $e){
		$html .= mensaje_html($e->getMessage(), 'error');
	}
}

$html .= '<h1>Página de registro</h1>
		 		<form class="formulario_registro" method="post" action="registro.php">
					<input type="text" name="nombre" placeholder="Tu nombre usuario" required>
					<input type="email" name="email" placeholder="Tu email" required>
					<input type="password" name="password1" placeholder="Contraseña" required>
					<input type="password" name="password2" placeholder="Confirma tu contraseña" required>
					<div class="g-recaptcha" data-sitekey="6LeYcRUTAAAAAMGJz2QChjEkG418hNe7v8--8Lzr"></div>
					<input type="submit" value="Registrar">
		 		</form>';

$params['title'] = 'Registro';

build_page($html, $params);
?>
