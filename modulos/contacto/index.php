<?php
include 'admin/functions.php';
?>
	<!-- /inner_content -->
	<div class="inner_content_info_agileits">
		<div class="container">
			<h3 class="heading-agileinfo"><?php tit_seccion();?><span><?php des_seccion();?></span></h3>
			<div class="inner_sec_grids_info_w3ls">
			<div class="row foot-lft">
				<div class="col-md-4 agile_info_mail_img_info">
					<div class="address-grid">
						<h4>Centro de Contacto</h4>

<?php if($direc!=''){
	echo '
						<div class="mail-agileits-w3layouts">
							<span class="fa fa-map-marker" aria-hidden="true"></span>
							<div class="contact-right">
								<!--h6>Ubicaci&oacute;n</h6--><p>'.$direc.'</p>
							</div>
							<div class="clearfix"> </div>
						</div>
';
}?>
<?php if($contactMail!=''){
	echo '
						<div class="mail-agileits-w3layouts">
							<span class="fa fa-envelope" aria-hidden="true"></span>
							<div class="contact-right">
								<!--h6>Email</h6--> <p><a href="mailto:'.$contactMail.'">'.$contactMail.'</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
';
}?>

<?php if($tel1!=''){
	echo '
						<div class="mail-agileits-w3layouts">
							<span class="fa fa-phone" aria-hidden="true"></span>
							<div class="contact-right">
								<!--h6>Telefono</h6--> <p>'.$tel1.'</p>                                
							</div>
							<div class="clearfix"> </div>
						</div>
';
}?>
						<div class="agileits_w3layouts_nav_right contact">
							<div class="social two">
								<ul>
               <?php
                  if($fb_web!=''){
                  	echo '<li><a target="_blank" href="'.$fb_web.'"><span class="fa fa-facebook"></span></a></li> ';
                  }
                  if($tw_web!=''){
                  	echo '<li><a target="_blank" href="'.$tw_web.'"><span class="fa fa-twitter"></span></a></li> ';
                  }
                  if($yt_web!=''){
                  	echo '<li><a target="_blank" href="'.$yt_web.'"><span class="fa fa-youtube"></span></a></li> ';
                  }
                  if($gp_web!=''){
                  	echo '<li><a target="_blank" href="'.$gp_web.'"><span class="fa fa-google-plus"></span></a></li> ';
                  }
                  if($lk_web!=''){
                  	echo '<li><a target="_blank" href="'.$lk_web.'"><span class="fa fa-linkedin"></span></a></li> ';
                  }
                  if($ins_web!=''){
                  	echo '<li><a target="_blank" href="'.$ins_web.'"><span class="fa fa-instagram"></span></a></li> ';
                  }
                  ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 agile_info_mail_img" style="background:url(<?php echo $page_url.'modulos/'.$mod;?>/img/contact1.jpg) no-repeat 0px 0px;">

				</div>
				</div>
				<div class="w3layouts_mail_grid">
                	<?php include 'contacto.php';?>
				</div>
			</div>
		</div>
	</div>
	<!-- //mid-services -->
	<!-- /map -->
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14959.130122190081!2d-99.94674306598985!3d20.391854508164286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d30ae2d08861f3%3A0xd5646ef0de59aa14!2sBanthi%2C%20San%20Juan%20del%20R%C3%ADo%2C%20Qro.!5e0!3m2!1ses-419!2smx!4v1567788053853!5m2!1ses-419!2smx" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</div>
	<!-- //map -->
