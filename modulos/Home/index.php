<?php
include 'admin/functions.php';
sql_opciones('slide_active',$valor);
$slide=$valor;
?>
<?php if($slide==1){?>
	<!-- banner -->
		<div class="banner">
			<div class="container">
					<div class="carousel-caption">				
						<h3>Especialistas en <span>Acabados Industriales</span></h3>
						<p>Maquilamos y fabricamos l&iacute;neas de pintura electrost&aacute;tica. La cual, tiene mayor resistencia a la corrosi&oacute;n, abrasi&oacute;n y a la formaci&oacute;n lenta, permitiendo obtener mejores acabados a costos m&aacute;s reducidos.</p>
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="<?php echo $page_url;?>nosotros/">Leer m&aacute;s »</a>
						</div>
					</div>
			</div>
		</div>
	<!--//banner -->
<?php }?>
<?php
pages($mod,$ext,$contenido,$activo);
if($activo==1){
	echo $contenido;
}else{
?>
	<!-- services -->
<div class="services">
		<h3 class="heading-agileinfo">Nuestros Servicios<span>Performance Coating</span></h3>
	<div class="container">
		<div class="row services-top-grids">			
            <div class="col-md-4">
            <a href="<?php $page_url;?>servicios/fabricacion_de_lineas_de_pintura/">
				<div class="grid1">
					<!--span class="fa fa-fire"></span-->
					<h4>Fabricaci&oacute;n de l&iacute;neas de pintura</h4>
					<p>Maquilamos y fabricamos l&iacute;neas de pintura electrost&aacute;tica. La cual, tiene mayor resistencia a la corrosi&oacute;n, abrasi&oacute;n y a la formaci&oacute;n lenta.</p>
				</div></a>
			</div>
			<div class="col-md-4">
            <a href="<?php $page_url;?>servicios/sistemas_contra_incendios/">
				<div class="grid1">
					<!--span class="fa fa-tint"></span-->
					<h4>Instalaci&oacute;n de sistemas contraincendios</h4>
					<p>Brindadmos servicios de dise&ntilde;o mantenimiento e instalaci&oacute;n en sistemas conta incendio, as&iacute; como mantenimiento en instalaciones electromecanicas.</p>
				</div></a>
			</div>
			<div class="col-md-4">
            <a href="<?php $page_url;?>servicios/fabricacion_de_naves_industriales/">
				<div class="grid1">
					<!--span class="fa fa-flask"></span-->
					<h4>Fabricaci&oacute;n de naves industriales</h4>
					<p>Dise&ntilde;amos y construimos naves industriales optimizando espacios de acuerdo a sus necesidades.																																													<br></p>
				</div></a>
			</div>
			
		</div>
		<div class="row services-bottom-grids">
			<div class="col-md-4">
            <a href="<?php $page_url;?>#">
				<div class="grid1">
					<!--span class="fa fa-lightbulb-o"></span-->
					<h4>Proceso de manufactura soldadura, corte y doblez</h4>
					<p>En Percco contamos con la maquinaria necesaria para la fabricaci&oacute;n de tus equipos industriales. Somos expertos en Pailer&iacute;a.</p>
				</div></a>
			</div>
			<div class="col-md-4">
            <a href="<?php $page_url;?>servicios/transportadores_industriales/">
				<div class="grid1">
					<!--span class="fa fa-cogs"></span-->
					<h4>Transportadores Industriales</h4>
					<p>Nuestros sistemas de transportadores pueden ser aplicados en una gama amplia de industriales.</p>
				</div></a>
			</div>
			<div class="col-md-4">
            <a href="<?php $page_url;?>#">
				<div class="grid1">
					<!--span class="fa fa-industry"></span-->
					<h4>Mantenimiento y refacciones</h4>
					<p>Tenemos las Refacciones que su industria necesita para ser productiva brindando el soporte y la re-ingenier&iacute;a necesaria.<br></p>
				</div></a>
			</div>
			
		</div>
	</div>
</div>
<!-- //services -->
<?php
}
?>
