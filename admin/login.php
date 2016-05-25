<?php
require_once(dirname(__FILE__).'/../libs/custom.php');

$html    = '';
$mensaje = '';

if(isset($_POST['nombre_usuario'])){
  try{
    if(empty($_POST['nombre_usuario']) or empty($_POST['password'])){
        throw new Exception('Error: campos vacios');
    }

    if($usuario = validar_usuario($_POST['nombre_usuario'], $_POST['password'])){
      usuario_login($usuario, 'admin');
    }

    throw new Exception('Nombre de usuario o contraseña invalida');

  }catch(Exception $e){
    $mensaje =  mensaje_html($e->getMessage(), 'error');
  }
}

$html .= ' <div class="login-container">
            <div class="login-box animated fadeInDown">

                <div class="login-body">
                    '.$mensaje.'
                    <div class="login-title"><strong>Bienvenido</strong>, Porfavor ingresa</div>
                    <form action="login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="nombre_usuario" class="form-control" placeholder="Nombre de usuario"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/admin/registro.php" class="btn btn-link btn-block">
                              Registro
                            </a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Ingresar</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2016 Proyecto Redes
                    </div>
                </div>
            </div>
        </div>';

$params['class'] = 'class="body-full-height"';
admin_build_page($params, $html);
?>
