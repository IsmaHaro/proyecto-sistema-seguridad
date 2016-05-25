<?php
require_once(dirname(__FILE__).'/../libs/custom.php');

$html = '       <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active">Registro</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form onsubmit="return submitForm(this)" class="form-horizontal" id="formulario_registro">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>Bienvenido</strong>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="respuesta">
                                        <p></p>
                                    </div>
                                    <p>Registre sus datos</p>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nombre</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" class="form-control" id="name" name="name" required/>
                                            </div>
                                            <span class="help-block">Nombre completo</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                <input type="email" class="form-control" id="email" name="email" required/>
                                            </div>
                                            <span class="help-block">Correo electronico</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Contraseña</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input type="password" class="form-control" id="password" name="password" required/>
                                            </div>
                                            <span class="help-block">Contraseña</span>
                                        </div>
                                    </div>

                                    <div class="form-group cpassword hidden">
                                        <label class="col-md-3 col-xs-12 control-label">Contraseña Encriptada</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input type="text" class="form-control" id="cpassword" name="cpassword"/>
                                            </div>
                                            <span class="help-block">Contraseña encriptada</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right" type="submit">
                                        Registrar
                                    </button>
                                    <a id="siguiente" href="login.php" class="btn btn-default hidden">
                                        Siguiente
                                    </a>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <script>
            function submitForm(form){
                $.post("ajax/registro.php", $(form).serialize(), function(json) {
                    if(json.code == 200){
                        $(".respuesta").removeClass("mensaje-error").addClass("mensaje-exito").html("<p>"+json.message+"</p>");
                        $("#cpassword").val(json.cpassword);
                        $(".cpassword").removeClass("hidden");
                        $("#siguiente").removeClass("hidden");

                    }else{
                        $(".respuesta").removeClass("mensaje-exito").addClass("mensaje-error").html("<p>"+json.message+"</p>");
                    }

                }, "json");

                return false;
            }

        </script>

        <!-- START THIS PAGE PLUGINS-->
        <script type="text/javascript" src="js/plugins/icheck/icheck.min.js"></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script type="text/javascript" src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>

        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>

        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->';

admin_build_page(null, $html);
?>
