<?php
	require_once(dirname(__FILE__).'/libs/custom.php');

	$html = '   <section class="secccion-logo">
					<div class="caja-logo">
						<img src="http://lorempixel.com/400/200" class="logo"/>
						<ul>
							<li><i class="fa fa-facebook-official"></i></li>
							<li><i class="fa fa-twitter-square"></i></li>
							<li><i class="fa fa-google-plus-square"></i></li>
						</ul>
					</div>
					<img src="http://lorempixel.com/400/200" class="banner">
				</section>
				<hr>
				<section class="seccion-video">
					<img src="http://lorempixel.com/400/200">
					<div class="articulo">
						<img src="http://lorempixel.com/400/200">
						<img src="http://lorempixel.com/400/200">
						<h2>Titulo</h2>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</p>
						<button>
							<a href="#">Leer Más</a>
						</button>
					</div>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/uo35R9zQsAI" frameborder="0" allowfullscreen></iframe>
				</section>

				<section class="seccion-consejos">
					<div class="contenedor-consejos">
						<h2>
							Los consejos del Doc
						</h2>
						<ul>
							<li>
								<h3>Titulo</h3>	
								<img src="http://lorempixel.com/400/200">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ipsa, libero.
								</p>
								<img src="http://lorempixel.com/400/200">
							</li>
							<li>
								<h3>Titulo</h3>	
								<img src="http://lorempixel.com/400/200">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ipsa, libero.
								</p>
								<img src="http://lorempixel.com/400/200">
							</li>
							<li>
								<h3>Titulo</h3>	
								<img src="http://lorempixel.com/400/200">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ipsa, libero.
								</p>
								<img src="http://lorempixel.com/400/200">
							</li>
						</ul>
					</div>

					<img src="http://lorempixel.com/400/200" class="publicidad">
				</section>
				
				<section class="seccion-publicidad">
					<img src="http://lorempixel.com/400/200" class="publicidad">
				</section>

				<section class="seccion-titulo-galeria">
					<h2>Galería</h2>
				</section>

				<section class="seccion-galeria">
					<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
				        <!-- Loading Screen -->
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url("img/loading.gif") no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
				            <div data-p="112.50" style="display: none;">
				                <img data-u="image" src="img/02.jpg" />
				            </div>
				            <div data-p="112.50" style="display: none;">
				                <img data-u="image" src="img/04.jpg" />
				            </div>
				            <div data-p="112.50" style="display: none;">
				                <img data-u="image" src="img/05.jpg" />
				            </div>
				            <div data-p="112.50" style="display: none;">
				                <img data-u="image" src="img/09.jpg" />
				            </div>
				        </div>
				        <!-- Bullet Navigator -->
				        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
				            <!-- bullet navigator item prototype -->
				            <div data-u="prototype" style="width:16px;height:16px;"></div>
				        </div>
				        <!-- Arrow Navigator -->
				        <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
				        <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
				        <a href="http://www.jssor.com" style="display:none">Bootstrap Carousel</a>
				    </div>
				</section>';

	$script = '	<script type="text/javascript" src="js/jssor.slider.min.js"></script>
				<!-- use jssor.slider.debug.js instead for debug -->
				<script>
			    jssor_1_slider_init = function() {
			        
			        var jssor_1_SlideshowTransitions = [
			          {$Duration:1200,$Opacity:2}
			        ];
			        
			        var jssor_1_options = {
			          $AutoPlay: true,
			          $SlideshowOptions: {
			            $Class: $JssorSlideshowRunner$,
			            $Transitions: jssor_1_SlideshowTransitions,
			            $TransitionsOrder: 1
			          },
			          $ArrowNavigatorOptions: {
			            $Class: $JssorArrowNavigator$
			          },
			          $BulletNavigatorOptions: {
			            $Class: $JssorBulletNavigator$
			          }
			        };
			        
			        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
			        
			        //responsive code begin
			        //you can remove responsive code if you dont want the slider scales while window resizing
			        function ScaleSlider() {
			            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
			            if (refSize) {
			                refSize = Math.min(refSize, 600);
			                jssor_1_slider.$ScaleWidth(refSize);
			            }
			            else {
			                window.setTimeout(ScaleSlider, 30);
			            }
			        }
			        ScaleSlider();
			        $Jssor$.$AddEvent(window, "load", ScaleSlider);
			        $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
			        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
			        //responsive code end
			    };

			    jssor_1_slider_init();
			</script>';

$params['title'] = 'Página Principal';

build_page($html, $params, $script);
?>