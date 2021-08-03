<?php include 'admin/functions.php';
$tipo='poliester';
?>
<!-- Example assets -->
<link rel="stylesheet" type="text/css" href="<?php echo $page_url;?>modulos/manufactura/css/jcarousel.responsive.css">
<!--script type="text/javascript" src="<?php echo $page_url;?>modulos/manufactura/js/jquery.js"></script-->    
<script type="text/javascript" src="<?php echo $page_url;?>modulos/manufactura/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo $page_url;?>modulos/manufactura/js/jcarousel.responsive.js"></script>

    <!-- Cursos -->
    <section class="services">
        <div class="container">
            <h3 class="tittle"><?php tit_seccion();?></h3>
            <div class="row inner-sec-wthree">
                	<h3 style="border-bottom:2px solid #ed1c24; color:#1f205a; margin-bottom:0px; display:inline-block;">Nuestros Proyectos</h3>
                    <!--h6 style="margin-bottom:15px;"></h6-->
			</div>
            <div class="row inner-sec-wthree">
                <?php portafolio1($tipo);?>
			</div>
            <div class="row inner-sec-wthree">

                <div class="contact_grid_right">
                	<h3 style="border-bottom:2px solid #ed1c24; color:#1f205a; margin-bottom:30px; display:inline-block;">Nuestros Clientes</h3>
                    <h6 style="margin-bottom:15px;">Clientes que han confiado en nosotros.</h6>
                    <div class="con-carousel">
                     <div class="jcarousel-wrapper">
                		<div class="jcarousel">
                    		<ul>
                    		<?php mostrar_imagenes('modulos/manufactura/fotos/marcas/');?>
                    		</ul>
                        </div>
                        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                		<a href="#" class="jcarousel-control-next">&rsaquo;</a>
                		<!--p class="jcarousel-pagination"></p-->
                     </div>
                    </div>
				</div>
                            
            </div>
        </div>
    </section>
    <!--/Cursos -->
    <script>
$(function() {
    $('.jcarousel')
        .jcarousel({
            // Core configuration goes here
        })
        .jcarouselAutoscroll({
            interval: 3000,
            target: '+=1',
            autostart: true
        })
    ;
});    
    </script>
