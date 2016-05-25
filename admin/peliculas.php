<?php
require_once(dirname(__FILE__).'/../libs/custom.php');

admin_redirect();

$r = sql_query('SELECT `id`,
                       `nombre`,
                       `director`,
                       `actores`,
                       `imagen`,
                       `descripcion`,
                       `ranking`,
                       `categoria`

                FROM   `peliculas`

                WHERE  `status` IS NULL');


$html = '
    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
            <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
        </li>
        <!-- END TOGGLE NAVIGATION -->
        <!-- SEARCH -->
        <li class="xn-search">
            <form role="form">
                <input type="text" name="search" placeholder="Search..."/>
            </form>
        </li>
        <!-- END SEARCH -->
        <!-- SIGN OUT -->
        <li class="xn-icon-button pull-right">
            <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
        </li>
        <!-- END SIGN OUT -->
        <!-- MESSAGES -->
        <li class="xn-icon-button pull-right">
            <a href="#"><span class="fa fa-comments"></span></a>
            <div class="informer informer-danger">4</div>
            <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>
                    <div class="pull-right">
                        <span class="label label-danger">4 new</span>
                    </div>
                </div>
                <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                    <a href="#" class="list-group-item">
                        <div class="list-group-status status-online"></div>
                        <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                        <span class="contacts-title">John Doe</span>
                        <p>Praesent placerat tellus id augue condimentum</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <div class="list-group-status status-away"></div>
                        <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                        <span class="contacts-title">Dmitry Ivaniuk</span>
                        <p>Donec risus sapien, sagittis et magna quis</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <div class="list-group-status status-away"></div>
                        <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                        <span class="contacts-title">Nadia Ali</span>
                        <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <div class="list-group-status status-offline"></div>
                        <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                        <span class="contacts-title">Darth Vader</span>
                        <p>I want my money back!</p>
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <a href="pages-messages.html">Show all messages</a>
                </div>
            </div>
        </li>
        <!-- END MESSAGES -->
        <!-- TASKS -->
        <li class="xn-icon-button pull-right">
            <a href="#"><span class="fa fa-tasks"></span></a>
            <div class="informer informer-warning">3</div>
            <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>
                    <div class="pull-right">
                        <span class="label label-warning">3 active</span>
                    </div>
                </div>
                <div class="panel-body list-group scroll" style="height: 200px;">
                    <a class="list-group-item" href="#">
                        <strong>Phasellus augue arcu, elementum</strong>
                        <div class="progress progress-small progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                        </div>
                        <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                    </a>
                    <a class="list-group-item" href="#">
                        <strong>Aenean ac cursus</strong>
                        <div class="progress progress-small progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                        </div>
                        <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                    </a>
                    <a class="list-group-item" href="#">
                        <strong>Lorem ipsum dolor</strong>
                        <div class="progress progress-small progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                        </div>
                        <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                    </a>
                    <a class="list-group-item" href="#">
                        <strong>Cras suscipit ac quam at tincidunt.</strong>
                        <div class="progress progress-small">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                        </div>
                        <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <a href="pages-tasks.html">Show all tasks</a>
                </div>
            </div>
        </li>
        <!-- END TASKS -->
    </ul>
    <!-- END X-NAVIGATION VERTICAL -->

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb push-down-0">
        <li><a href="#">Home</a></li>
        <li><a href="#">Paginas</a></li>
        <li class="active">Peliculas</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- START CONTENT FRAME -->
    <div class="content-frame">

        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">
            <div class="page-title">
                <h2><span class="fa fa-film"></span> Peliculas</h2>
            </div>
            <div class="pull-right">
                <button class="btn btn-primary">
                    <span class="fa fa-plus"></span>
                    <a href="pelicula.php">
                        Nueva Pelicula
                    </a>
                </button>
                <button class="btn btn-default content-frame-right-toggle"><span class="fa fa-bars"></span></button>
            </div>
        </div>

        <!-- START CONTENT FRAME RIGHT -->
        <div class="content-frame-right">
            <h4>Categorias:</h4>
            <div class="list-group border-bottom push-down-20">
                <a href="#" class="list-group-item active">All <span class="badge badge-primary">12</span></a>
                <a href="#" class="list-group-item">Nature <span class="badge badge-success">7</span></a>
                <a href="#" class="list-group-item">Music <span class="badge badge-danger">3</span></a>
                <a href="#" class="list-group-item">Space <span class="badge badge-info">2</span></a>
                <a href="#" class="list-group-item">Girls <span class="badge badge-warning">3</span></a>
            </div>
        </div>
        <!-- END CONTENT FRAME RIGHT -->

        <!-- START CONTENT FRAME BODY -->
        <div class="content-frame-body content-frame-body-left">

            <div class="pull-left push-up-10">
                
            </div>
            <div class="pull-right push-up-10">
                <div class="btn-group">
                </div>
            </div>

            <div class="gallery" id="links">';


while($pelicula = mysqli_fetch_assoc($r)){
                
    $html .= '  <a class="gallery-item" href="'.url_videoteca('/admin/pelicula.php?id='.$pelicula['id']).'" pelicula="'.$pelicula['id'].'">
                    <div class="image">
                        <img src="img/'.$pelicula['imagen'].'" style="width: 190px; height: 256px"/>
                        <ul class="gallery-item-controls">
                            <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                        </ul>
                    </div>
                    <div class="meta">
                        <strong>
                            '.$pelicula['nombre'].'
                        </strong>
                        <span>
                            '.mb_strimwidth($pelicula['descripcion'], 0, 25, "...").'
                        </span>
                    </div>
                </a>';
}
            
$html .= '  </div>

            <ul class="pagination pagination-sm pull-right push-down-20 push-up-20">
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>
    <!-- END CONTENT FRAME -->


</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- BLUEIMP GALLERY -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
<div class="slides"></div>
<h3 class="title"></h3>
<a class="prev">‹</a>
<a class="next">›</a>
<a class="close">×</a>
<a class="play-pause"></a>
<ol class="indicator"></ol>
</div>
<!-- END BLUEIMP GALLERY -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
<div class="mb-container">
    <div class="mb-middle">
        <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
        <div class="mb-content">
            <p>Are you sure you want to log out?</p>
            <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
        </div>
        <div class="mb-footer">
            <div class="pull-right">
                <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                <button class="btn btn-default btn-lg mb-control-close">No</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type="text/javascript" src="js/plugins/icheck/icheck.min.js"></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
<script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
<script type="text/javascript" src="js/plugins/icheck/icheck.min.js"></script>
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="js/settings.js"></script>

<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/actions.js"></script>
<!-- END TEMPLATE -->


<!-- END SCRIPTS -->         ';

admin_build_page(null, $html);
?>
