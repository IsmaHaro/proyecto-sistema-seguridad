<?php
require_once(dirname(__FILE__).'/config.php');

/*
 * Libreria que contiene funciones
 * útiles para el proyecto.
 */
function imprimir($valor){
	if(is_array($valor)){
		echo '<pre>';
		print_r($valor);
		echo '</pre>';

	}else{
		echo $valor;
	}
}


function menu(){
	$menu_array[0] = 'Inicio';
	$menu_array[1] = 'Nosotros';
	$menu_array[2] = 'Acerca de';
	$menu_array[3] = 'Fotos';
	$menu_array[4] = 'Registro';
	$menu_array[5] = 'Contacto';

	$menu = '';

	foreach($menu_array as $valor){
		$menu .= '<li><a href="#">'.$valor.'</a></li> ';
	}

	return '<ul>'.$menu.'</ul>';
}


function html_head($title){
	return '<!DOCTYPE html>
			<html>
			<head>
			<meta charset="utf-8">
			<title>'.$title.'</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700" rel="stylesheet" type="text/css">
			<link rel="stylesheet" type="text/css" href="css/normalize.css">
			<link rel="stylesheet" type="text/css" href="css/estilos.css">
			<link rel="stylesheet" type="text/css" href="css/jssor.css">
			<script src="https://www.google.com/recaptcha/api.js"></script>
			</head>';
}

function html_header(){
	return '<body>
			<div class="contenedor">
				<header>
					<img src="http://lorempixel.com/400/200" class="ochenta"/>
					<img src="http://lorempixel.com/400/200" class="veinte"/>
					<nav>
						'.menu().'
					</nav>
				</header>';
}


function html_footer(){
	return '	<footer>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore accusantium perspiciatis itaque, quis distinctio
					</p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore accusantium perspiciatis itaque, quis distinctio
					</p>
					<img src="http://lorempixel.com/400/200">
					<div>
						<img src="http://lorempixel.com/400/200">
						<div>
							<img src="http://lorempixel.com/400/200">
							<img src="http://lorempixel.com/400/200">
						</div>
					</div>
				</footer>
			</div>';
}


function html_end(){
	return '	</body>
				</html>';
}

function build_page($body, $params, $script = ''){

	$html = html_head($params['title']).html_header().$body.html_footer().$script.html_end();

	echo $html;
}


function recaptcha_validate($response){
	$url  = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array('secret'   => '6LeYcRUTAAAAADhGLH1hGYP3vUmXzmyBJg0tmLyh',
		          'response' => $response);

	$options = array(
		'http' => array(
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'method'  => 'POST',
			'content' => http_build_query($data)
		));

	$context = stream_context_create($options);
	$result  = file_get_contents($url, false, $context);
	$result  = json_decode($result, true);

	return $result['success'];
}

function sql_connect(){
	global $CONFIG;

	if(!empty($CONFIG['dbconnection'])){
		/*
		 * Ya conectamos a la BD
		 */
		return false;
	}

	$CONFIG['dbconnection'] = mysqli_connect($CONFIG['db']['host'], $CONFIG['db']['user'], $CONFIG['db']['password'], $CONFIG['db']['name']);
}


function sql_query($query){
	try{
		global $CONFIG;

		sql_connect();

		$r = mysqli_query($CONFIG['dbconnection'], $query);

		if(!mysqli_errno($CONFIG['dbconnection'])){

			return $r;
		}

		throw new Exception('Error SQL '.mysqli_error($CONFIG['dbconnection']));

	}catch(Exception $e){
		throw new Exception('sql_query(): Error '.$e);
	}
}


function sql_get($query){
	try{
			$r = sql_query($query);

			return mysqli_fetch_assoc($r);

	}catch(Exception $e){
		throw new Exception('sql_get(): Error '.$e);
	}
}

function controlador_exception($e){
		$exception['mensaje'] = $e->getMessage();
		$exception['linea']   = $e->getLine();
		$exception['trace']   = $e->getTrace();

		imprimir($exception);
}

set_exception_handler('controlador_exception');

function mensaje_html($mensaje, $tipo = ''){
	try{
		switch($tipo){
			case 'exito':
					$clase = 'mensaje-exito';
				break;
			case 'error':
					$clase = 'mensaje-error';
				break;
			default:
				return true;
		}

		$html = '	<div class="'.$clase.'">
								<p>'.$mensaje.'<p>
							</div>';

		return $html;

	}catch(Exception $e){
		throw new Exception('mensaje_html(): Error '.$e);
	}
}


function admin_head($class = ''){
	$html = '	<!DOCTYPE html>
				<html lang="en" '.$class.'>
				    <head>
				        <!-- META SECTION -->
				        <title>Atlant - Responsive Bootstrap Admin Template</title>
				        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
				        <meta name="viewport" content="width=device-width, initial-scale=1" />

				        <link rel="icon" href="favicon.ico" type="image/x-icon" />
				        <!-- END META SECTION -->

				        <!-- CSS INCLUDE -->
				        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
				        <!-- EOF CSS INCLUDE -->
				    </head>
						<body>
						<!-- START PAGE CONTAINER -->
						<div class="page-container">';

		if(!empty($_SESSION['usuario'])){
			$html .= admin_menu();
		}

		$html .= '			<!-- PAGE CONTENT -->
								<div class="page-content">';

		return $html;
}

function admin_footer(){
	return '    </body>
					</html>';
}

function admin_build_page($params, $body){
	$html = admin_head($params['class']).$body.admin_footer();
	echo $html;
}


function validar_usuario($nombre, $password){
	try{
			$password = hash('sha256', $password);
			$usuario = sql_get('SELECT `id`,
									   `status`,
									   `nombre`,
									   `descripcion`,
									   `email`,
									   `rango`,
									   `imagen`

								FROM   `usuarios`

								WHERE  `nombre`   = "'.$nombre.'"
							    AND    `password` = "'.$password.'"');

			if(empty($usuario)){
					return false;
			}

			return $usuario;

	}catch(Exception $e){
		throw new Exception('validar_usuario(): Error '.$e);
	}
}


function usuario_login($usuario, $tipo = ''){
		if($tipo == 'admin'){
				if($usuario['rango'] != 1){
					throw new Exception('Error no eres administrador');
				}
		}

		session_start();

		$_SESSION['usuario'] = $usuario;

		header('Location: index.php');
}


function admin_redirect(){
	try{
		session_start();

		if(empty($_SESSION['usuario'])){
			header('Location: login.php');
		}

		if($_SESSION['usuario']['rango'] != 1){
			header('Location: login.php');
		}

	}catch(Exception $e){
		throw new Exception('admin_redirect(): Error '.$e);
	}
}


function admin_menu(){
	$avatar = $_SESSION['usuario']['imagen'];

	if($avatar){
		$avatar = '/admin/img/'.$avatar;

	}else{
		$avatar = '/admin/img/avatar-default.png';
	}

	return '<!-- START PAGE SIDEBAR -->
				<div class="page-sidebar">
					<!-- START X-NAVIGATION -->
					<ul class="x-navigation">
						<li class="xn-logo">
							<a href="index.php">ATLANT</a>
							<a href="#" class="x-navigation-control"></a>
						</li>
						<li class="xn-profile">
							<a href="#" class="profile-mini">
								<img src="'.$avatar.'" alt="John Doe"/>
							</a>
							<div class="profile">
								<div class="profile-image">
									<img src="'.$avatar.'" alt="John Doe"/>
								</div>
								<div class="profile-data">
									<div class="profile-data-name">'.$_SESSION['usuario']['nombre'].'</div>
									<div class="profile-data-title">'.$_SESSION['usuario']['descripcion'].'</div>
								</div>
								<div class="profile-controls">
									<a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
									<a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
								</div>
							</div>
						</li>
						<li class="xn-title">Navigation</li>
						<li class="active">
							<a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
						</li>
						<li class="xn-openable">
							<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Páginas</span></a>
							<ul>
								<li><a href="usuario.php"><span class="fa fa-user"></span> Usuario</a></li>
								<li><a href="peliculas.php"><span class="fa fa-film"></span> Peliculas</a></li>
							</ul>
						</li>
					</ul>
					<!-- END X-NAVIGATION -->
				</div>
				<!-- END PAGE SIDEBAR -->';
}


function url_videoteca($url = ''){
	return 'http://'.$_SERVER['SERVER_NAME'].$url;
}


function html_select($opciones, $nombre = '', $clase = '', $selected = ''){
	try{
		$html = '<select name="'.$nombre.'" class="'.$clase.'">';

		foreach($opciones as $llave => $valor){
			if($selected == $llave){
				$html .= '<option value="'.$llave.'" selected>'.$valor.'</option>';

			}else{
				$html .= '<option value="'.$llave.'">'.$valor.'</option>';
			}
			
		}

		$html .= '</select>';

		return $html;

	}catch(Exception $e){
		throw new Exception('html_select(): Error'.$e);
	}
}
?>
