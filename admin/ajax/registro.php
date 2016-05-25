<?php
require_once(dirname(__FILE__).'/../../libs/custom.php');

$result = array();

if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['password'])){
    /*
     * Registramos
     */
    $password = hash('sha256', $_POST['password']);

    try{
        sql_query('INSERT INTO `users` (`name`             , `cpassword`    , `ncpassword`            , `email`              , `role_id`)
                   VALUES              ("'.$_POST['name'].'", "'.$password.'", "'.$_POST['password'].'", "'.$_POST['email'].'", 1)');

        $result['code']      = 200;
        $result['message']   = 'Exito: Usuario registrado';
        $result['cpassword'] = $password;

    }catch(Exception $e){
        $result['code']    = 500;
        $result['message'] = 'Error: Puede que este usuario ya exista';
    }

}else{
    $result['code']    = 500;
    $result['message'] = 'Error: Todos los campos deben de estar llenos';
}

echo json_encode($result);

?>
