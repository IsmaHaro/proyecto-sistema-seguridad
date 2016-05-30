<?php
require_once(dirname(__FILE__).'/../../libs/custom.php');
//set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
include(dirname(__FILE__).'/../phpclib/Crypt/RSA.php');
//include('Crypt/RSA.php');

$result = array();

if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['password'])){
    /*
     * Registramos
     */
    //$password = hash('sha256', $_POST['password']);
    $privatekey  = file_get_contents('../phpclib/private.key');
    $rsa         = new Crypt_RSA();
    $rsa->loadKey($privatekey);

    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    $password = $rsa->encrypt($_POST['password']);


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
