<?php
// BORRAR PELICULAS DE LA BASE DE DATOS
require_once(dirname(__FILE__).'/../libs/custom.php');

admin_redirect();

$pelicula = sql_get('SELECT `nombre` FROM `peliculas` WHERE id ='.$_POST['id']);

sql_query('DELETE FROM `peliculas` WHERE id ='.$_POST['id']);

echo $pelicula['nombre'];
?>